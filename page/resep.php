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
    $no_resep = $_GET['no_resep'];
    $sql = mysqli_query($koneksi, "DELETE FROM resep WHERE no_resep='$no_resep'");
    if($sql) {
        echo '<div class="alert alert-warning alert-dismissible"> Data resep Berhasil Dihapus </div>';
    } else {
        echo '<div class="error"> Data resep Gagal Dihapus </div>';
    }
    }
}
?>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA RESEP</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data_toggle="tooltip" title="Collapse"> 
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data_toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div  class="card-body p-0"><br>
            <div class="col text-right">
                <a href="index.php?page=tambah_resep" class="btn-sm btn-success"><i class="fas fa-plus">Tambah Data Baru</i></a><br><br>
            </div>
            <table id="daftar" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th align="center"><i class="icon_profile"></i>Nomor Resep</th>
                        <th align="center"><i class="icon_profile"></i>Tanggal Resep</th>
                        <th align="center"><i class="icon_profile"></i>Nama Pasien</th>
                        <th align="center"><i class="icon_profile"></i>Alamat</th>
                        <th align="center"><i class="icon_profile"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM resep, pasien WHERE pasien.kd_pasien=resep.kd_pasien ORDER by no_resep");
$no = 1;
?>
<?php
    while($result=mysqli_fetch_array($sql)){
    echo '<tr><td>'.$no.'</td>
        <td>'.$result['no_resep'].'</td>
    <td>'.$result['tgl_resep'].'</td>
    <td>'.$result['nm_pasien'].'</td>
    <td>'.$result['alamat'].'</td> 
    <td align="left">
<a href="index.php?page=edit_resep&no_resep='.$result['no_resep'].'" class="badge badge-primary"><i class="fas fa-pencil-alt">EDIT</i></a>
<a href="index.php?page=resep&action=hapus&no_resep='.$result['no_resep'].'" class="badge badge-danger"><i class="fas fa-trash">HAPUS</i></a>
    </td></tr>';
    $no++;
}
?>
</tbody></table>
</div>
</div>
</section>