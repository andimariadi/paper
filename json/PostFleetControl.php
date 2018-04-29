<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['loader'])) {
    if ((date('H:i:s') >= '07:00:00') AND (date('H:i:s') <= '18:00:00')) {
        $shift = 1;
    } else {
        $shift = 2;
    }
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $loader = addslashes($_POST['loader']);
    $status = addslashes($_POST['status']);
    $speed = addslashes($_POST['speed']);
    $pit = addslashes($_POST['pit']);
    $material = addslashes($_POST['material']);
    $jalur = addslashes($_POST['jalur']);
    $area = addslashes($_POST['area']);
    $disp = addslashes($_POST['disp']);
    $spv = addslashes($_POST['spv']);
    $gl_front = addslashes($_POST['gl_front']);
    $gl_disp = addslashes($_POST['gl_disp']);
    $seam = addslashes($_POST['seam']);
    $series = addslashes($_POST['series']);
    $distance = addslashes($_POST['distance']);
    $sql = $db->insert('set_fleet', array('id' => '','date' => $date,'time' => $time,'shift' => $shift,'cn_loader' => $loader,'speed' => $speed,'status' => $status,'pit' => $pit,'jalur' => $jalur, 'area' => $area, 'disposal' => $disp,'coal_seam' => $seam, 'material' => $material,'coal_series' => $series, 'spv' => $spv,'gl_front' => $gl_front,'gl_disp' => $gl_disp, 'distance' => $distance));
    $last_id = mysqli_insert_id($db->connection);
    $sql = $db->insert('dispatch_fleet', array('id_dispatch' => $_SESSION['iduser'],'id_fleet' => $last_id));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>
    