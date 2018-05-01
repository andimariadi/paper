<?php
    $id = addslashes($pit);
    //error_reporting(0);
    //sql detail pencarian
    $sql = $db->query("SELECT `set_fleet`.`id`, `set_fleet`.`date`, `set_fleet`.`shift`, `set_fleet`.`cn_loader`, `set_fleet`.`speed`, `status`.`name` as `status`, `pit`.`name` as `pit`, `jalur`.`name` as `jalur`, `area`.`name` as `area`, `material`.`name` as `material`, `set_fleet`.`disposal`, `set_fleet`.`coal_seam`, `set_fleet`.`coal_series`, `set_fleet`.`spv`, `set_fleet`.`gl_front`, `set_fleet`.`gl_disp`, `set_fleet`.`distance`, `tbloader`.`type`, `tbloader`.`old_eqp`, `tbloader`.`ob`, `tbloader`.`coal`, `travel_speed`.`coal` as `speed_coal`, `travel_speed`.`ob` as `speed_ob` FROM `set_fleet`
LEFT JOIN `tbloader` on `set_fleet`.`cn_loader` = `tbloader`.`cn_jigsaw`
LEFT JOIN `enum` as `status` ON `set_fleet`.`status` = `status`.`id`
LEFT JOIN `enum` as `pit` ON `set_fleet`.`pit` = `pit`.`id`
LEFT JOIN `enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id`
LEFT JOIN `enum` as `area` ON `set_fleet`.`area` = `area`.`id`
LEFT JOIN `enum` as `material` ON `set_fleet`.`material` = `material`.`id`
LEFT JOIN `travel_speed` ON `set_fleet`.`jalur` = `travel_speed`.`id_jalur` WHERE `set_fleet`.`id` = '{$id}'");
    while ($data = mysqli_fetch_assoc($sql)) {

        //sql dispacher
        $sql_dispatch = "SELECT `first_name`, `last_name` FROM `dispatch_fleet` LEFT JOIN `dispatcher` ON `dispatch_fleet`.`id_dispatch` = `dispatcher`.`id` WHERE `id_fleet` = '{$id}'";
        $sql_dispatch = mysqli_fetch_assoc($db->query($sql_dispatch));

        //sql loading time
        $sss = $db->query("SELECT `master_fleet`.`cn_hauler`, `type`, COUNT(`type`) as `total` FROM `master_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` WHERE `master_fleet`.`id_fleet` = '{$id}' GROUP BY `type`");
        $type = "";
        while ($x = mysqli_fetch_assoc($sss)) {
            $type .= 'OR `type_hauler`=\'' . $x['type'] . '\'';
        }
        if (mysqli_num_rows($sss) > 0) {
            $type = ' AND (' . substr($type, 3) . ')';
        } else {
            $type = '';
        }
        $loading_time = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT AVG(`ob`) as `avg_ob`, AVG(`coal`) as `avg_coal` FROM `loading_time` WHERE `type_loader`='" . $data['type'] . "'" . $type . ""));

        //sql cycle speed
        $cyc = mysqli_query($db->connection, "SELECT `tbhauler`.`type`, COUNT(`tbhauler`.`type`) as `count`,`coal`, `ob`, (COUNT(`tbhauler`.`type`)*`coal`) as `count_coal`, (COUNT(`tbhauler`.`type`)*`ob`) as `count_ob` FROM `set_fleet` LEFT JOIN `master_fleet` ON `set_fleet`.`id` = `master_fleet`.`id_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` LEFT JOIN `hauler_capacity` ON `tbhauler`.`type` = `hauler_capacity`.`type` WHERE `set_fleet`.`id` = '{$id}' AND (SELECT a.status FROM master_fleet a WHERE a.id_fleet = '{$id}' AND a.cn_hauler = master_fleet.cn_hauler ORDER BY a.id DESC LIMIT 1) ='available'  GROUP BY `tbhauler`.`type`");
        $no = 0;
        $sumob = array();
        $sumcoal = array();
        while ($xx = mysqli_fetch_assoc($cyc)) {
            $no++;
            $sumob['ob' . $no] = $xx['count_ob'];
            $sumcoal['coal' . $no] = $xx['count_coal'];
        }

        $sumcoal = empty($sumcoal) ? array(0) : $sumcoal;
        $sumob = empty($sumob) ? array(0) : $sumob;

//hitung cycle speed
if (strtoupper($data['material']) == strtoupper('coal')) {
    $load = $loading_time['avg_coal'];
} else {
    $load = $loading_time['avg_ob'];
}
$load = number_format($load, 3);

if (strtoupper($data['material']) == strtoupper('coal')) {
    $travel_plan = $data['speed_coal'];
} else {
    $travel_plan = $data['speed_ob'];
}

$cc_distance = number_format(($data['distance']*2)/1000, 2);
$cc_distance = empty($cc_distance)? 0 : $cc_distance;
$cc_travel = number_format((($data['distance']*2)/1000)/$travel_plan, 2);
$cc_loading = number_format((2+$load)/60, 2);
$cc_loading = empty($cc_loading) ? 0 : $cc_loading;
$cycle_speed = number_format($cc_distance/($cc_travel+$cc_loading), 2);
$cycle_speed = empty($cycle_speed) ? 0 : $cycle_speed;


//sum coal and ob kali type hauler 
$sum_coal = array_sum($sumcoal);
$sum_ob = array_sum($sumob);

//Prodty. Fleet
//Prodty. Fleet
if ($cc_distance > 0) {
    $cc_sd = number_format($cycle_speed/$cc_distance, 2);
} else {
    $cc_sd = 0;
}
$cc_sd = empty($cc_sd) ? 0 : $cc_sd;
if (strtoupper($data['material']) == strtoupper('coal')) {
    $sum_sum = number_format($sum_coal, 2);
} else {
    $sum_sum = number_format($sum_ob, 2);
}
$sum_sum = str_replace(',', '', $sum_sum);

//cap
if (strtoupper($data['material']) == strtoupper('coal')) {
    $prodty_fleet_cap = $data['coal'];
} else {
    $prodty_fleet_cap = $data['ob'];
}

//act
$prodty_fleet_act = number_format(floatval($cc_sd)*floatval($sum_sum), 0);
$prodty_fleet_act = str_replace(',', '', $prodty_fleet_act);


//Matching Factor
$matching_factor = number_format($prodty_fleet_act/$prodty_fleet_cap, 2);
?>
<div class="content">
<div class="container-fluid">
        <div class="row">
            <div id="notify"></div>
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Dispacther</h4>
                    </div>
                    <div class="content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td width="250px">Area</td>
                                    <td width="1px">:</td>
                                    <th><?php echo $data['area'];?></th>
                                </tr>
                                <tr>
                                    <td width="250px">Date</td>
                                    <td width="1px">:</td>
                                    <th><?php echo $data['date'];?></th>
                                </tr>
                                <tr>
                                    <td width="250px">Shift</td>
                                    <td width="1px">:</td>
                                    <th><?php echo $data['shift'];?></th>
                                </tr>
                                <tr>
                                    <td width="250px">Name</td>
                                    <td width="1px">:</td>
                                    <th><?php echo $sql_dispatch['first_name'] . ' ' . $sql_dispatch['last_name'];?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Detail Fleet Controls</h4>
                    </div>
                    <div class="content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td width="150px" rowspan="3" colspan="2">Fleet</td>
                                    <th><?php echo $data['cn_loader'];?></th>
                                </tr>
                                <tr>
                                    <th><?php echo $data['old_eqp'];?></th>
                                </tr>
                                <tr>
                                    <th><?php echo $data['type'];?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Status</td>
                                    <th><?php echo $data['status'];?></th>
                                </tr>
                                <tr>
                                    <td width="150px" rowspan="2">Matching Factor</td>
                                    <td width="75px">Act.</td>
                                    <th><?php
                                        echo $matching_factor;
                                    ?></th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td rowspan="4">Prodty. Fleet</td>
                                    <td>Cap.</td>
                                    <th><?php
                                        echo $prodty_fleet_cap;
                                    ?></th>
                                </tr>
                                <tr>
                                    <td>Act.</td>
                                    <th>
                                        <?php
                                            echo $prodty_fleet_act;
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Dev.</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td rowspan="3">Cycle Speed(km/hour)</td>
                                    <td>Act.</td>
                                    <th><?php
                                    echo $cycle_speed;
                                    ?></th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Dev.</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td rowspan="3">Travel Speed(km/hour)</td>
                                    <td>Act.</td>
                                    <th><?php echo $travel_plan;?></th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th><?php echo $travel_plan;?></th>
                                </tr>
                                <tr>
                                    <td>Dev.</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Pit</td>
                                    <th><?php echo $data['pit'];?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Material</td>
                                    <th><?php echo $data['material'];?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Jalur</td>
                                    <th><?php echo $data['jalur'];?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Disposal / ROM </td>
                                    <th><?php echo $data['disposal'];?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">Supervisor </td>
                                    <th><?php echo $data['spv'];?></th>
                                </tr>
                                <tr>
                                    <td rowspan="2">Group Leader</td>
                                    <td>Front</td>
                                    <th><?php echo $data['gl_front'];?></th>
                                </tr>
                                <tr>
                                    <td>Disp / ROM</td>
                                    <th><?php echo $data['gl_disp'];?></th>
                                </tr>
                                <tr>
                                    <td rowspan="2">Coal Quality</td>
                                    <td>Seam</td>
                                    <th><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['coal_seam'];
                                    }
                                    ?></th>
                                </tr>
                                <tr>
                                    <td>Series</td>
                                    <th><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['coal_series'];
                                    }
                                    ?></th>
                                </tr>
                                <tr>
                                    <td rowspan="3">Distance(meter)</td>
                                    <td>Act.</td>
                                    <th><?php echo $data['distance'];?></th>
                                </tr>
                                <tr>
                                    <td>Plan Daily</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Plan Monthly</td>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <h4>Fleet Hauler</h4>
                    </div>
                    <div class="content table-full-width">
                        <div  style="overflow-x: scroll;">
                            <?php
                            $date = $data['date'];
                            $loader = $data['cn_loader'];
                            if ($data['shift'] == '1') {
                                $start_loop = 6;
                                $end_loop = number_format($start_loop+12);
                                $time_start = '06:00';
                            } else {
                                $start_loop = 18;
                                $end_loop = number_format($start_loop+12);
                                $time_start = '18:00';
                            }
                            for ($i=$start_loop; $i < $end_loop; $i++) { 
                                $num = $i > 23 ? $i - 24 : $i;
                                $num = $num < 10 ? "0$num" : $num;
                                $next_date = $i > 23 ? date('Y-m-d', strtotime($data['date'] . '+1 days')) : $date;
                                echo '<div class="col-xs-1" style="padding: 0;border-left: 1px solid #CCC5B9;border-bottom: 1px solid #CCC5B9;border-right: 1px solid #CCC5B9;"><table class="table" style="margin-bottom: 0;"><tr><th>' . $num . ':00</th></tr>';
//
                                $sa = "SELECT `id`,cast(concat(`date`, ' ', `time`) as datetime) as dt,`master_fleet`.`cn_hauler`, `tbhauler`.`fix_fleet`, (SELECT a.status FROM master_fleet a WHERE a.id_fleet = master_fleet.id_fleet AND a.cn_hauler = master_fleet.cn_hauler AND cast(concat(a.date, ' ', a.time) as datetime) BETWEEN '" . $date . " {$time_start}' AND '" . $next_date . " {$num}:59:59' ORDER BY a.id DESC LIMIT 1) as `status` FROM `master_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` WHERE `id_fleet`='{$id}'  AND cast(concat(`date`, ' ', `time`) as datetime) BETWEEN '" . $date . " {$time_start}' AND '" . $next_date . " {$num}:59:59' GROUP BY `cn_hauler` DESC ORDER BY `id` ASC";
                                $xx = mysqli_query($db->connection, $sa);
                                if (mysqli_num_rows($xx) > 0) {
                                    $s = "";
                                    while ($d = mysqli_fetch_assoc($xx)) {
                                        if ($d['status'] == 'available') {
                                            $s .= " OR `cn_hauler` = '" . $d['cn_hauler'] . "'";
                                        }
                                    }
                                    $fix_fleets = 'AND (' . substr($s, 4) . ')';
                                } else {
                                    $s = "";
                                    $fix_fleets = $s;
                                }
                                //cek jumlah hauler fleet fix
                                $plan_fix_fleet = "SELECT `cn_hauler` FROM `tbhauler` where `fix_fleet`='" . $loader . "'";
                                $count_plan_fleet = mysqli_num_rows(mysqli_query($db->connection, $plan_fix_fleet));

                                //cek jumlah hauler actual sesuai fleet
                                $act_fix_fleet = empty($fix_fleets) ? "SELECT `cn_hauler` FROM `tbhauler` where `fix_fleet`='" . $loader . "'" : "SELECT `cn_hauler` FROM `tbhauler` where `fix_fleet`='" . $loader . "' {$fix_fleets}";
                                $sql_fix = empty($fix_fleets) ? 0 : mysqli_query($db->connection, $act_fix_fleet);
                                $count_act_fleet = empty($sql_fix) ? 0 : mysqli_num_rows($sql_fix);
                                $count_plan_fleet = $count_plan_fleet == 0 ? 1 : $count_plan_fleet;
                                echo '<tr><th>Acc: ' . number_format(($count_act_fleet/$count_plan_fleet) * 100, 1) . ' %</th></tr>';

                                $sqls = mysqli_query($db->connection, $sa);
                                while ($data = mysqli_fetch_assoc($sqls)) {
                                    if ($data['status'] == 'available') {
                                        if ($data['fix_fleet'] == $loader) {
                                            echo '<tr bgcolor="#fcb"><td align="center">' . $data['cn_hauler'] . '</td></tr>';
                                        } else {
                                            echo '<tr><td align="center">' . $data['cn_hauler'] . '</td></tr>';
                                        }
                                    }
                                }
                                echo '</table></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>