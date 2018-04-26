<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['id'])) {
  $id = addslashes($_POST['id']);
  $sql = $db->update('master_fleet', array('status' => 'delete'), array('id' => $id));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>