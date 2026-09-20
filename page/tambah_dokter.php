<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data Dokter</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $kd_dokter = $_POST['kd_dokter'];
    $nm_dokter = $_POST['nm_dokter'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
                    
if(empty($kd_dokter)) {
    echo '<div class="warning">Data dokter tidak boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO dokter (kd_dokter, nm_dokter, telpon, alamat) VALUES ('$kd_dokter', '$nm_dokter', '$telpon', '$alamat')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=dokter'>";
        } else {
            echo '<div class="error"> Data Dokter Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(kd_dokter) from dokter") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "D".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "D001";}

?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode dokter</label>
                                        <input type="text" name="kd_dokter" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama dokter</label>
                                        <input type="text" name="nm_dokter" class="form-control" placeholder="Masukan Nama dokter">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input type="text" name="telpon" class="form-control" placeholder="Masukan No Telpon">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" align="center">
                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
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