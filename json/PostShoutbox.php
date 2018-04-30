<?php
require '../system/crud.php';
$db = new crud();

if (isset($_POST['msg'])) {
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $msg = addslashes($_POST['msg']);
    $sql = $db->insert('shoutbox', array('id' => '','date' => $date,'time' => $time,'message' => $msg, 'username' => $_SESSION['username']));
  if (!$sql) {
    echo 'success';
  } else {
    echo 'failed';
  }
}
?>
    