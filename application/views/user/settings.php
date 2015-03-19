
<?php
    $row = $query;
    $base = base_url();
    $cur_pass =  $row->password;
?>

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Settings
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="<?php $base;?>admin">Dashboard</a>
</li>
<li class="active">
<i class="fa fa-gear"></i> Settings
</li>
</ol>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-gear fa-fw"></i>Ubah Password</h3>
</div>
<div class="panel-body">
<div id="success"></div>
<form method="post" id="ubah_password" action="<?php echo $base;?>myaccount/ubah_password">
<div>Password Lama</div>
<div><input type="password" id="old_pass" /></div>

<div>Password Baru</div>
<div><input type="password" id="new_pass" name="new_pass" /></div>

<div>Ulangi Password Baru</div>
<div><input type="password" id="new_pass_repeat" name="new_pass_repeat" /></div>

<div>&nbsp;</div>
<div><input type="submit" value="Ubah Password" /></div>
<input type="text" style="visibility:hidden;" name="username" value="<?php echo $row->username;?>" />
<input type="text" style="visibility:hidden;" id="old_pass_temp" value="<?php echo $cur_pass;?>" />
</form>

</div>
</div>
</div>
</div>