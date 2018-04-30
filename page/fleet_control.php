<?php
$id_pit = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT `id` FROM `enum` WHERE `name`='" . urldecode($pit) . "' AND `type`='pit'"));
$id_pit = $id_pit['id'];
$notif = "";
?>
<div class="content">
<div class="container-fluid">
        <div class="row">
            <div id="notify"></div>
            <div class="col-xs-12 col-sm-3">
                <div class="card">
                    <div class="content">
                        <form method="post" id="fleet_control">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Loader Fleet</label>
                                <select class="form-control" name="loader" autocomplete="off">
                                    <?php
                                    $sql = mysqli_query($db->connection, "SELECT * FROM `tbloader` ORDER BY `cn_jigsaw` DESC");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        echo '<option value="' . $data['cn_jigsaw'] . '">' . $data['cn_jigsaw'] . '</option>';
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
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">PIT</label>
                                <select class="form-control" name="pit" autocomplete="off" id="pit">
                                        <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='pit'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
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
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                        ?>
                                </select>

                            </div>
                            <div id="afk">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jalur</label>
                                <select class="form-control" name="jalur" autocomplete="off" id="jalur">
                                <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='jalur'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Area</label>
                                <select class="form-control" name="area" autocomplete="off" id="area">
                                <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='area'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Disposal</label>
                                <input type="text" class="form-control" placeholder="Enter Disposal" name="disp" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supervisor</label>
                                <input type="text" class="form-control" placeholder="Enter Supervisor" name="spv" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Leader Front</label>
                                <input type="text" class="form-control" placeholder="Enter Group Leader" name="gl_front" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Leader Disposal</label>
                                <input type="text" class="form-control" placeholder="Enter Group Leader" name="gl_disp" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4"><label for="exampleInputEmail1">Coal Quality</label></div>
                                    <div class="col-xs-4"><input type="text" class="form-control" placeholder="Seam" name="seam" autocomplete="off" /></div>
                                    <div class="col-xs-4"><input type="text" class="form-control" placeholder="Series" name="series" autocomplete="off" /></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Distance</label>
                                <input type="number" class="form-control" placeholder="Enter Distance" name="distance" autocomplete="off" />
                            </div>
                            <a href="#" class="btn btn-primary" id="save_fleet"><i class="ti-plus"></i> Add Fleet</a>
                            </div>
                        </form>

                        <!-- update -->
                        <form method="post" id="update_control">
                            
                        </form>
                    </div>
                </div>
            </div>

            <!--- for fleet -->
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Fleet Controls</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="exampleFormControlSelect1">Area Pit</label>
                                        <select class="form-control" name="pit" id="id_pit">
                                            <option value="all">ALL AREA</option>
                                        <?php
                                        $sql = mysqli_query($db->connection, "SELECT * FROM `enum` WHERE `type`='pit'");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            if ($id_pit == $data['id']) {
                                                echo '<option value="' . $data['name'] . '" selected>' . $data['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $data['name'] . '">' . $data['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleFormControlSelect1">Date</label>
                                        <input type="date" name="d1" class="form-control" id="d1" value="<?php echo $ds;?>" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="exampleFormControlSelect1">Time Start</label>
                                        <input type="time" name="ts" class="form-control" id="ts" value="<?php echo $time;?>" />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="exampleFormControlSelect1">Time End</label>
                                        <input type="time" name="te" class="form-control" id="te" value="<?php echo $time2;?>" />
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn btn-primary" id="view_fleet">View Fleet</a>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </form>
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th width="50px">Loader</th>
                                    <th>Pit</th>
                                    <th>Jalur</th>
                                    <th>Area</th>
                                    <th>Hauler</th>
                                    <th width="250px"></th>
                                </tr>
                            </thead>
                            <tbody id="fleet_load">
                            </tbody>
                        </table>
                        <?php
                            if (empty($pit) AND empty($ds) AND empty($time) AND empty($time2)) {
                                echo '<a href="?fleet_all" class="btn btn-primary">View All Fleet</a>';
                            } else {
                                echo '<a href="?fleet_all&' . $pit . '&' . $ds . '&' . $time . '&' . $time2 . '" class="btn btn-primary">View All Fleet</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
</script>