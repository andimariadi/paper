<?php
require '../system/crud.php';
$db = new crud();

if (isset($_GET['id'])) {
  $id = addslashes($_GET['id']);
  $query = "SELECT `id`,`date`, `time`,`cn_hauler`,MAX(`status`) as `status` FROM `master_fleet` WHERE `id_fleet`='{$id}' GROUP BY `cn_hauler` DESC ORDER BY `id` ASC";
}

$hasil = mysqli_query($db->connection, $query);
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  $no = 0;
  while($x = mysqli_fetch_array($hasil)){
    if ($x['status'] == 'available') {
      $no++;
      $h['no'] = $no;
      $h['id'] = $x["id"];
      $h['hauler'] = $x["cn_hauler"];
      $h['status'] = $x["status"];
    } else {
      $h['no'] = 0;
      $h['id'] = $x["id"];
      $h['hauler'] = $x["cn_hauler"];
      $h['status'] = $x["status"];
    }
    array_push($response["data"], $h);
  }
}else {
  $response["data"]="empty";  
}
echo json_encode($response);
?>