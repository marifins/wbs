<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url();?>assets/i/fav.png" type="image/png">
<title>{title}</title>
<?php
    $base = base_url();
    $css = $base . 'assets/css/';
    $js = $base . 'assets/js/';
    $lib = $base . 'assets/lib/';
    $i = $base . 'assets/images/';
?>

<link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $css; ?>sb-admin.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $css; ?>font-awesome/css/font-awesome.min.css" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $base;?>">Whistle Blower System Admin PTPN I</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
        <li>
<a href="<?php echo $base;?>laporan_masuk"><span class="label label-primary"><?php echo $this->dashboard_model->laporan_masuk_rows();?>&nbsp;&nbsp;Total Laporan yang Masuk</span></a>
        </li>
        <li>
        <a href="<?php echo $base;?>belum_diproses"><span class="label label-danger"><?php echo $this->dashboard_model->belum_diproses_rows();?>&nbsp;&nbsp;Laporan Belum Diproses</span></a>
        </li>
        <li>
        <a href="<?php echo $base;?>sedang_diproses"><span class="label label-warning"><?php echo $this->dashboard_model->sedang_diproses_rows();?>&nbsp;&nbsp;Laporan Sedang Diproses</span></a>
        </li>
        <li>
        <a href="<?php echo $base;?>proses_selesai"><span class="label label-success"><?php echo $this->dashboard_model->proses_selesai_rows();?>&nbsp;&nbsp;Laporan Telah Diproses</span></a>
        </li>

        </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo from_session('username'); ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li>
        <a href="<?php echo $base; ?>myaccount"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
        <li>
        <a href="<?php echo $base; ?>settings"><i class="fa fa-fw fa-gear"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li>
        <a href="<?php echo $base; ?>login/do_logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
        </ul>
        </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
        <?php setMenu("admin");?>
        <a href="<?php echo $base;?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <?php setMenu("laporan_masuk");?>
        <a href="<?php echo $base;?>laporan_masuk"><i class="fa fa-fw fa-inbox"></i> Laporan Masuk</a>
        </li>
        <?php setMenu("belum_diproses");?>
        <a href="<?php echo $base;?>belum_diproses"><i class="fa fa-fw fa-reorder"></i> Belum Diproses</a>
        </li>
        <?php setMenu("sedang_diproses");?>
        <a href="<?php echo $base;?>sedang_diproses"><i class="fa fa-fw fa-retweet"></i> Sedang Diproses</a>
        </li>
        <?php setMenu("proses_selesai");?>
        <a href="<?php echo $base;?>proses_selesai"><i class="fa fa-fw fa-check-square-o"></i> Proses Selesai</a>
        </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

        {content}

        </div>
        <!-- /.container-fluid -->

        </div>
    <!-- /#page-wrapper -->

    </div>
<!-- /#wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo $js; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>jquery.md5.js"></script>
<script type="text/javascript">
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
$(function() {
    $("#ubah_password").submit(function(){
        var old_pass_temp = $("#old_pass_temp").val();
        var old_pass = $("#old_pass").val();
        old_pass = $.md5(old_pass);
        old_pass = old_pass.substr(0, 25)
        var new_pass = $("#new_pass").val();
        var new_pass_repeat = $("#new_pass_repeat").val();
        if(old_pass == "" | new_pass == "" | new_pass_repeat == ""){
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
            $('#success > .alert-danger').append("<strong>Maaf, silahkan lengkapi seluruh data.");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#ubah_password').trigger("reset");
            return false;
        }else if(new_pass != new_pass_repeat){
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
            $('#success > .alert-danger').append("<strong>Maaf, password baru anda tidak match.");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#ubah_password').trigger("reset");
            return false;
        }else{
            if(old_pass_temp != old_pass){
                $('#success').html("<div class='alert alert-danger'>");
                $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
                $('#success > .alert-danger').append("<strong>Maaf, password lama yang anda masukkan salah.");
                $('#success > .alert-danger').append('</div>');
                $('#ubah_password').trigger("reset");
                return false;
            }else{
                return true;
            }
        }
    });
});
</script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo $js; ?>bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script type="text/javascript" src="<?php echo $js; ?>plugins/morris/raphael.min.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
    function setMenu($txt){
        $ci =& get_instance();
        $cur = $ci->router->fetch_class();
        if($cur == $txt) echo"<li class=\"active\">";
        else echo "<li>";
    }
?>
