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
    $idjk = $_GET['id_jk'];
    $sql = mysqli_query($koneksi, "DELETE FROM jadwal_kelas WHERE id_jk='$idjk'");
    if($sql) {
        echo '<div class="alert alert-warning alert-dismissible"> Data Jadwal Kelas Berhasil Dihapus </div>';
    } else {
        echo '<div class="error"> Data Jadwal Kelas Gagal Dihapus </div>';
    }
    }
}
?>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA JADWAL KELAS</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data_toggle="tooltip" title="Collapse"> 
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data_toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div  class="card-body p-0"><br>
            <div class="col text-right">
                <a href="index.php?page=tambah_jk" class="btn-sm btn-success"><i class="fas fa-plus">Tambah Data Baru</i></a><br><br>
            </div>
            <table id="daftar" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th align="center"><i class="icon_profile"></i>ID Jadwal Kelas</th>
                        <th align="center"><i class="icon_profile"></i>Tahun Pelajaran</th>
                        <th align="center"><i class="icon_profile"></i>Semester</th>
                        <th align="center"><i class="icon_profile"></i>Nama Kelas</th>
                        <th align="center"><i class="icon_profile"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM jadwal_kelas, kelas WHERE kelas.id_kelas=jadwal_kelas.id_kelas ORDER by id_jk");
$no = 1;
?>
<?php
    while($result=mysqli_fetch_array($sql)){
    echo '<tr><td>'.$no.'</td>
        <td>'.$result['id_jk'].'</td>
    <td>'.$result['thn_pel'].'</td>
    <td>'.$result['semester'].'</td>
    <td>'.$result['nm_kelas'].'</td> 
    <td align="left">
<a href="index.php?page=edit_jkp&id_jk='.$result['id_jk'].'" class="badge badge-primary"><i class="fas fa-pencil-alt">EDIT</i></a>
<a href="index.php?page=jadwal_kelas&action=hapus&id_jk='.$result['id_jk'].'" class="badge badge-danger"><i class="fas fa-trash">HAPUS</i></a>
    </td></tr>';
    $no++;
}
?>
</tbody></table>
</div>
</div>
</section>