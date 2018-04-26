<?php
//SELECT * FROM `set_fleet` WHERE `id`=''
require '../system/crud.php';
$db = new crud();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$datas = $db->where('set_fleet', array('id' => $id));
if (mysqli_num_rows($datas) > 0) {
    while ($dd = mysqli_fetch_assoc($datas)) {
?>
<input type="hidden" name="id" value="<?php echo $dd['id'];?>" />
<div class="form-group">
                                <label for="exampleFormControlSelect1">Loader Fleet</label>
                                <select class="form-control" name="loader" autocomplete="off" readonly>
                                    <?php
                                    $sql = mysqli_query($db->connection, "SELECT * FROM `tbloader` ORDER BY `cn_jigsaw` DESC");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        if ($dd['cn_loader'] == $data['cn_jigsaw']) {
                                            echo '<option value="' . $data['cn_jigsaw'] . '" selected>' . $data['cn_jigsaw'] . '</option>';
                                        } else {
                                            echo '<option value="' . $data['cn_jigsaw'] . '">' . $data['cn_jigsaw'] . '</option>';
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" name="status" autocomplete="off">
                                        <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='status'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($dd['status'] == $data['id']) {
                                                echo '<option value="' . $data['id'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Travel Speed</label>
                                <input type="text" class="form-control" placeholder="Enter Travel Speed" name="speed" autocomplete="off" value="<?php echo $dd['speed'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">PIT</label>
                                <select class="form-control" name="pit" autocomplete="off" id="pit2">
                                        <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='pit'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($dd['pit'] == $data['id']) {
                                                echo '<option value="' . $data['id'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Material</label>
                                <select class="form-control" name="material" autocomplete="off">
                                <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='material'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($dd['material'] == $data['id']) {
                                                echo '<option value="' . $data['id'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                </select>

                            </div>
                            <div id="afk">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jalur</label>
                                <select class="form-control" name="jalur" autocomplete="off" id="jalur2">
                                <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='jalur' AND `refid`='" . $dd['pit'] . "'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($dd['jalur'] == $data['id']) {
                                                echo '<option value="' . $data['id'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Area</label>
                                <select class="form-control" name="area" autocomplete="off" id="area2">
                                <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='area' AND `refid`='" . $dd['pit'] . "'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($dd['area'] == $data['id']) {
                                                echo '<option value="' . $data['id'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Disposal</label>
                                <input type="text" class="form-control" placeholder="Enter Disposal" name="disp" autocomplete="off" value="<?php echo $dd['disposal'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supervisor</label>
                                <input type="text" class="form-control" placeholder="Enter Supervisor" name="spv" autocomplete="off" value="<?php echo $dd['spv'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Leader Front</label>
                                <input type="text" class="form-control" placeholder="Enter Group Leader" name="gl_front" autocomplete="off" value="<?php echo $dd['gl_front'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Leader Disposal</label>
                                <input type="text" class="form-control" placeholder="Enter Group Leader" name="gl_disp" autocomplete="off" value="<?php echo $dd['gl_disp'];?>" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4"><label for="exampleInputEmail1">Coal Quality</label></div>
                                    <div class="col-xs-4"><input type="text" class="form-control" placeholder="Seam" name="seam" autocomplete="off" value="<?php echo $dd['coal_seam'];?>" /></div>
                                    <div class="col-xs-4"><input type="text" class="form-control" placeholder="Series" name="series" autocomplete="off" value="<?php echo $dd['coal_series'];?>" /></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Distance</label>
                                <input type="number" class="form-control" placeholder="Enter Distance" name="distance" autocomplete="off" value="<?php echo $dd['distance'];?>" />
                            </div>
                            <a href="#" class="btn btn-success" id="update_fleet"><i class="ti-save"></i> Update Fleet</a>
                            <a href="#" class="btn btn-default" id="btl_fleet"><i class="ti-close"></i> Cancel</a>
                            </div>
<?php }
} ?>