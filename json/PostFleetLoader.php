<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['id'])) {
  $id = addslashes($_POST['id']);
  $hauler = addslashes(strtoupper($_POST['hauler']));
  $sql = $db->insert('master_fleet', array('id_fleet' => $id, 'cn_hauler' => $hauler, 'time' => date('H:i:s'), 'date' => date('Y-m-d'), 'status' => 'available'));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>