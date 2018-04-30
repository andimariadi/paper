<?php

include 'system/crud.php';
$db = new crud();


$shoutbox=$db->query("SELECT * FROM shoutbox ORDER BY id DESC");
while($d=mysqli_fetch_array($shoutbox)){
  $pesan = $d['message'];
  $pesan = str_replace(":-)", "<img src=\"smiley/1.gif\">", $pesan);
  $pesan = str_replace(":-(", "<img src=\"smiley/2.gif\">", $pesan);
  $pesan = str_replace(";-)", "<img src=\"smiley/3.gif\">", $pesan);
  $pesan = str_replace(";-D", "<img src=\"smiley/4.gif\">", $pesan);
  $pesan = str_replace(";;-)", "<img src=\"smiley/5.gif\">", $pesan);
  $pesan = str_replace("<:D>", "<img src=\"smiley/6.gif\">", $pesan);
  echo '<div class="row"><div class="col-md-12"><div class="col-xs-4">
              <span class=shout><b>' . $d['username'] . ' : </b></span>
            </div>
            <div class="col-xs-8"><span class="shout">' . $pesan . '</span>
            <br /><span class="shoutdate" style="color: #999; font-size: 12px;">' . $d['date'] . ' / ' . $d['time'] . ' WIB</span>
            </div>
            </div><hr color="#e0cb91" noshade="noshade">
        </div>';
}
?>