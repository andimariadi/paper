<?php
require '../system/crud.php';
$db = new crud();

if (isset($_GET['id'])) {
  $id = addslashes($_GET['id']);
  //SELECT `id`, `cn_hauler`, `status` FROM `master_fleet` WHERE `id_fleet`='1' AND `time` BETWEEN '00:00' AND '16:59' GROUP BY `cn_hauler` DESC ORDER BY `id` ASC
  $query = "SELECT `id`, `cn_hauler` FROM `master_fleet` WHERE `status`='available' AND `id_fleet`='{$id}' GROUP BY `cn_hauler` ASC ORDER BY `id` ASC";
}

$hasil = mysqli_query($db->connection, $query);
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  $no = 0;
  while($x = mysqli_fetch_array($hasil)){
    $no++;
    $h['no'] = $no;
    $h['id'] = $x["id"];
  	$h['hauler'] = $x["cn_hauler"];
    array_push($response["data"], $h);
  }
}else {
  $response["data"]="empty";  
}
echo json_encode($response);
?>