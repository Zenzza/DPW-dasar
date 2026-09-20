<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Entry Data Pasien</B></h3>
                    </div>
                    <?php
if (isset($_POST['simpan'])) {
        $kd_pasien = $_POST['kd_pasien'];
    $nm_pasien = $_POST['nm_pasien'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
        $agama = $_POST['agama'];
            $goldar = $_POST['goldar'];
                $jenkel = $_POST['jenkel'];
        $alamat = $_POST['alamat'];
                    
if(empty($kd_pasien)) {
    echo '<div class="warning">Data pasien tidka boleh kosong</div>';
} else {
    $insert=mysqli_query($koneksi, "INSERT INTO pasien (kd_pasien, nm_pasien, tempat_lahir, tgl_lahir, agama, goldar, jenkel, alamat) VALUES ('$kd_pasien', '$nm_pasien', '$tempat_lahir', '$tgl_lahir', '$agama', '$goldar', '$jenkel', '$alamat')");

        if($insert) {
        echo "<script>alert('Apakah data mau ditambahkan?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=pasien'>";
        } else {
            echo '<div class="error"> Data Pasein Gagal Disimpan</div>';
        }
    }
}
?>
<?php
    $carikode = mysqli_query($koneksi, "select max(kd_pasien) from pasien") or die (mysql_error());
        $datakode = mysqli_fetch_array($carikode);
        if($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else { $hasilkode = "P001";}

?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Pasien</label>
                                        <input type="text" name="kd_pasien" class="form-control" value="<?php echo $hasilkode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" name="nm_pasien" class="form-control" placeholder="Masukan Nama Pasien">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input class="form-check-input" type="radio" name="jenkel" value="Laki-laki">
                                                <label class="form-check-label">Laki-laki</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-check-input" type="radio" name="jenkel" value="Perempuan">
                                                <label class="form-check-label">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select name="goldar" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
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