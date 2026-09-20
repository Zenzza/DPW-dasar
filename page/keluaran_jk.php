<?php
session_start();
?>
<p align="center"><font size=12>ISB Atma Luhur Pangkalpinang</font><br>
<b>Jl. Jendral Sudirman Kel, Selindung Baru, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33172 <br>
Telp. (0717)433506 / FAX. (0717)433506</b></p>
<hr>
<h2 align="center">Jadwal Kelas</h2>
<?php
include_once "../config/koneksi.php";
    $id_jk = $_SESSION['id_jk'];
    $sql_data_jk = mysqli_query($koneksi, "SELECT kelas.*,jadwal_kelas.*,ada.*,mapel.* FROM jadwal_kelas,kelas,ada,mapel WHERE kelas.id_kelas=jadwal_kelas.id_kelas AND jadwal_kelas.id_jk=ada.id_jk AND ada.id_mapel=mapel.id_mapel AND jadwal_kelas.id_jk='$id_jk'");
    $result_data_jk = mysqli_fetch_array($sql_data_jk);
    $no=1;
    ?>

    <table width="1092" border="0">
    <tr>
        <td width="131"><b>ID Jadwal Kelas</b></td>
        <td width="17">:</td>
        <td width="228"><?php echo $result_data_jk['id_jk']; ?></td>
        <td width="432">&nbsp;</td>
        <td witdh="250" rowspan="10">&nbsp;</td>
    </tr>
        <tr>
        <td width="131"><b>Nama Kelas</b></td>
        <td width="17">:</td>
        <td width="228"><?php echo $result_data_jk['nm_kelas']; ?></td>
        <td width="432">&nbsp;</td>
        <td witdh="250" rowspan="10">&nbsp;</td>
    </tr>
    </table>
    <br>
    <table width="100%" class="table table-bordered" border="1">
        <tr>
            <th width="34"><i class=""></i>No</th>
            <th width="239"><i class=""></i>Nama Mapel</th>
            <th width="200"><i class=""></i>KKM</th>
            <th width="400"><i class=""></i>Hari</th>
            <th width="340"><i class=""></i>Jam Ke-</th>
            <th width="340"><i class=""></i>Nama Pengajar</th>
        </tr>
        <?php
        $sql_data_jk1 = mysqli_query($koneksi, "SELECT kelas.*,jadwal_kelas.*,ada.*,mapel.* FROM jadwal_kelas,kelas,ada,mapel WHERE kelas.id_kelas=jadwal_kelas.id_kelas AND jadwal_kelas.id_jk=ada.id_jk AND ada.id_mapel=mapel.id_mapel AND jadwal_kelas.id_jk='$id_jk'");
        $no=1;
        while($result_jk = mysqli_fetch_array($sql_data_jk1)){
            echo '<tr align="center"><td>'.$no.'</td>
            <td>'.$result_jk['nm_mapel'].'</td>
            <td>'.$result_jk['kkm'].'</td>
            <td>'.$result_jk['hari'].'</td>
            <td>'.$result_jk['jamke'].'</td>
            <td>'.$result_jk['nm_pengajar'].'</td>
            </tr>';
            $no++;
        }
        ?>
    </table>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="80%">&nbsp;</td>
            <td colspan="2"><div align="left">Pangkalpinang,<?php echo tgl_indonesia(date('Y-m-d')); ?></div></td>
        </tr>
        <tr>
            <td height="23">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><div align="left">( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</div></td>
            <td>&nbsp;</td>
        </tr>
    </table>
<?php
function tgl_indonesia($tanggal){
    $bulan = array (
        1 =>    'Januari' ,
        'Februari' ,
        'Maret' ,
        'April' ,
        'Mei' ,
        'Juni' ,
        'Juli' ,
        'Agustus' ,
        'September' ,
        'Oktober' ,
        'November' ,
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0]
    ;}?>