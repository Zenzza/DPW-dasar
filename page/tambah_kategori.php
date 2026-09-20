<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data Kategori</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
    $jeniskategori = $_POST['jeniskategori'];
    $keterangan = $_POST['keterangan'];
                    
if(empty($idkategori)) {
    echo '<div class="warning">Data Kategori tidak boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO kategori (idkategori, jeniskategori, keterangan) VALUES ('$idkategori', '$jeniskategori', '$keterangan')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=kategori'>";
        } else {
            echo '<div class="error"> Data Kategori Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(idkategori) from kategori") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "K".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "K001";}
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID kategori</label>
                                        <input type="text" name="idkategori" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis kategori</label>
                                        <input type="text" name="jeniskategori" class="form-control" placeholder="Masukan Jenis Kategori">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan Kategori">
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