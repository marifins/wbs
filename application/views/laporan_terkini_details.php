<?php
    $base = base_url();
    $docs = $base . 'assets/docs/';
    $ipath = $base . 'assets/i/';
    ?>
<?php
    $row = $query;
    function statusStr($id) {
        if ($id == "1")
            return "<p class=\"list-group-item status-color cyellow\"><i class=\"fa fa-fw fa-retweet\"></i> &nbsp;<b>Sedang Diproses</b><br /></p>";
        else if ($id == "2")
            return "<p class=\"list-group-item status-color cgreen\"><i class=\"fa fa-fw fa-check-square-o\"></i> &nbsp;<b>Proses Selesai</b><br /></p>";
        else
            return "<p class=\"list-group-item status-color cred\"><i class=\"fa fa-fw fa-reorder\"></i> &nbsp;<b>Belum Diproses</b><br /></p>";
    }
    function ext($file_name) {
        $base = base_url();
        $ipath = $base . 'assets/i/';
        $docs = $base . 'assets/docs/';
        $extension = substr(strrchr($file_name,'.'),1);
        $file = array("zip", "rar", "pdf", "doc", "docx", "ppt", "pptx");
        $link = array("zip.jpg", "rar.jpg", "pdf.jpg", "doc.jpg", "doc.jpg", "ppt.jpg", "ppt.jpg");
        for($i=0; $i<sizeof($file); $i++){
            if($extension == $file[$i]) return $ipath.$link[$i];
            else return $docs.$file_name;
        }
    }
    ?>


<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Details <small>Laporan Terkini</small>
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="<?php echo $base;?>admin">Dashboard</a>
</li>
<li>
<i class="fa fa-inbox"></i>  <a href="<?php echo $base;?>laporan_terkini">Laporan Terkini</a>
</li>
<li class="active">
<i class="fa fa-search"></i> Details
</li>
</ol>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-inbox fa-fw"></i> &nbsp;<?php echo $row->timestamp; ?></h3></div>
<div class="panel-body">
<div class="list-group">

<?php echo statusStr($row->status);?>
<p class="list-group-item">
<span class="list-details"><?php echo $row->nama; ?></span>
<i class="fa fa-fw fa-user"></i> &nbsp;<b>Nama Pelapor</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->email; ?></span>
<i class="fa fa-fw fa-envelope-o"></i> &nbsp;<b>Email Pelapor</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->phone; ?></span>
<i class="fa fa-fw fa-phone"></i> &nbsp;<b>No. Telepon Pelapor</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->jlh_rugi; ?></span>
<i class="fa fa-fw fa-money"></i> &nbsp;<b>Dugaan Jumlah Kerugian</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->pihak_terlibat; ?></span>
<i class="fa fa-fw fa-users"></i> &nbsp;<b>Dugaan Pihak yang Terlibat</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->lokasi_kejadian; ?></span>
<i class="fa fa-fw fa-map-marker"></i> &nbsp;<b>Lokasi Kejadian</b>
</p>
<p class="list-group-item">
<span class="list-details"><?php echo $row->waktu_kejadian; ?></span>
<i class="fa fa-fw fa-calendar"></i> &nbsp;<b>Waktu Kejadian</b>
</p>
<p class="list-group-item">
<span class="list-details"></span>
<i class="fa fa-fw fa-file"></i> &nbsp;<b>Dokumen Pendukung</b><br /><br />
<span>
<?php
    $files = $row->dokumen_pendukung;
    
    if (strpos($files,',') !== false) {
        $files = str_replace(" ", "", $files);
        $d = explode(",", $files);
    }else{
        $d = $files;
    }
?>
<?php if(is_array($d)): ?>
<?php for($i=0; $i<sizeof($d); $i++):?>
    <?php
        $img = ext($d[$i]);
    ?>
        <a href="<?php echo $docs .$d[$i]; ?>"><img style="width:100px;" src="<?php echo $img; ?>" /><br /><?php echo $d[$i]; ?></a><br /><br />
    <?php endfor;?>
<?php else: ?>
    <?php
        $img = ext($d);
    ?>
    <a href="<?php echo $docs .$d; ?>"><img style="width:100px;" src="<?php echo $img; ?>" /><br /><?php echo $d; ?></a>
<?php endif; ?>

</span>
</p>
<p class="list-group-item">
<i class="fa fa-fw fa-align-justify"></i> &nbsp;<b>Kronologis Kejadian</b> <br />
<?php echo $row->kronologis; ?>
</p>

<a href="<?php echo $base;?>proses_selesai/set/<?php echo $row->id;?>">
<p class="list-group-item" style="text-align:center;">
<button type="button" class="btn btn-yellow" id="ubah_status">Ubah Status Laporan Menjadi Sedang Diproses</button>
</p>
</a>

</div>
<div class="text-right">
<a href="<?php echo $base;?>laporan_terkini">Lihat Seluruh Laporan Terkini <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
</div>

</div>
