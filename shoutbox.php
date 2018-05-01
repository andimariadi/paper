<?php
require 'system/crud.php';
$db = new crud();
$query = "SELECT `date`, `time`, `message`, `first_name`, `last_name` FROM `shoutbox` LEFT JOIN `dispatcher` ON `shoutbox`.`username` = `dispatcher`.`id` ORDER BY `shoutbox`.`id` DESC";

$hasil = mysqli_query($db->connection, $query);
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  while($x = mysqli_fetch_array($hasil)){
    $h['msg'] = str_replace(array(':-)', ':-(', ';-)', ';-D', ';;-)', '<:D>'), array('<img src="smiley/1.gif" />', '<img src="smiley/2.gif" />', "<img src=\"smiley/3.gif\">", "<img src=\"smiley/4.gif\">", "<img src=\"smiley/5.gif\">", "<img src=\"smiley/6.gif\">"), $x['message']);
    $h['name'] = $x["first_name"] . ' ' . $x["last_name"];
    $h['date'] = $x['date'] . ' / ' . $x['time'] . ' WIB';
    array_push($response["data"], $h);
  }
}else {
  $response["data"]="empty";  
}
echo json_encode($response);
?>