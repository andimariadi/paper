<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['id'])) {
  $id = addslashes($_POST['id']);
  $sql = $db->delete('set_fleet', array('id' => $id));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>