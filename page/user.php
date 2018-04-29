<?php
$id = addslashes($_SESSION['iduser']);
$notif = "";
if (isset($_POST['save'])) {
    $username       = addslashes($_POST['username']);
    $email          = addslashes($_POST['email']);
    $firstname      = addslashes($_POST['firstname']);
    $lastname       = addslashes($_POST['lastname']);
    $address        = addslashes($_POST['address']);
    $city           = addslashes($_POST['city']);
    $country        = addslashes($_POST['country']);
    $zip            = addslashes($_POST['zip']);
    $about          = addslashes($_POST['about']);
    $sql = $db->update('dispatcher', array('first_name' => $firstname, 'last_name' => $lastname, 'username' => $username, 'email' => $email, 'address' => $address, 'city' => $city, 'country' => $country, 'zip_code' => $zip, 'about_me' => $about), array('id' => $id));
    if (!$sql) {
        $notif = '<div class="alert alert-success"><button type="button" aria-hidden="true" class="close">×</button><span><b> Success - </b> has been modified!</span></div>';
    }
}
    //sql detail pencarian
    $sql = $db->query("SELECT * FROM `dispatcher` WHERE `id`='{$id}'");
    while ($data = mysqli_fetch_assoc($sql)) {
        $sqla = "SELECT `id_fleet`,`cn_loader`, `date` FROM `dispatch_fleet` LEFT JOIN `set_fleet` ON `dispatch_fleet`.`id_fleet` = `set_fleet`.`id` WHERE `id_dispatch` = '{$id}' AND `set_fleet`.`id` != ''";
        $last_fleet = $sqla . " LIMIT 5";
        ?>
<div class="content">
            <div class="container-fluid">
                <?php echo $notif;?>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
                                  <h4 class="title"><?php echo $data['first_name'] . ' ' . $data['last_name'];?><br />
                                     <a href="#"><small>@<?php echo $data['username'];?></small></a>
                                  </h4>
                                </div>
                                <p class="description text-center">
                                    <?php echo $data['about_me'];?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5><?php echo mysqli_num_rows($db->query($sqla));?><br /><small>Fleet Control</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Last Fleet Control</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <?php

                                    
                                    $sql_fleet = $db->query($last_fleet);
                                    while ($value = mysqli_fetch_assoc($sql_fleet)) { ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong><?php echo $value['cn_loader'];?></strong>
                                                        <br />
                                                        <span class="text-muted"><small><?php echo $value['date'];?></small></span>
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <a href="?detail&<?php echo $value['id_fleet'];?>" class="btn btn-sm btn-success btn-icon"><i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" name="username" placeholder="Username" value="<?php echo $data['username'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" name="email" placeholder="Email" value="<?php echo $data['email'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" name="firstname" placeholder="Company" value="<?php echo $data['first_name'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" name="lastname" placeholder="Last Name" value="<?php echo $data['last_name'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" name="address" placeholder="Home Address" value="<?php echo $data['address'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control border-input" name="city" placeholder="City" value="<?php echo $data['city'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control border-input" name="country" placeholder="Country" value="<?php echo $data['country'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control border-input" name="zip" placeholder="ZIP Code" value="<?php echo $data['zip_code'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" name="about" class="form-control border-input" placeholder="Here can be your description"><?php echo $data['about_me'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="save">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<?php } ?>