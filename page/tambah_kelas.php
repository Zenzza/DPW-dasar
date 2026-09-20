<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data kelas</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $idkelas = $_POST['id_kelas'];
    $nmkelas = $_POST['nm_kelas'];
                    
if(empty($idkelas)) {
    echo '<div class="warning">Data kelas tidak boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO kelas (id_kelas, nm_kelas) VALUES ('$idkelas', '$nmkelas')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=kelas'>";
        } else {
            echo '<div class="error"> Data kelas Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(id_kelas) from kelas") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "KLS".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "KLS001";}
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Kelas</label>
                                        <input type="text" name="id_kelas" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input type="text" name="nm_kelas" class="form-control" placeholder="Masukan Nama Kelas">
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