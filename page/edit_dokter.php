<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Ubah Data dokter</B></h3>
                    </div>
                    <?php
if (isset($_POST['ubah'])) {
        $kd_dokter = $_POST['kd_dokter'];
    $nm_dokter = $_POST['nm_dokter'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
                    
if(empty($kd_dokter)) {
    echo '<div class="warning">Data tidak boleh kosong</div>';
} else {
    $edit=mysqli_query($koneksi, "UPDATE dokter SET nm_dokter='$nm_dokter', telpon='$telpon', alamat='$alamat' WHERE kd_dokter='$kd_dokter'");

        if($edit) {
        echo "<script>alert('Apakah data mau diedit?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=dokter'>";
        } else {
            echo '<div class="error"> Data dokter Gagal Diedit</div>';
        }
    }
}
$kd_dokter = $_GET['kd_dokter'];
$sql = mysqli_query($koneksi, "SELECT * FROM dokter WHERE kd_dokter ='$kd_dokter'");
$result = mysqli_fetch_array($sql);
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode dokter</label>
                                        <input type="text" name="kd_dokter" class="form-control" value="<?php echo $kd_dokter; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama dokter</label>
                                        <input type="text" name="nm_dokter" class="form-control" placeholder="Masukan Nama dokter" value="<?php echo $result['nm_dokter']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input type="text" name="telpon" class="form-control" placeholder="Masukan No Telpon" value="<?php echo $result['telpon']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?php echo $result['alamat']; ?>">
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