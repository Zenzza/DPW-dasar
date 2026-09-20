<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><B>Form Ubah Data Pasien</B></h3>
                    </div>
                    <?php
if (isset($_POST['ubah'])) {
        $kd_pasien = $_POST['kd_pasien'];
    $nm_pasien = $_POST['nm_pasien'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
        $agama = $_POST['agama'];
            $goldar = $_POST['goldar'];
                $jenkel = $_POST['jenkel'];
        $alamat = $_POST['alamat'];
                    
if(empty($kd_pasien)) {
    echo '<div class="warning">Data tidak boleh kosong</div>';
} else {
    $edit=mysqli_query($koneksi, "UPDATE pasien SET nm_pasien='$nm_pasien', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', agama='$agama', goldar='$goldar', jenkel='$jenkel', alamat='$alamat' WHERE kd_pasien='$kd_pasien'");

        if($edit) {
        echo "<script>alert('Apakah data mau diedit?')</script>";
        echo "<meta http-equiv='refresh' content='0 url=index.php?page=pasien'>";
        } else {
            echo '<div class="error"> Data Pasein Gagal Diedit</div>';
        }
    }
}
$kd_pasien = $_GET['kd_pasien'];
$sql = mysqli_query($koneksi, "SELECT * FROM pasien WHERE kd_pasien='$kd_pasien'");
$result = mysqli_fetch_array($sql);
?>
                    <div class="card-body">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Pasien</label>
                                        <input type="text" name="kd_pasien" class="form-control" value="<?php echo $kd_pasien; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" name="nm_pasien" class="form-control" placeholder="Masukan Nama Pasien" value="<?php echo $result['nm_pasien']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" value="<?php echo $result['tempat_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" value="<?php echo $result['tgl_lahir']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-3">
                                            <?php
                                            $kd_pasien = $_GET['kd_pasien'];
                                            $query = mysqli_query($koneksi, "SELECT * FROM pasien WHERE kd_pasien='$kd_pasien'");
                                            $data = mysqli_fetch_array($query);
                                            ?>
                                            <label class="form-check-label"><input class="form-check-input" type="radio" name="jenkel" value="Laki-laki" <?php if ($data['jenkel'] == 'Laki-laki') echo 'checked'; ?>>Laki-Laki</label>
                                            </div>
                                            <div class="col-sm-3">
                                            <label class="form-check-label"><input class="form-check-input" type="radio" name="jenkel" value="Perempuan" <?php if ($data['jenkel'] == 'Perempuan') echo 'checked'; ?>>Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control">
                                            <?php
                                            $kd_pasien = $_GET['kd_pasien'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM pasien WHERE kd_pasien='$kd_pasien'");
                                            $data1 = mysqli_fetch_array($query1);
                                            ?>
                                            <option value="Islam" <?php if ($data1['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                                            <option value="Kristen" <?php if ($data1['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                                            <option value="Katolik"<?php if ($data1['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                            <option value="Hindu"<?php if ($data1['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                            <option value="Budha"<?php if ($data1['agama'] == 'Budha') echo 'selected'; ?>>Budha</option>
                                            <option value="Konghucu"<?php if ($data1['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select name="goldar" class="form-control">
                                        <option value="A" <?php if ($data1['goldar'] == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($data1['goldar'] == 'B') echo 'selected'; ?>>B</option>
                                        <option value="AB" <?php if ($data1['goldar'] == 'AB') echo 'selected'; ?>>AB</option>
                                        <option value="O" <?php if ($data1['goldar'] == 'O') echo 'selected'; ?>>O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"><?php echo $result['alamat']; ?></textarea>
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