<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data MATA PELAJARAN</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $idmapel = $_POST['id_mapel'];
    $nmmapel = $_POST['nm_mapel'];
    $kkm = $_POST['kkm'];
                    
if(empty($idmapel)) {
    echo '<div class="warning">Data MAPEL tidak boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO mapel (id_mapel, nm_mapel, kkm) VALUES ('$idmapel', '$nmmapel', '$kkm')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=mapel'>";
        } else {
            echo '<div class="error"> Data MAPEL Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(id_mapel) from mapel") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "M".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "M001";}
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID MAPEL</label>
                                        <input type="text" name="id_mapel" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama MAPEL</label>
                                        <input type="text" name="nm_mapel" class="form-control" placeholder="Masukan Nama MAPEL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>KKM</label>
                                        <input type="text" name="kkm" class="form-control" placeholder="Masukan KKM MAPEL">
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