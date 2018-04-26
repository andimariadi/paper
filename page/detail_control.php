<?php
    $id = addslashes($pit);
    $sql = $db->query("SELECT `set_fleet`.`id`, `set_fleet`.`date`, `set_fleet`.`shift`, `set_fleet`.`cn_loader`, `set_fleet`.`speed`, `status`.`name` as `status`, `pit`.`name` as `pit`, `jalur`.`name` as `jalur`, `material`.`name` as `material`, `set_fleet`.`disposal`, `set_fleet`.`coal_seam`, `set_fleet`.`coal_series`, `set_fleet`.`spv`, `set_fleet`.`gl_front`, `set_fleet`.`gl_disp`, `set_fleet`.`distance`, `tbloader`.`type`, `tbloader`.`old_eqp`, `tbloader`.`ob`, `tbloader`.`coal`, `travel_speed`.`coal` as `speed_coal`, `travel_speed`.`ob` as `speed_ob` FROM `set_fleet` LEFT JOIN `tbloader` on `set_fleet`.`cn_loader` = `tbloader`.`cn_jigsaw`LEFT JOIN `enum` as `status` ON `set_fleet`.`status` = `status`.`id` LEFT JOIN `enum` as `pit` ON `set_fleet`.`pit` = `pit`.`id` LEFT JOIN `enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id` LEFT JOIN `enum` as `material` ON `set_fleet`.`material` = `material`.`id` LEFT JOIN `travel_speed` ON `set_fleet`.`jalur` = `travel_speed`.`id_jalur` WHERE `set_fleet`.`id` = '{$id}'");
    while ($data = mysqli_fetch_assoc($sql)) {
        $sss = $db->query("SELECT `master_fleet`.`cn_hauler`, `type`, COUNT(`type`) as `total` FROM `master_fleet` LEFT JOIN `tbhauler` ON `master_fleet`.`cn_hauler` = `tbhauler`.`cn_hauler` WHERE `master_fleet`.`id_fleet` = '{$id}' GROUP BY `type`");
        while ($x = mysqli_fetch_assoc($sss)) {
            $type .= 'OR `type_hauler`=\'' . $x['type'] . '\'';
        }
        $type = substr($type, 3);
        $loading_time = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT AVG(`ob`) as `avg_ob`, AVG(`coal`) as `avg_coal` FROM `loading_time` WHERE `type_loader`='" . $data['type'] . "' AND (" . $type . ")"));



//hitung cycle speed
if (strtoupper($data['material']) == strtoupper('coal')) {
    $load = $loading_time['avg_coal'];
} else {
    $load = $loading_time['avg_ob'];
}

$cc_distance = number_format(($data['distance']*2)/1000, 2);
$cc_travel = number_format((($data['distance']*2)/1000)/$data['speed'], 2);
$cc_loading = number_format((2+$load)/60, 2);
$cycle_speed = number_format($cc_distance/($cc_travel+$cc_loading), 2);
?>
<div class="content">
<div class="container-fluid">
        <div class="row">
            <div id="notify"></div>
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
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td rowspan="4">Prodty. Fleet</td>
                                    <td>Cap.</td>
                                    <th><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['coal'];
                                    } else {
                                        echo $data['ob'];
                                    }
                                    ?></th>
                                </tr>
                                <tr>
                                    <td>Act.</td>
                                    <th>
                                        <?php
                                        echo number_format($cycle_speed/($cc_distance), 2);
                                        echo number_format(number)
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
                                    <th><?php echo $data['speed'];?></th>
                                </tr>
                                <tr>
                                    <td>Plan</td>
                                    <th><?php
                                    if (strtoupper($data['material']) == strtoupper('coal')) {
                                        echo $data['speed_coal'];
                                    } else {
                                        echo $data['speed_ob'];
                                    }
                                    ?></th>
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
                        <div  style="overflow-y: scroll;">
                            <table class="table">
                                <tr>
                                    <?php

                                    for ($i=0; $i < 24; $i++) { 
                                        if ($i < 10) {
                                            $i = '0'. $i;
                                        }
                                        echo '<th>' . $i . ':00</th>';
                                    }
                                    ?>
                                </tr>
                                <?php
                                $sq = mysqli_query($db->connection, "SELECT `time`, `cn_hauler`, `status` FROM `master_fleet` WHERE `id_fleet`='1'  ORDER BY `id` ASC");
                                while ($dd = mysqli_fetch_assoc($sq)) {
                                    echo '<tr>';
                                    for ($i=0; $i < 24; $i++) { 
                                        if ($i < 10) {
                                            $i = '0'. $i;
                                        }
                                        echo '<td>';
                                            if ($dd['time'] <= $i . ':59:59') {
                                                if ($dd['status'] == 'available') {
                                                    $dump = $dd['cn_hauler'];
                                                } else {
                                                    $dump = "";
                                                }
                                            } else {
                                                $dump = "";
                                            }
                                        echo $dd['time'] . '<=' . $i . ':59:59' . $dump . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>

                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>