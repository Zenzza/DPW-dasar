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
    $idmapel = $_GET['id_mapel'];
    $sql = mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel='$idmapel'");
    if($sql) {
        echo '<div class="alert alert-warning alert-dismissible"> Data MAPEL Berhasil Dihapus </div>';
    } else {
        echo '<div class="error"> Data MAPEL Gagal Dihapus </div>';
    }
    }
}
?>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA MATA PELAJARAN</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data_toggle="tooltip" title="Collapse"> 
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data_toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div  class="card-body p-0"><br>
            <div class="col text-right">
                <a href="index.php?page=tambah_mapel" class="btn-sm btn-success"><i class="fas fa-plus">Tambah Data Baru</i></a><br><br>
            </div>
            <table id="daftar" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th align="center"><i class="icon_profile"></i>ID MAPEL</th>
                        <th align="center"><i class="icon_profile"></i>Nama MAPEL</th>
                        <th align="center"><i class="icon_profile"></i>KKM</th>
                        <th align="center"><i class="icon_profile"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM mapel ORDER BY id_mapel");
$no = 1;
?>
<?php
    while($result=mysqli_fetch_array($sql)){
    echo '<tr><td>'.$no.'</td>
        <td>'.$result['id_mapel'].'</td>
    <td>'.$result['nm_mapel'].'</td>
    <td>'.$result['kkm'].'</td>
    <td align="left">
<a href="index.php?page=edit_mapel&id_mapel='.$result['id_mapel'].'" class="badge badge-primary"><i class="fas fa-pencil-alt">EDIT</i></a>
<a href="index.php?page=mapel&action=hapus&id_mapel='.$result['id_mapel'].'" class="badge badge-danger"><i class="fas fa-trash">HAPUS</i></a>
    </td></tr>';
    $no++;
}
?>
</div>
</tbody></table>
</div>
</div>
</section>