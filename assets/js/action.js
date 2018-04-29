$(document).ready(function() {
    function showNotification(){
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "ti-gift",
            message: "<b>Failed!</b> - Username or Password not valid!"

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    }
    function getUrlParameter(anu) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        return sURLVariables[anu]
    }

    getControl();

    function getControl() {
        var pit = getUrlParameter(1);
        var ds = getUrlParameter(2);
        var time = getUrlParameter(3);
        var time2 = getUrlParameter(4);
        if (!getUrlParameter(1) && !getUrlParameter(2) && !getUrlParameter(3) && !getUrlParameter(4)) {
            $.getJSON('json/GetFleetControl.php', function(jd) {
                if (jd.data == 'empty') {
                    $('#fleet_load').html('<tr><td colspan="6">Fields empty</td></tr>');
                } else {
                    var geting;
                    $.each(jd.data, function(){
                        geting += '<tr><td>' + this['no'] + '</td><td><strong><a href="#" data-toggle="modal" data-target="#exampleModal" data-id="' + this['id'] + '" data-cn="' + this['loader'] + '" id="load_act">' + this['loader'] + '</a></strong></td><td>' + this['pit'] + '</td><td>' + this['jalur'] + '</td><td>' + this['area'] + '</td><td>' + this['hauler'] + '</td><td><a href="?fleet_detail&' + this['id'] + '" class="btn btn-success btn-sm"><i class="ti-list"></i> Detail</a><a href="#" class="btn btn-primary btn-sm" data-id="' + this['id'] + '" id="edit"><i class="ti-pencil"></i> Edit</a><a href="#" class="btn btn-danger btn-sm" id="del_fleet" data-id="' + this['id'] + '"><i class="ti-trash"></i> Delete</a></td></tr>';
                    });
                    $('#fleet_load').html(geting);
                }
            });
        } else {
            $.getJSON('json/GetFleetControl.php?pit=' + pit + '&ds=' + ds + '&time=' + time + '&time2=' + time2, function(jd) {
                if (jd.data == 'empty') {
                    $('#fleet_load').html('<tr><td colspan="6">Fields empty</td></tr>');
                } else {
                    var geting;
                    $.each(jd.data, function(){
                        geting += '<tr><td>' + this['no'] + '</td><td><strong><a href="#" data-toggle="modal" data-target="#exampleModal" data-id="' + this['id'] + '" data-cn="' + this['loader'] + '" id="load_act">' + this['loader'] + '</a></strong></td><td>' + this['pit'] + '</td><td>' + this['jalur'] + '</td><td>' + this['area'] + '</td><td>' + this['hauler'] + '</td><td><a href="?fleet_detail&' + this['id'] + '" class="btn btn-success btn-sm"><i class="ti-list"></i> Detail</a><a href="#" class="btn btn-primary btn-sm" data-id="' + this['id'] + '" id="edit"><i class="ti-pencil"></i> Edit</a><a href="#" class="btn btn-danger btn-sm" id="del_fleet" data-id="' + this['id'] + '"><i class="ti-trash"></i> Delete</a></td></tr>';
                    });
                    $('#fleet_load').html(geting);
                }
            });
        }
    }



    $(document).on('click', '#save_fleet', function() {
            var data = $("#fleet_control").serialize()
            $.ajax({
                type: "POST",
                data: data,
                url: 'json/PostFleetControl.php',
                success: function(response) {
                    getControl();
                },
                error: function () {
                    console.log("errr");
                }
            });
        });
    $(document).on('click', '#del_fleet', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                data: "id=" + id,
                url: 'json/DeleteFleetControl.php',
                success: function(response) {
                    getControl();
                },
                error: function () {
                    console.log("errr");
                }
            });
        });
        $(document).on('click', '#load_act', function() {
            var cn = $(this).attr('data-cn');
            var id = $(this).attr('data-id');
            $("#headermodalfleet").html('Fleet Control ' + cn);
            $("#head_f").html('Settings Fleet ' + cn);
            $("#id_fleet").val(id);
            $.getJSON('json/GetFleetLoader.php?id=' + id, function(jd) {
                if (jd.data == 'empty') {
                    $('#setLoad').html('<tr><td colspan="3">Fields empty</td></tr>');
                } else {
                    var geting;
                    $.each(jd.data, function(){
                        if (this['status'] == 'available') {
                            geting += '<tr><td>' + this['no'] + '</td><td>' + this['hauler'] + '</td><td><button type="button" aria-hidden="true" class="close" hauler-id="' + this['hauler'] + '" data-id="' + id + '" id="delete">×</button></td></tr>';
                        }
                    });
                    $('#setLoad').html(geting);
                }
            });
        });
        $(document).on('click', '#saved', function() {
            var data = $("#fleet_set").val()
            var id = $("#id_fleet").val();
            $.ajax({
                type: "POST",
                data: 'hauler=' + data + '&id=' + id,
                url: 'json/PostFleetLoader.php',
                success: function(response) {
                    var get = $("#id_fleet").val();
                    $.getJSON('json/GetFleetLoader.php?id=' + get, function(jd) {
                        if (jd.data == 'empty') {
                            $('#setLoad').html('<tr><td colspan="3">Fields empty</td></tr>');
                        } else {
                            var geting;
                            $.each(jd.data, function(){
                                if (this['status'] == 'available') {
                                    geting += '<tr><td>' + this['no'] + '</td><td>' + this['hauler'] + '</td><td><button type="button" aria-hidden="true" class="close" hauler-id="' + this['hauler'] + '" data-id="' + get + '" id="delete">×</button></td></tr>';
                                }
                            });
                            $('#setLoad').html(geting);
                        }
                    });
                    getControl();
                },
                error: function () {
                    console.log("errr");
                }
            });
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).attr('data-id');
            var hauler = $(this).attr('hauler-id');
            $.ajax({
                type: "POST",
                data: 'id=' + id + '&hauler=' + hauler,
                url: 'json/DeleteFleetLoader.php',
                success: function(response) {
                    var get = $("#id_fleet").val();
                    $.getJSON('json/GetFleetLoader.php?id=' + get, function(jd) {
                        if (jd.data == 'empty') {
                            $('#setLoad').html('<tr><td colspan="3">Fields empty</td></tr>');
                        } else {
                            var geting;
                            $.each(jd.data, function(){
                                if (this['status'] == 'available') {
                                    geting += '<tr><td>' + this['no'] + '</td><td>' + this['hauler'] + '</td><td><button type="button" aria-hidden="true" class="close" hauler-id="' + this['hauler'] + '" data-id="' + get + '" id="delete">×</button></td></tr>';
                                }
                            });
                            $('#setLoad').html(geting);
                        }
                    });
                    getControl();
                },
                error: function () {
                    console.log("errr");
                }
            });
        });

        $(document).on('click', '#edit', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                data: 'id=' + id,
                url: 'json/FormUpdateFleetControl.php',
                success: function(response) {
                    $("#update_control").html(response);
                    $("#update_control").css('display', 'block');
                    $("#fleet_control").css('display', 'none');
                },
                error: function () {
                    console.log("errr");
                }
            });
        });

        $(document).on('click', '#update_fleet', function() {
            var data = $("#update_control").serialize();
            $.ajax({
                type: "POST",
                data: data,
                url: 'json/UpdateFleetControl.php',
                success: function(response) {
                    getControl();
                    $("#update_control").css('display', 'none');
                    $("#fleet_control").css('display', 'block');
                },
                error: function () {
                    console.log("errr");
                }
            });
        });

        $(document).on('click', '#btl_fleet', function() {
            $("#update_control").css('display', 'none');
            $("#fleet_control").css('display', 'block');
        });

        $(document).on('click', '#view_fleet', function() {
            var pit = $("#id_pit").val();
            var date = $("#d1").val();
            var ts = $("#ts").val();
            var te = $("#te").val();
            if ((!date && !ts && !te)) {
                $("#notify").html('<div class="alert alert-danger"><button type="button" aria-hidden="true" class="close">×</button><span><b> Failed - </b> Inputan tidak boleh kosong!</span></div>')
            } else {
                window.location.assign('?fleet&' + pit + '&' + date + '&' + ts + '&' + te);
            }
        });

        $(document).on('change', '#pit, #pit2', function() {
            var id = $(this).val();
            $.getJSON('json/GetJalurPit.php?id=' + id, function(jd) {
                if (jd.data == 'empty') {
                    $('#jalur').html('<option>Fields empty</option>');
                } else {
                    var geting;
                    $.each(jd.data, function(){
                        geting += '<option value="' + this['id'] + '">' + this['name'] + '</option>';
                    });
                    $('#jalur').html(geting);
                    $('#jalur2').html(geting);
                }
            });
        });

        $(document).on('change', '#pit, #pit2', function() {
            var id = $(this).val();
            $.getJSON('json/GetJalurArea.php?id=' + id, function(jd) {
                if (jd.data == 'empty') {
                    $('#jalur').html('<option>Fields empty</option>');
                } else {
                    var geting;
                    $.each(jd.data, function(){
                        geting += '<option value="' + this['id'] + '">' + this['name'] + '</option>';
                    });
                    $('#area').html(geting);
                    $('#area2').html(geting);
                }
            });
        });



        var id = $("#pit, #pit2").val();
        $.getJSON('json/GetJalurPit.php?id=' + id, function(jd) {
            if (jd.data == 'empty') {
                $('#area').html('<option>Fields empty</option>');
            } else {
                var geting;
                $.each(jd.data, function(){
                    geting += '<option value="' + this['id'] + '">' + this['name'] + '</option>';
                });
                $('#jalur').html(geting);
            }
        });

        $.getJSON('json/GetJalurArea.php?id=' + id, function(jd) {
            if (jd.data == 'empty') {
                $('#area').html('<option>Fields empty</option>');
            } else {
                var geting;
                $.each(jd.data, function(){
                    geting += '<option value="' + this['id'] + '">' + this['name'] + '</option>';
                });
                $('#area').html(geting);
            }
        });
    });

    function ClearedField($id) {
        $("#" + $id).html('');
    }