<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data Obat</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $kd_obat = $_POST['kd_obat'];
    $nm_obat = $_POST['nm_obat'];
    $satuan = $_POST['satuan'];
    $jenis_obat = $_POST['jenis_obat'];
        $stok = $_POST['stok'];
                    
if(empty($kd_obat)) {
    echo '<div class="warning">Data Obat tidak boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO obat (kd_obat, nm_obat, satuan, jenis_obat, stok) VALUES ('$kd_obat', '$nm_obat', '$satuan', '$jenis_obat', '$stok')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=obat'>";
        } else {
            echo '<div class="error"> Data Pasein Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(kd_obat) from obat") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "O".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "O001";}

?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Obat</label>
                                        <input type="text" name="kd_obat" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <input type="text" name="nm_obat" class="form-control" placeholder="Masukan Nama Obat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan" class="form-control" placeholder="Masukan Satuan Obat">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Obat</label>
                                        <input type="text" name="jenis_obat" class="form-control" placeholder="Masukan Jenis Obat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form-control" placeholder="Masukan Stok Obat">
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