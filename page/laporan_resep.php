<?php
include "config/koneksi.php";
$dari = date_format(date_create($_POST['tglawal']), 'Y-m-d');
$sampai = date_format(date_create($_POST['TglAkhir']), 'Y-m-d');
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <table width="100%" align="center">
                    <tr align="center"><td><h4><b>LAPORAN BULANAN RESEP OBAT</b></td></tr>
                    <tr align="center"><td><b>Periode <?php echo $dari ?> s/d <?php echo $sampai ?> </b></h4></td></tr>
                </table>
                <table class="table table-striped" border="0">
                    <thead>
                        <tr>
                            <th class="">NO</th>
                            <th class=""><i class="icon_profile"></i>Nomor Resep</th>
                            <th align="center"><i class=""></i>Tanggal Resep</th>
                            <th align="center"><i class=""></i>Nama Pasien</th>
                            <th align="center"><i class=""></i>Kode Obat</th>
                            <th align="center"><i class=""></i>Nama Obat</th>
                            <th align="center"><i class=""></i>Satuan</th>
                            <th align="center"><i class=""></i>Aturan Pakai</th>
                            <th align="center"><i class=""></i>Dosis</th>
                            <th align="center"><i class=""></i>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config/koneksi.php";
                        $dari = date_format(date_create($_POST['tglawal']), 'Y-m-d');
                        $sampai = date_format(date_create($_POST['TglAkhir']), 'Y-m-d');
                        $no = 0;

                        if (isset($_POST['btnTampil'])) {
                            $sql = mysqli_query($koneksi, "SELECT a.nm_pasien, b.no_resep, b.tgl_resep, c.*, d.* FROM pasien a, resep b, isi c, obat d
                                WHERE a.kd_pasien=b.kd_pasien and b.no_resep=c.no_resep and c.kd_obat=d.kd_obat and 
                                b.tgl_resep BETWEEN '$dari' AND '$sampai' ORDER BY b.tgl_resep asc");
                            while($result=mysqli_fetch_array($sql))
                            {
                                $no++;
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td>&nbsp;<?php echo $result['no_resep'] ?></td>
                            <td>&nbsp;<?php echo $result['tgl_resep'] ?></td>
                            <td>&nbsp;<?php echo $result['nm_pasien'] ?></td>
                            <td>&nbsp;<?php echo $result['kd_obat'] ?></td>
                            <td>&nbsp;<?php echo $result['nm_obat'] ?></td>
                            <td>&nbsp;<?php echo $result['satuan'] ?></td>
                            <td>&nbsp;<?php echo $result['aturan_pakai'] ?></td>
                            <td>&nbsp;<?php echo $result['dosis'] ?></td>
                            <td>&nbsp;<?php echo $result['jumlah'] ?></td>
                        </tr>
                        <?php 
                            } 
                        } 
                        ?>
                    </tbody>
                </table>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="80%">&nbsp;</td>
                        <td colspan="2"><div align="left">Pangkalpinang,
                            <?php echo tgl_indonesia(date('Y-m-d')); ?>
                        </div></td>
                    </tr>
                    <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div align="left">(
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        )</div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
function tgl_indonesia($tanggal){
    $bulan = array (
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>