<?php
$id = addslashes($_SESSION['iduser']);
$p = $pit;
$notif = "";
if (isset($_POST['save'])) {
  $hauler = addslashes($_POST['hauler']);
  $type = addslashes($_POST['type']);
  $loader = addslashes($_POST['loader']);
  $db->insert('tbhauler', array('cn_hauler' => $hauler, 'type' => $type, 'fix_fleet' => $loader));
}
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Haulers</h4>
                                <p class="category">Here is a list hauler</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                              <div class="col-md-8">
                              <form class="form-inline" method="post">
                                <div class="form-group mb-2">
                                  <label for="staticEmail2" class="sr-only">Hauler</label>
                                  <input type="text" name="hauler" class="form-control" id="staticEmail2" placeholder="Add Hauler here">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                  <label for="inputPassword2" class="sr-only">Type Hauler</label>
                                  <select class="form-control" name="type">
                                    <?php
                                    $sql = "SELECT * FROM `enum` WHERE `type` = 'type_hauler'";
                                    $sql = $db->query($sql);
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                      echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group mb-2">
                                  <label for="staticEmail2" class="sr-only">Fix Fleet</label>
                                  <input type="text" name="loader" class="form-control" id="staticEmail2" placeholder="Add Loader here">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" name="save">Save Hauler</button>
                              </form>
                              </div>
                              <div class="col-md-4">
                                <form class="form-inline" method="GET">
                                  <div class="form-group mb-2">
                                    <input type="text" id="val_search" class="form-control"  placeholder="Search Loader here">
                                  </div>

                                  <a href="#" class="btn btn-success mb-2" id="search">Search Now!</a>
                                </form>
                              </div>
                                <table class="table table-striped">
                                    <thead>
                                      <th>ID</th>
                                      <th>CN Hauler</th>
                                    	<th>Type</th>
                                    	<th>Fix Fleet</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 0;
                                    //setting halaman
                                        $p = empty($p) ? 1 : $p;
                                        $per_page = 10;
                                        $start = ($p - 1) * $per_page;
                                        if (isset($ds)) {
                                          $sql = "SELECT `cn_hauler`, `enum`.`name` as `type`, `fix_fleet` FROM `tbhauler` LEFT JOIN `enum` ON `tbhauler`.`type` = `enum`.`id` WHERE `cn_hauler` LIKE '{$ds}%' ORDER BY `cn_hauler` ASC";
                                        } else {
                                          $sql = "SELECT `cn_hauler`, `enum`.`name` as `type`, `fix_fleet` FROM `tbhauler` LEFT JOIN `enum` ON `tbhauler`.`type` = `enum`.`id` ORDER BY `cn_hauler` ASC";
                                        }
                                        
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
                                        	<td><strong><?php echo $data['cn_hauler']; ?></strong></td>
                                        	<td><?php echo $data['type']; ?></td>
                                        	<td><?php echo $data['fix_fleet']; ?></td>
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
<script type="text/javascript">
  $(document).on('click', '#search', function() {
    var data = $("#val_search").val();
    window.location.assign('?hauler&1&' + data);
  })
</script>