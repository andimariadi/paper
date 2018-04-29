<div class="content ">
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-3">
                <div class="card">
                    <div class="header">
                        <h5 class="title">Detail Fleet</h5>
                    </div>
                    <table class="table">
                		<thead>
                			<tr>
                                <td width="150px" rowspan="3" colspan="2">Fleet</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">Status</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td width="150px" rowspan="2">Matching Factor</td>
                                <td width="75px">Act.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="4">Prodty. Fleet</td>
                                <td>Cap.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Act.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Dev.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="3">Cycle Speed (km/hour)</td>
                                <td>Act.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Dev.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="3">Travel Speed (km/hour)</td>
                                <td>Act.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Dev.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">Pit</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">Material</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">Jalur</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">Disposal / ROM </td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Group Leader</td>
                                <td>Front</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td width="45%">Disp / ROM</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Coal Quality</td>
                                <td>Seam</td>

                            </tr>
                            <tr>
                                <td>Series</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td rowspan="3">Distance (meter)</td>
                                <td>Act.</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan Daily</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Plan Monthly</td>
                                <td>:</td>
                            </tr>
                		</thead>
                    </table>
                    <div class="header">
                        <h5 class="title">Hauler</h5>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td align="center">&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody id="jumlah_hauler"></tbody>
                    </table>
                </div>
            </div>
            <div style="overflow-x: scroll; white-space: nowrap;">

<?php
$id_pit = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT `id` FROM `enum` WHERE `name`='" . urldecode($pit) . "' AND `type`='pit'"));
$id_pit = $id_pit['id'];
$date = empty($ds) ? date('Y-m-d') : $ds;
$sql_all = "SELECT `set_fleet`.`id`, `set_fleet`.`date`, `set_fleet`.`shift`, `set_fleet`.`cn_loader`, `set_fleet`.`speed`, `status`.`name` as `status`, `pit`.`name` as `pit`, `jalur`.`name` as `jalur`, `area`.`name` as `area`, `material`.`name` as `material`, `set_fleet`.`disposal`, `set_fleet`.`coal_seam`, `set_fleet`.`coal_series`, `set_fleet`.`spv`, `set_fleet`.`gl_front`, `set_fleet`.`gl_disp`, `set_fleet`.`distance`, `tbloader`.`type`, `tbloader`.`old_eqp`, `tbloader`.`ob`, `tbloader`.`coal`, `travel_speed`.`coal` as `speed_coal`, `travel_speed`.`ob` as `speed_ob`
    FROM `set_fleet`
    LEFT JOIN `tbloader` on `set_fleet`.`cn_loader` = `tbloader`.`cn_jigsaw`
    LEFT JOIN `enum` as `status` ON `set_fleet`.`status` = `status`.`id`
    LEFT JOIN `enum` as `pit` ON `set_fleet`.`pit` = `pit`.`id`
    LEFT JOIN `enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id`
    LEFT JOIN `enum` as `area` ON `set_fleet`.`area` = `area`.`id`
    LEFT JOIN `enum` as `material` ON `set_fleet`.`material` = `material`.`id`
    LEFT JOIN `travel_speed` ON `set_fleet`.`jalur` = `travel_speed`.`id_jalur` WHERE `set_fleet`.`date` = '{$date}'";
if (empty($pit) AND empty($time) AND empty($time2) AND empty($ds)) {
    $time = empty($time) ? '00:00' : $time;
    $time2 = empty($time2) ? '23:59' : $time2;
    $sql_all = $sql_all;
} elseif ($pit == 'all') {
    $time = empty($time) ? '00:00' : $time;
    $time2 = empty($time2) ? '23:59' : $time2;
    $sql_all = $sql_all . " AND `set_fleet`.`time` BETWEEN '{$time}' AND '{$time2}'";
} else {
    $time = empty($time) ? '00:00' : $time;
    $time2 = empty($time2) ? '23:59' : $time2;
    $sql_all = $sql_all . " AND  `set_fleet`.`pit` = '{$id_pit}' AND `set_fleet`.`time` BETWEEN '{$time}' AND '{$time2}'";
}

$sql = $db->query($sql_all);


//
//perulangan dari query sql
//
$no=0;
while ($data=mysqli_fetch_assoc($sql)) {
$no++;

//sql dispacher
        $sql_dispatch = "SELECT `first_name`, `last_name` FROM `dispatch_fleet` LEFT JOIN `dispatcher` ON `dispatch_fleet`.`id_dispatch` = `dispatcher`.`id` WHERE `id_fleet` = '{$data['id']}'";
        //echo $sql_dispatch;
        $sql_dispatch = mysqli_fetch_assoc($db->query($sql_dispatch));

        //sql loading time
        $sql_loading = "SELECT `master_fleet`.`cn_hauler`, `type`, COUNT(`type`) as `total` FROM `master_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` WHERE `master_fleet`.`id_fleet` = '{$data['id']}' GROUP BY `type`";
        //echo $sql_loading;
        $sss = $db->query($sql_loading);
        $type = "";
        while ($x = mysqli_fetch_assoc($sss)) {
            $type .= 'OR `type_hauler`=\'' . $x['type'] . '\'';
        }

        //echo $type;
        if (mysqli_num_rows($sss) > 0) {
            $type = ' AND (' . substr($type, 3) . ')';
        } else {
            $type = '';
        }
        $average_sql = "SELECT AVG(`ob`) as `avg_ob`, AVG(`coal`) as `avg_coal` FROM `loading_time` WHERE `type_loader`='" . $data['type'] . "' " . $type . "";
        $loading_time = mysqli_fetch_assoc(mysqli_query($db->connection, $average_sql));

        //sql cycle speed
        $cyc = mysqli_query($db->connection, "SELECT `tbhauler`.`type`, COUNT(`tbhauler`.`type`) as `count`,`coal`, `ob`, (COUNT(`tbhauler`.`type`)*`coal`) as `count_coal`, (COUNT(`tbhauler`.`type`)*`ob`) as `count_ob` FROM `set_fleet` LEFT JOIN `master_fleet` ON `set_fleet`.`id` = `master_fleet`.`id_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` LEFT JOIN `hauler_capacity` ON `tbhauler`.`type` = `hauler_capacity`.`type` WHERE `set_fleet`.`id` = '{$data['id']}' GROUP BY `tbhauler`.`type`");
        $anu = 0;
        while ($xx = mysqli_fetch_assoc($cyc)) {
            $anu++;
            $sumob['ob' . $anu] = $xx['count_ob'];
            $sumcoal['coal' . $anu] = $xx['count_coal'];
        }


//hitung cycle speed
if (strtoupper($data['material']) == strtoupper('coal')) {
    $load = $loading_time['avg_coal'];
} else {
    $load = $loading_time['avg_ob'];
}
$load = number_format($load, 3);
$cc_distance = number_format(($data['distance']*2)/1000, 2);
$cc_travel = number_format((($data['distance']*2)/1000)/$data['speed'], 2);
$cc_loading = number_format((2+$load)/60, 2);
$cycle_speed = number_format($cc_distance/($cc_travel+$cc_loading), 2);
$cycle_speed = empty($cycle_speed) ? 0 : $cycle_speed;

//sum coal and ob kali type hauler 
$sum_coal = array_sum($sumcoal);
$sum_ob = array_sum($sumob);

//Prodty. Fleet
$cc_sd = number_format($cycle_speed/$cc_distance, 2);
if (strtoupper($data['material']) == strtoupper('coal')) {
    $sum_sum = number_format($sum_coal, 2);
} else {
    $sum_sum = number_format($sum_ob, 2);
}
//productivity cap
if (strtoupper($data['material']) == strtoupper('coal')) {
    $prodty_fleet_cap = $data['coal'];
} else {
    $prodty_fleet_cap = $data['ob'];
}
$prodty_fleet_cap = empty($prodty_fleet_cap) ? 0 : $prodty_fleet_cap;


//act
$prodty_fleet_act = number_format(floatval($cc_sd)*floatval($sum_sum), 0);
$prodty_fleet_act = str_replace(',', '', $prodty_fleet_act);
$prodty_fleet_act = empty($prodty_fleet_act) ? 0 : $prodty_fleet_act;


//Matching Factor
$matching_factor = number_format($prodty_fleet_act/$prodty_fleet_cap, 2);
$matching_factor = empty($matching_factor) ? 0 : $matching_factor;

//travel speed plan
if (strtoupper($data['material']) == strtoupper('coal')) {
    $speed_plan = number_format($data['speed_coal'],2);
} else {
    $speed_plan = number_format($data['speed_ob'],2);
}
$speed_plan = empty($speed_plan) ? 0 : $speed_plan;

//dev travel speed
$dev_speed = number_format($data['speed']-$speed_plan,2);
$dev_speed = empty($dev_speed) ? 0 : $dev_speed;


?>

            <div class="col-xs-2" style="padding: 0; float: none; display: inline-block;">
                <div class="card" style="
    border-radius:  0;
    border-left: 1px solid #999;
    border-right: 1px solid #999;
">
                    <div class="header">
                        <h5 class="title" align="center"><?php echo "$no" ;?></h5>
                    </div>
                    <table class="table" align="center">
                		<thead align="center">
                			<tr>
                                <td><?php echo $data['cn_loader'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $data['old_eqp'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $data['type'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $data['status'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $matching_factor;?></td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                            </tr>
                            <tr>
                                <td><?php echo $prodty_fleet_cap;?></td>
                            </tr>
                            <tr>
                                <td><?php echo $prodty_fleet_act;?></td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                            </tr>
                            <tr>
                                <td>Dev.</td>
                            </tr>
                            <tr>
                            	<td><?php echo $cycle_speed;?></td>
                            </tr>
                            <tr>
                                <td>Plan</td>
                            </tr>
                            <tr>
                                <td>Dev.</td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['speed']) ? 0 : $data['speed'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $speed_plan;?></td>
                            </tr>
                            <tr>
                                <td><?php echo $dev_speed;?></td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['pit']) ? '-' : $data['pit'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['material']) ? '-' : $data['material'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['jalur']) ? '-' : $data['jalur'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['disposal']) ? '-' : $data['disposal'];?></td>
                            </tr>
                            <tr>
                                <td><?php
                                    if(strtoupper($data['gl_front']) == ""){
                                        echo "-";
                                    } else {
                                        echo $data['gl_front'];
                                    }
                                    ;?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php
                                    if(strtoupper($data['gl_disp']) == ""){
                                        echo "-";
                                    } else {
                                        echo $data['gl_disp'];
                                    }
                                    ;?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['coal_seam'];
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['coal_series'];
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo empty($data['distance']) ? '-' : $data['distance'];?></td>
                            </tr>
                            <tr>
                                <td>Plan Daily</td>
                            </tr>
                            <tr>
                                <td>Plan Monthly</td>
                            </tr>
                		</thead>
                    </table>
                    <div class="header">
                        <h5 class="title">-</h5>
                    </div>
                    <table class="table table-striped">
                        <thead>

                            <?php
                            $data_id = $data['id'];
                            $loader = $data['cn_loader'];
                            $sa = "SELECT `id`,`date`, `time`,`cn_hauler`, (SELECT a.status FROM master_fleet a WHERE a.id_fleet = master_fleet.id_fleet AND a.cn_hauler = master_fleet.cn_hauler ORDER BY a.id DESC LIMIT 1) as `status` FROM `master_fleet` WHERE (`id_fleet`='" . $data_id . "' AND `date` = '" . $date . "'
                             AND `time` >= '{$time}') AND (`id_fleet`='" . $data_id . "' AND `date` = '" . $date . "' AND `time` <= '{$time2}') GROUP BY `cn_hauler` DESC ORDER BY `id` ASC";
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

                            
                            echo '<tr><td align="center"><strong>Acc: ' . number_format(($count_act_fleet/$count_plan_fleet) * 100, 1) . ' %</strong></td></tr>';

                            $sqls = mysqli_query($db->connection, $sa);
                            $jumlah_data = 0;
                            while ($data = mysqli_fetch_assoc($sqls)) {
                                if ($data['status'] == 'available') {
                                    $jumlah_data++;
                                    $hauler['h' . $jumlah_data] = $jumlah_data;
                                    echo '<tr><td align="center">' . $data['cn_hauler'] . '</td></tr>';
                                }
                            }
                            ?>
                        </thead>
                        <?php echo '<tbody id="jumlah_row' . $no . '" data-id="' . $jumlah_data . '"></tbody>';?>
                    </table>
                    </div>
            </div>
            <?php }

            ?>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        var i;
        var text;
        for (var i = 1; i <= <?php echo max($hauler);?>; i++) {
            text += '<tr><td align="center">' + i + '<td></td>';
        }
        $("#jumlah_hauler").html(text);

        <?php 
        for($i = 1; $i <= $no; $i++) {
        ?>
        var row = $("#jumlah_row<?php echo $i;?>").attr('data-id');
        var total = <?php echo max($hauler);?>-row;
        var texts;
        texts = '';
        for (var i = 0; i < total; i++) {
            texts += '<tr><td align="center">&nbsp;<td></td>';
        }
        $("#jumlah_row<?php echo $i;?>").html(texts);
        <?php } ?>
    });
</script>