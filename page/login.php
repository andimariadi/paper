<?php
if (isset($_POST['login'])) {
  $username = addslashes($_POST['user']);
  $pass = sha1(addslashes($_POST['pass']));
  $s = mysqli_query($db->connection, "SELECT * FROM `dispatcher` WHERE `username`='{$username}'");
  if (mysqli_num_rows($s) > 0) {
    $verif = mysqli_fetch_assoc($s);
    if ($verif['password'] == $pass) {
      $_SESSION['iduser'] = $verif['id'];
      $_SESSION['username'] = $verif['username'];
      //$_SESSION['password'] = $verif['password'];
      //$_SESSION['level'] = $verif['type'];
      echo '<script type="text/javascript">
              window.location.assign("index.php?home");
            </script>';
    } else {
      echo '<script type="text/javascript">
            showNotification();
            </script>';
    }
  } else {
    echo '<script type="text/javascript">
            showNotification()
            </script>';
  }
}
?>
<div class="container" style="margin-top: 100px;">
  <div class="row">
    <div class="col-md-4">
    </div>
      <div class="card col-md-4 mx-auto" style="
    padding-bottom: 20px;
">
        <div class="card-body px-5 py-5">
          <h3 class="card-title text-left mb-3">Login</h3>
          <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control p_input" placeholder="Username" name="user" />
            </div>
            <div class="form-group">
              <input type="password" class="form-control p_input" placeholder="Password" name="pass" />
            </div>
            <div class="text-center">
              <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">LOG IN</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>