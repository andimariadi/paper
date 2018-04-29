<?php
require '../system/crud.php';
$db = new crud();

if (isset($_GET['id'])) {
  $id = addslashes($_GET['id']);
  $query = "SELECT `id`,`date`, `time`,`cn_hauler`, (SELECT a.status FROM master_fleet a WHERE a.id_fleet = master_fleet.id_fleet AND a.cn_hauler = master_fleet.cn_hauler ORDER BY a.id DESC LIMIT 1) as `status` FROM `master_fleet` WHERE `id_fleet`='{$id}' GROUP BY `cn_hauler` ASC ORDER BY `id` ASC";
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