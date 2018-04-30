<?php
$id = addslashes($_SESSION['iduser']);
$p = $pit;
$notif = "";
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Fleet Control</h4>
                                <p class="category">Here is a list fleet control user or all user (for administrator)</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Date</th>
                                    	<th>Loader</th>
                                    	<th>PIT</th>
                                    	<th>Jalur</th>
                                    	<th>Area</th>
                                        <th>Count Hauler</th>
                                        <th>Dispatcher</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 0;
                                    //setting halaman
                                        $p = empty($p) ? 1 : $p;
                                        $per_page = 10;
                                        $start = ($p - 1) * $per_page;
                                        $sql = "SELECT `set_fleet`.*, `jalur`.`name` as `jalur`, `pit`.`name` as `pit`, `area`.`name` as `area`, `first_name`, `last_name`,
                                         (SELECT count(`cn_hauler`) FROM `master_fleet` WHERE `master_fleet`.`id_fleet` = `set_fleet`.`id`) as `count_dt` 
                                         FROM `dispatch_fleet` LEFT JOIN `set_fleet` ON `dispatch_fleet`.`id_fleet`  = `set_fleet`.`id`
                                        LEFT JOIN `enum` as `pit` ON `set_fleet`.`pit` = `pit`.`id`
                                        LEFT JOIN `enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id`
                                        LEFT JOIN `enum` as `area` ON `set_fleet`.`area` = `area`.`id`
                                        LEFT JOIN `dispatcher` ON `dispatch_fleet`.`id_dispatch` = `dispatcher`.`id`
                                        WHERE `id_dispatch` = '{$id}' AND `set_fleet`.`id` != '' ORDER BY `set_fleet`.`id` ASC";
                                        
                                        $sql_limit = $sql . " LIMIT $start, $per_page";
                                        $total = mysqli_num_rows($db->query($sql));
                                        $page_total =  ceil($total / $per_page);

                                        //olah data
                                        $sql = $db->query($sql_limit);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            $no++;
                                    ?>
                                        <tr>
                                        	<td><?php echo $no; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                        	<td><strong><a href="?detail&<?php echo $data['id']; ?>"><?php echo $data['cn_loader']; ?></a></strong></td>
                                        	<td><?php echo $data['pit']; ?></td>
                                        	<td><?php echo $data['jalur']; ?></td>
                                        	<td><?php echo $data['area']; ?></td>
                                            <td><?php echo $data['count_dt']; ?> Haulers</td>
                                            <td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
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
                                                      <li class="page-item"><a href='?hauler&1' title='Page 1' class="page-link">First</a></li>
                                                      <li class="page-item"><a href='?hauler&<?php echo ($paging_info['curr_page'] - 1);?>' title='Page <?php echo ($paging_info['curr_page'] - 1); ?>' class="page-link">Prev</a></li>
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
                                                      <li class="page-item"><a href='?hauler&1' title='Page 1' class="page-link">1</a></li>
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
                                                          <li class="page-item"><a href='?hauler&<?php echo $i;?>' title='Page <?php echo $i; ?>' class="page-link"><?php echo $i; ?></a></li>
                                                      <?php endif; ?>
                                                  <?php endfor; ?>
                                                  <?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>
                                                      <li class="page-item"><a href='#' title='..' class="page-link">..</a></li>
                                                      <li class="page-item"><a href='?hauler&<?php echo $paging_info['pages'];?>' title='Page <?php echo $paging_info['pages']; ?>' class="page-link"><?php echo $paging_info['pages']; ?></a></li>
                                                  <?php endif; ?>
                                                  <?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>
                                                      <li class="page-item"><a href='?hauler&<?php echo ($paging_info['curr_page'] + 1);?>' title='Page <?php echo ($paging_info['curr_page'] + 1); ?>' class="page-link">Next</a></li>
                                                      <li class="page-item"><a href='?hauler&<?php echo $paging_info['pages'];?>' title='Page <?php echo $paging_info['pages']; ?>' class="page-link">Last</a></li>
                                                  <?php endif; ?>
                                            </ul>
                                          </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>