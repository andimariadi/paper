<?php
require '../system/crud.php';
$db = new crud();

if (isset($_GET['id'])) {
  $id = addslashes($_GET['id']);
  $query = "SELECT `id`,`name` FROM `enum` WHERE `refid`='{$id}' AND `type`='area'";
}

$hasil = mysqli_query($db->connection, $query);
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  while($x = mysqli_fetch_array($hasil)){
    $h['id'] = $x["id"];
    $h['name'] = $x["name"];
    array_push($response["data"], $h);
  }
}else {
  $response["data"]="empty";  
}
echo json_encode($response);
?>