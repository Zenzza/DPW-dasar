<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Ubah Data kategori</B></h3>
                    </div>
                    <?php
if (isset($_POST['ubah'])) {
        $idkategori = $_POST['idkategori'];
    $jeniskategori = $_POST['jeniskategori'];
    $keterangan = $_POST['keterangan'];
                    
if(empty($idkategori)) {
    echo '<div class="warning">Data tidak boleh kosong</div>';
} else {
    $edit=mysqli_query($koneksi, "UPDATE kategori SET jeniskategori='$jeniskategori', keterangan='$keterangan' WHERE idkategori='$idkategori'");

        if($edit) {
        echo "<script>alert('Apakah data mau diedit?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=kategori'>";
        } else {
            echo '<div class="error"> Data kategori Gagal Diedit</div>';
        }
    }
}
$idkategori = $_GET['idkategori'];
$sql = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idkategori ='$idkategori'");
$result = mysqli_fetch_array($sql);
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID Kategori</label>
                                        <input type="text" name="idkategori" class="form-control" value="<?php echo $idkategori; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kategori</label>
                                        <input type="text" name="jeniskategori" class="form-control" placeholder="Masukan Jenis Kategori" value="<?php echo $result['jeniskategori']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan Kategori" value="<?php echo $result['keterangan']; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-12" align="center">
                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-success" name="ubah">UBAH</button>
                                        <button class="btn btn-danger" type="reset">BATAL</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>