<?php

function userStr($id) {
    if ($id == "1")
        return "Operator";
    else if ($id == "2")
        return "Administrator";
    else
        return "none";
}

$row = $query;
?>
<?php $base = base_url(); ?>

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Profile <small><?php echo $row->username; ?></small>
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="<?php $base;?>admin">Dashboard</a>
</li>
<li class="active">
<i class="fa fa-user"></i> Profile
</li>
</ol>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> <?php echo $row->nama_lengkap; ?></h3>
</div>
<div class="panel-body">

<div>Register</div>
<div><b><?php echo $row->register; ?></b></div>
<div>&nbsp;</div>

<div>Username</div>
<div><b><?php echo $row->username; ?></b></div>
<div>&nbsp;</div>

<div>Nama Lengkap</div>
<div><b><?php echo $row->nama_lengkap; ?></b></div>
<div>&nbsp;</div>

<div>Role</div>
<div><b><?php echo userStr($row->level); ?></b></div>

</div>
</div>
</div>
</div>