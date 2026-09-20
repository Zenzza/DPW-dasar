<?php
session_start();
?>
<p align="center"><font size=12>RUMAH SAKIT HARAPAN SEMBUH</font><br>
<b>Jl . Jenderal Sudirman Kel.Gabek Kec.Pangkalbalam Kota Pangkalpinang 33117 <br>
Telp. (0717)433506 / FAX. (0717)433506</b></p>
<hr>
<h2 align="center">RESEP</h2>
<?php
include_once "../config/koneksi.php";
    $no_resep = $_SESSION['no_resep'];
    $sql_data_resep = mysqli_query($koneksi, "SELECT pasien.*,resep.*,isi.*,obat.* FROM resep,pasien,isi,obat WHERE pasien.kd_pasien=resep.kd_pasien AND resep.no_resep=isi.no_resep AND isi.kd_obat=obat.kd_obat AND resep.no_resep='$no_resep'");
    $result_data_resep = mysqli_fetch_array($sql_data_resep);
    $no=1;
    ?>

    <table width="1092" border="0">
    <tr>
        <td width="131"><b>Nomor Resep</b></td>
        <td width="17">:</td>
        <td width="228"><?php echo $result_data_resep['no_resep']; ?></td>
        <td width="432">&nbsp;</td>
        <td witdh="250" rowspan="10">&nbsp;</td>
    </tr>
        <tr>
        <td width="131"><b>Nama Pasien</b></td>
        <td width="17">:</td>
        <td width="228"><?php echo $result_data_resep['nm_pasien']; ?></td>
        <td width="432">&nbsp;</td>
        <td witdh="250" rowspan="10">&nbsp;</td>
    </tr>
        <tr>
        <td width="131"><b>Alamat</b></td>
        <td width="17">:</td>
        <td width="228"><?php echo $result_data_resep['alamat']; ?></td>
        <td width="432">&nbsp;</td>
        <td witdh="250" rowspan="10">&nbsp;</td>
    </tr>
    </table>
    <br>
    <table width="100%" class="table table-bordered" border="1">
        <tr>
            <th width="34"><i class=""></i>No</th>
            <th width="239"><i class=""></i>Nama Obat</th>
            <th width="200"><i class=""></i>Satuan</th>
            <th width="400"><i class=""></i>Aturan Pakai</th>
            <th width="340"><i class=""></i>Jumlah</th>
            <th width="340"><i class=""></i>Dosis</th>
        </tr>
        <?php
        $sql_data_resep1 = mysqli_query($koneksi, "SELECT pasien.*,resep.*,isi.*,obat.* FROM resep,pasien,isi,obat WHERE pasien.kd_pasien=resep.kd_pasien AND resep.no_resep=isi.no_resep AND isi.kd_obat=obat.kd_obat AND resep.no_resep='$no_resep'");
        $no=1;
        while($result_resep = mysqli_fetch_array($sql_data_resep1)){
            echo '<tr align="center"><td>'.$no.'</td>
            <td>'.$result_resep['nm_obat'].'</td>
            <td>'.$result_resep['satuan'].'</td>
            <td>'.$result_resep['aturan_pakai'].'</td>
            <td>'.$result_resep['jumlah'].'</td>
            <td>'.$result_resep['dosis'].'</td>
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