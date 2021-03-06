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
Laporan Terkini
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="<?php echo $base;?>admin">Dashboard</a>
</li>
<li class="active">
<i class="fa fa-inbox"></i> Laporan Terkini
</li>
</ol>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-inbox fa-fw"></i> Laporan Terkini</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th width="15%">Nama Pelapor</th>
<th width="25%">Nama Pihak yang Terlibat</th>
<th width="20%">Lokasi Kejadian</th>
<th width="15%">Waktu Kejadian</th>
<th width="15%">Laporan Masuk</th>
<th width="10%">&nbsp;</th>
</tr>
</thead>
<tbody>
<?php foreach ($query as $q): ?>
<tr>
<td><?php echo $q->nama;?></td>
<td><?php echo $q->pihak_terlibat;?></td>
<td><?php echo $q->lokasi_kejadian;?></td>
<td><?php echo $q->waktu_kejadian;?></td>
<td><?php echo $q->timestamp;?></td>
<td><a href=<?php echo $base.'laporan_terkini/details/' .$q->id;?>>View Details</a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
<div class="text-right">
<a href="<?php $base;?>laporan_masuk">Lihat Seluruh Laporan Masuk <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
</div>
</div>

<!-- /.row -->