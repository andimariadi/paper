<?php

include 'system/crud.php';
$db = new crud();


$page = explode('?', $_SERVER['REQUEST_URI'], 2);
$page = empty($page[1]) ? $page[0] : $page[1];
$adev = explode('&', $page);
//print_r($adev);

$pit = empty($adev[1]) ? null : $adev[1];
$ds = empty($adev[2]) ? null : $adev[2];
$time = empty($adev[3]) ? null : $adev[3];
$time2 = empty($adev[4]) ? null : $adev[4];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Paper Dashboard by Creative Tim</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet">

      <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/action.js"></script>
</head>

<body>
  <div class="wrapper">
    <?php include 'include/sidebar.php';?>

    <div class="main-panel">
      <?php include 'include/nav.php';?>


      <?php
      
      switch($page){
        default:
          include "page/home.php"; 
        break; 
        case "home":
            include "page/home.php";
        break;
        case "fleet":
            include "page/fleet_control.php";
        break; 
        case "fleet&{$pit}":
            include "page/fleet_control.php";
        break; 
        case "fleet&{$pit}&{$ds}&{$time}&{$time2}":
            include "page/fleet_control.php";
        break; 
        case "detail":
            include "page/detail_control.php";
        break; 
        case "detail&{$pit}":
            include "page/detail_control.php";
        break; 
      }
      ?>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>

  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="headermodalfleet">Fleet Control</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ClearedField('setLoad')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post" id="fleet_set">
                    <input type="hidden" name="id" id="id_fleet" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hauler</label>
                        <select class="form-control" name="hauler">
                            <?php
                            $sql = mysqli_query($db->connection, "SELECT * FROM `tbhauler`");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                echo '<option value="' . $data['cn_hauler'] . '">' . $data['cn_hauler'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <a href="#" id="saved" class="btn btn-primary"><i class="ti-plus"></i> Add Hauler</a>
                </form>
            </div>
            <div class="col-md-6">
                <div class="header">
                  <div id="notif"></div>
                    <h4 id="head_f">Settings Fleet</h4>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hauler</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="setLoad"></tbody>
                    
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ClearedField('setLoad')">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>