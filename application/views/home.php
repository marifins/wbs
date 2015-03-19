<?php $base = base_url();?>
<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Dashboard <small>Komisi Pelaporan Pelanggaran</small>
</h1>
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i> Dashboard
</li>
</ol>
</div>
</div>
<!-- /.row -->

<div class="row">
<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-inbox fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $this->dashboard_model->laporan_masuk_rows();?></div>
<div>Laporan Masuk</div>
</div>
</div>
</div>
<a href="<?php echo $base;?>laporan_masuk">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-reorder fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $this->dashboard_model->belum_diproses_rows();?></div>
<div>Belum Diproses</div>
</div>
</div>
</div>
<a href="<?php echo $base;?>belum_diproses">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-retweet fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $this->dashboard_model->sedang_diproses_rows();?></div>
<div>Sedang Diproses</div>
</div>
</div>
</div>
<a href="<?php echo $base;?>sedang_diproses">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-check-square-o fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo $this->dashboard_model->proses_selesai_rows();?></div>
<div>Proses Selesai</div>
</div>
</div>
</div>
<a href="<?php echo $base;?>proses_selesai">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>
<!-- /.row -->

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