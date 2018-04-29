<?php
require '../system/crud.php';
$db = new crud();
$pit = empty($_GET['pit']) ? '' : $_GET['pit'];
$ds = empty($_GET['ds']) ? date('Y-m-d') : $_GET['ds'];
$time = empty($_GET['time']) ? '00:00:00' : $_GET['time'];
$time2 = empty($_GET['time2']) ? '23:59:59' : $_GET['time2'];
$id_pit = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT `id` FROM `enum` WHERE `name`='" . urldecode($pit) . "' AND `type`='pit'"));
$id = $id_pit['id'];
if (empty($pit)) {
  $sql = "SELECT `set_fleet`.`id`, `cn_loader`, `spit`.`name` as `pit`, `jalur`.`name` as `jalur` , `area`.`name` as `area` FROM set_fleet LEFT JOIN `fleet_control`.`enum` as `spit` ON `set_fleet`.`pit` = `spit`.`id` LEFT JOIN `fleet_control`.`enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id` LEFT JOIN `fleet_control`.`enum` as `area` ON `set_fleet`.`area` = `area`.`id` WHERE `date`='" . date('Y-m-d') . "' GROUP BY `cn_loader`, `pit`, `jalur` ORDER BY `id` ASC";
} elseif ($pit == 'all') {
  $sql = "SELECT `set_fleet`.`id`, `cn_loader`, `spit`.`name` as `pit`, `jalur`.`name` as `jalur` , `area`.`name` as `area` FROM set_fleet LEFT JOIN `fleet_control`.`enum` as `spit` ON `set_fleet`.`pit` = `spit`.`id` LEFT JOIN `fleet_control`.`enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id` LEFT JOIN `fleet_control`.`enum` as `area` ON `set_fleet`.`area` = `area`.`id` WHERE `date`='{$ds}' AND `time` BETWEEN '{$time}' AND '{$time2}' GROUP BY `cn_loader`, `pit`, `jalur` ORDER BY `id` ASC";
} else {
  $sql = "SELECT `set_fleet`.`id`, `cn_loader`, `spit`.`name` as `pit`, `jalur`.`name` as `jalur` , `area`.`name` as `area` FROM set_fleet LEFT JOIN `fleet_control`.`enum` as `spit` ON `set_fleet`.`pit` = `spit`.`id` LEFT JOIN `fleet_control`.`enum` as `jalur` ON `set_fleet`.`jalur` = `jalur`.`id` LEFT JOIN `fleet_control`.`enum` as `area` ON `set_fleet`.`area` = `area`.`id` WHERE `pit`='{$id}' AND `date`='{$ds}' AND `time` BETWEEN '{$time}' AND '{$time2}' GROUP BY `cn_loader`, `pit`, `jalur` ORDER BY `id` ASC";
}

$hasil = mysqli_query($db->connection, $sql);
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  $no = 0;
  while($x = mysqli_fetch_array($hasil)){
    $dd = mysqli_query($db->connection, "SELECT `id`,`date`, `time`,`cn_hauler`, (SELECT a.status FROM master_fleet a WHERE a.id_fleet = master_fleet.id_fleet AND a.cn_hauler = master_fleet.cn_hauler ORDER BY a.id DESC LIMIT 1) as `status` FROM `master_fleet` WHERE `id_fleet`='{$x["id"]}' GROUP BY `cn_hauler` ASC ORDER BY `id` ASC");
    $no++;
    $h['no'] = $no;
    $h['id'] = $x["id"];
  	$h['loader'] = $x["cn_loader"];
    $h['pit'] = $x["pit"];
    $h['jalur'] = $x["jalur"];
    $h['area'] = $x["area"];
    
    if (mysqli_num_rows($dd) > 0) {
      $s = "";
      while ($d = mysqli_fetch_assoc($dd)) {
        if ($d['status'] == 'available') {
          $s .= ", " . $d['cn_hauler'];
        }
      }
      $h['hauler'] = substr($s, 2, 31) . '...';
    } else {
      $s = "";
      $h['hauler'] = $s;
    }
    array_push($response["data"], $h);
  }
}else {
  $response["data"]="empty";  
}
echo json_encode($response);
?>