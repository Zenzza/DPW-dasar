<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Ubah Data Obat</B></h3>
                    </div>
                    <?php
if (isset($_POST['ubah'])) {
        $kd_obat = $_POST['kd_obat'];
    $nm_obat = $_POST['nm_obat'];
    $satuan = $_POST['satuan'];
    $jenis_obat = $_POST['jenis_obat'];
        $stok = $_POST['stok'];
                    
if(empty($kd_obat)) {
    echo '<div class="warning">Data tidak boleh kosong</div>';
} else {
    $edit=mysqli_query($koneksi, "UPDATE obat SET nm_obat='$nm_obat', satuan='$satuan', jenis_obat='$jenis_obat', stok='$stok' WHERE kd_obat='$kd_obat'");

        if($edit) {
        echo "<script>alert('Apakah data mau diedit?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=obat'>";
        } else {
            echo '<div class="error"> Data Obat Gagal Diedit</div>';
        }
    }
}
$kd_obat = $_GET['kd_obat'];
$sql = mysqli_query($koneksi, "SELECT * FROM obat WHERE kd_obat ='$kd_obat'");
$result = mysqli_fetch_array($sql);
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Obat</label>
                                        <input type="text" name="kd_obat" class="form-control" value="<?php echo $kd_obat; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <input type="text" name="nm_obat" class="form-control" placeholder="Masukan Nama Obat" value="<?php echo $result['nm_obat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan" class="form-control" placeholder="Masukan Satuan Obat" value="<?php echo $result['satuan']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Obat</label>
                                        <input type="text" name="jenis_obat" class="form-control" placeholder="Masukan Jenis Obat" value="<?php echo $result['jenis_obat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form-control" placeholder="Masukan Stok Obat" value="<?php echo $result['stok']; ?>">
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