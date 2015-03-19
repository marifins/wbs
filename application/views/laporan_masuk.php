<?php
    $row = $query;
    function statusStr($id) {
        if ($id == "1")
            return "<td class=\"status-color cyellow\"><i class=\"fa fa-retweet fa-2x\"></i></td>";
        else if ($id == "2")
            return "<td class=\"status-color cgreen\"><i class=\"fa fa-check-square-o fa-2x\"></i></td>";
        else
            return "<td class=\"status-color cred\"><i class=\"fa fa-reorder fa-2x\"></i></td>";
    }
?>

<?php $base = base_url(); ?>

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Laporan Masuk
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="<?php echo $base;?>admin">Dashboard</a>
</li>
<li class="active">
<i class="fa fa-inbox"></i> Laporan Masuk
</li>
</ol>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-inbox fa-fw"></i> Laporan Masuk</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th width="15%">Nama Pelapor</th>
<th width="20%">Nama Pihak yang Terlibat</th>
<th width="15%">Lokasi Kejadian</th>
<th width="15%">Waktu Kejadian</th>
<th width="15%">Laporan Masuk</th>
<th width="5%">Status</th>
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
<?php echo statusStr($q->status);?>
<td><a href=<?php echo $base.'laporan_masuk/details/' .$q->id;?>>View Details</a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>

<!-- /.row -->