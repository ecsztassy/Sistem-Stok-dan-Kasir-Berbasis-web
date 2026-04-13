<?php
// REDIRECT KARYAWAN KE KASIR
$role = $_SESSION['role'] ?? ($_SESSION['admin']['role'] ?? 'admin');
if ($role === 'karyawan') {
    header('Location: index.php?page=jual');
    exit;
}
?>
<!--<h3>Dashboard</h3>-->
<br/>
<?php 
	$sql=" select * from barang where stok <= 3";
	$row = $config -> prepare($sql);
	$row -> execute();
	$r = $row -> rowCount();
	if($r > 0){
?>
<?php
		echo "
		<div class='alert alert-warning'>
			<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
			<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
		</div>
		";	
	}
?>
<?php $hasil_barang = $lihat -> barang_row();?>
<?php $hasil_kategori = $lihat -> kategori_row();?>
<?php $stok = $lihat -> barang_stok_row();?>
<?php $jual = $lihat -> jual_row();?>
<?php
// File: admin/template/home.php
// Dashboard yang menampilkan konten berdasarkan role
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard <?php echo getRoleName($_SESSION['role']); ?></h1>
</div>
<!-- Selamat Datang -->
    <!--<div class="row justify-content-center">-->
    <!--    <div class="col-lg-8">-->
    <!--        <div class="card shadow mb-4 border-0">-->
    <!--            <div class="card-body text-center" style="background-color: #A8BBA3; color: #fff; border-radius: 12px;">-->
    <!--                <h2 class="mb-3">Selamat Datang, <b><?php echo $nama_user; ?></b> 🎉</h2>-->
    <!--                <p class="mb-0">-->
    <!--                    Anda sedang berada di <b>Sistem Kasir & Manajemen Stok</b>.<br>-->
    <!--                    Gunakan menu di samping untuk mengelola data barang, transaksi, dan laporan.-->
    <!--                </p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

<?php if (isAdmin()): ?>
<!-- Content Row - Admin Dashboard -->
<div class="row">
    <!--STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-cubes"></i> Nama Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_barang);?></h1>
                </center>
            </div>
             
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($stok['jml']);?></h1>
                </center>
            </div>
            
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($jual['stok']);?></h1>
                </center>
            </div>
            
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fa fa-bookmark"></i> Kategori Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_kategori);?></h1>
                </center>
            </div>
            
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
</div>



<?php endif; ?>