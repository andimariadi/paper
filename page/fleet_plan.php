<?php
$id = addslashes($_SESSION['iduser']);
$p = $pit;
$notif = "";
if (isset($_POST['import'])) {
    if ($_FILES['userfile']['tmp_name'] != '') {
      $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
      $baris = $data->rowcount($sheet_index=0);
      for ($i=2; $i <= $baris; $i++){
        $material         = $data->val($i, 1);
        $material         = strtoupper($material);
        $cn_loader        = $data->val($i, 2);
        $distance         = $data->val($i, 4);
        $matching_factor  = $data->val($i, 5);
        $prodty           = $data->val($i, 6);
        $travel_speed     = $data->val($i, 7);
        $cycle_speed      = $data->val($i, 8);
        $CAT777           = $data->val($i, 9);
        $CAT785           = $data->val($i, 10);
        $CAT789           = $data->val($i, 11);
        $EH1700           = $data->val($i, 12);
        $EH3500           = $data->val($i, 13);
        $HD1500           = $data->val($i, 14);
        $HD785            = $data->val($i, 15);
        $HD785_DUCKTAIL   = $data->val($i, 16);
        $HD785_JUMBO      = $data->val($i, 17);
        $PIT              = $data->val($i, 18 );
        $PIT              = strtoupper($PIT);
        $hauler           = 'CAT777:' . $CAT777 . ';CAT785:' . $CAT785 . ';CAT789:' . $CAT789 . ';EH1700:' . $EH1700 . ';EH3500:' . $EH3500 . ';HD1500:' . $HD1500 . ';HD785:' . $HD785 . ';HD785_DUCKTAIL:' . $HD785_DUCKTAIL . ';HD785_JUMBO:' . $HD785_JUMBO;
        $cari = mysqli_num_rows(mysqli_query($db->connection, "SELECT * FROM `tbloader` WHERE `cn_jigsaw`='$cn_loader'"));
        if ($cari > 0) {
          $sql_material       = mysqli_fetch_assoc($db->query("SELECT `id` FROM `enum` WHERE `type` = 'material' AND `name` = '{$material}'"));
          $sql_pit            = mysqli_fetch_assoc($db->query("SELECT `id` FROM `enum` WHERE `type` = 'pit' AND `name` = '{$PIT}'"));
          $db->insert('plan_set_fleet', array('date' => date('Y-m-d'), 'time' => date('H:i:s'), 'cn_loader' => $cn_loader, 'distance' => $distance, 'matching_factor' => $matching_factor, 'prodty' => $prodty, 'travel_speed' => $travel_speed, 'cycle_speed' => $cycle_speed, 'count_hauler' => $hauler, 'pit' => $sql_pit['id'], 'material' => $sql_material['id']));
        }
      }
      echo '<script>alert(\'Your data insert is saved\');window.location.assign(\'?plan_fleet\')</script>';
    }
}


?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Planning Fleet Control</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p class="category">Here is a list fleet control user or all user (for administrator)</p>
                                  </div>
                                  <div class="col-md-offset-4 col-md-2">
                                    <a href="#" data-toggle="modal" data-target="#ModalPlan" class="btn btn-success">Import Plan</a>
                                  </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                      <th>Date</th>
                                    	<th>Loader</th>
                                    	<th>PIT</th>
                                    	<th>Material</th>
                                    	<th>Distance</th>
                                      <th>Details Hauler</th>
                                      <th>Count Hauler</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 0;
                                    //setting halaman
                                        $p = empty($p) ? 1 : $p;
                                        $per_page = 10;
                                        $start = ($p - 1) * $per_page;
                                        $sql = "SELECT `plan_set_fleet`.`id`, `plan_set_fleet`.`date`, `plan_set_fleet`.`time`, `plan_set_fleet`.`cn_loader`, `material`.`name` as `material`,`plan_set_fleet`.`distance`, `plan_set_fleet`.`matching_factor`, `plan_set_fleet`.`prodty`, `plan_set_fleet`.`travel_speed`, `plan_set_fleet`.`cycle_speed`, `plan_set_fleet`.`count_hauler`, `pit`.`name` as `pit`  FROM `plan_set_fleet` LEFT JOIN `enum` as `material` ON `plan_set_fleet`.`material` = `material`.`id` LEFT JOIN `enum` as `pit` ON `plan_set_fleet`.`pit` = `pit`.`id`";
                                        
                                        $sql_limit = $sql . " LIMIT $start, $per_page";
                                        $total = mysqli_num_rows($db->query($sql));
                                        $page_total =  ceil($total / $per_page);

                                        //olah data
                                        $sql = $db->query($sql_limit);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                          $no++;
                                          $type_name = explode(';', $data['count_hauler']);
                                          $hauler = "";
                                          for ($i=0; $i < count($type_name); $i++) { 
                                            $hauler[] = explode(':', $type_name[$i]);
                                          }
                                          $haulers = "";
                                          $countx = array();
                                          for ($i=0; $i < 9; $i++) { 
                                            $count = empty($hauler[$i][1]) ? 0 : $hauler[$i][1];
                                            $countx['a' . $i] = empty($hauler[$i][1]) ? 0 : $hauler[$i][1];
                                            $haulers .= '<b>' . $count . '</b>: ' . $hauler[$i][0] . '; ';
                                          }
                                          $jumlah_all = array_sum($countx);
                                    ?>
                                        <tr>
                                        	<td><?php echo $data['date']; ?></td>
                                        	<td><strong><?php echo $data['cn_loader']; ?></strong></td>
                                        	<td><?php echo $data['pit']; ?></td>
                                        	<td><?php echo $data['material']; ?></td>
                                        	<td><?php echo $data['distance']; ?></td>
                                            <td><?php echo $haulers; ?></td>
                                            <td><?php echo $jumlah_all; ?> Haulers</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                        <nav aria-label="...">
                                            <ul class="pagination pagination-lg">

                                              <?php
                                               $paging_info = $db->get_paging_info($page_total,1,$p);
                                               ?>
                                                <?php if($paging_info['curr_page'] > 1) : ?>
                                                      <li class="page-item"><a href='?plan_fleet&1' title='Page 1' class="page-link">First</a></li>
                                                      <li class="page-item"><a href='?plan_fleet&<?php echo ($paging_info['curr_page'] - 1);?>' title='Page <?php echo ($paging_info['curr_page'] - 1); ?>' class="page-link">Prev</a></li>
                                                  <?php
                                                endif; 

                                                      $max = 7;
                                                      if($paging_info['curr_page'] < $max)
                                                          $sp = 1;
                                                      elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
                                                          $sp = $paging_info['pages'] - $max + 1;
                                                      elseif($paging_info['curr_page'] >= $max)
                                                          $sp = $paging_info['curr_page']  - floor($max/2);
                                                  ?>

                                                  <?php if($paging_info['curr_page'] >= $max) : ?>
                                                      <li class="page-item"><a href='?plan_fleet&1' title='Page 1' class="page-link">1</a></li>
                                                      <li class="page-item"><a href='#' title='..' class="page-link">..</a></li>
                                                  <?php endif; ?>
                                                  <?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>
                                                      <?php
                                                          if($i > $paging_info['pages'])
                                                              continue;
                                                      ?>
                                                      <?php if($paging_info['curr_page'] == $i) : ?>
                                                          <li class="page-item disabled"><a href="#" class="page-link"><?php echo $i; ?></a></li>
                                                      <?php else : ?>
                                                          <li class="page-item"><a href='?plan_fleet&<?php echo $i;?>' title='Page <?php echo $i; ?>' class="page-link"><?php echo $i; ?></a></li>
                                                      <?php endif; ?>
                                                  <?php endfor; ?>
                                                  <?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>
                                                      <li class="page-item"><a href='#' title='..' class="page-link">..</a></li>
                                                      <li class="page-item"><a href='?plan_fleet&<?php echo $paging_info['pages'];?>' title='Page <?php echo $paging_info['pages']; ?>' class="page-link"><?php echo $paging_info['pages']; ?></a></li>
                                                  <?php endif; ?>
                                                  <?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>
                                                      <li class="page-item"><a href='?plan_fleet&<?php echo ($paging_info['curr_page'] + 1);?>' title='Page <?php echo ($paging_info['curr_page'] + 1); ?>' class="page-link">Next</a></li>
                                                      <li class="page-item"><a href='?plan_fleet&<?php echo $paging_info['pages'];?>' title='Page <?php echo $paging_info['pages']; ?>' class="page-link">Last</a></li>
                                                  <?php endif; ?>
                                            </ul>
                                          </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>