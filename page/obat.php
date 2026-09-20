<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-12">
</div>
</div>
</div>
</section>
<?php
include "config/koneksi.php";
if(isset($_GET['action'])) {
    if($_GET['action'] == 'hapus') {
    $no_obat = $_GET['kd_obat'];
    $sql = mysqli_query($koneksi, "DELETE FROM obat WHERE kd_obat='$no_obat'");
    if($sql) {
        echo '<div class="alert alert-warning alert-dismissible"> Data Obat Berhasil Dihapus </div>';
    } else {
        echo '<div class="error"> Data Obat Gagal Dihapus </div>';
    }
    }
}
?>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA OBAT</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data_toggle="tooltip" title="Collapse"> 
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data_toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div  class="card-body p-0"><br>
            <div class="col text-right">
                <a href="index.php?page=tambah_obat" class="btn-sm btn-success"><i class="fas fa-plus">Tambah Data Baru</i></a><br><br>
            </div>
            <table id="daftar" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th align="center"><i class="icon_profile"></i>Nomor Obat</th>
                        <th align="center"><i class="icon_profile"></i>Nama Obat</th>
                        <th align="center"><i class="icon_profile"></i>Satuan</th>
                        <th align="center"><i class="icon_profile"></i>Jenis Obat</th>
                        <th align="center"><i class="icon_profile"></i>Stok</th>
                        <th align="center"><i class="icon_profile"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY kd_obat");
$no = 1;
?>
<?php
    while($result=mysqli_fetch_array($sql)){
    echo '<tr><td>'.$no.'</td>
        <td>'.$result['kd_obat'].'</td>
    <td>'.$result['nm_obat'].'</td>
    <td>'.$result['satuan'].'</td>
    <td>'.$result['jenis_obat'].'</td>
    <td>'.$result['stok'].'</td> 
    <td align="left">
<a href="index.php?page=edit_obat&kd_obat='.$result['kd_obat'].'" class="badge badge-primary"><i class="fas fa-pencil-alt">EDIT</i></a>
<a href="index.php?page=obat&action=hapus&kd_obat='.$result['kd_obat'].'" class="badge badge-danger"><i class="fas fa-trash">HAPUS</i></a>
    </td></tr>';
    $no++;
}
?>
</tbody></table>
</div>
</div>
</section>