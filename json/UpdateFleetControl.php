<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['loader'])) {
    $id = addslashes($_POST['id']);
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
    $sql = $db->update('set_fleet', array('cn_loader' => $loader,'speed' => $speed,'status' => $status,'pit' => $pit,'jalur' => $jalur,'area' => $area, 'disposal' => $disp,'coal_seam' => $seam, 'material' => $material,'coal_series' => $series, 'spv' => $spv,'gl_front' => $gl_front,'gl_disp' => $gl_disp, 'distance' => $distance), array('id' => $id));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>