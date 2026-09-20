<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-12">
                <h1 align="center">Form Tambah Resep</h1>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($_POST['tambah_resep'])) {
    $no_resep = $_POST['no_resep'];
    $tgl_resep = $_POST['tgl_resep'];
    $kd_pasien = $_POST['kd_pasien'];

    if(empty($no_resep)) {
        echo '<div class="warning">Data Resep Tidak Boleh Kosong</div>';
    }else{
        $insert=mysqli_query($koneksi, "insert into resep (no_resep,tgl_resep,kd_pasien)
        values ('$no_resep', '$tgl_resep', '$kd_pasien')");

        $kd_obat = $_POST['kd_obat'];
        $aturan_pakai = $_POST['aturan_pakai'];
        $jumlah = $_POST['jumlah'];
        $dosis = $_POST['dosis'];
        if(empty($aturan_pakai)) {
            echo '<div class="warning">Data Tidak Boleh Kosong</div>';
        }else{
            if(is_array($aturan_pakai)) {
                foreach($aturan_pakai as $key => $value) {
                    $insert=mysqli_query($koneksi, "insert into isi (no_resep,kd_obat,aturan_pakai,jumlah,dosis)
                    values ('$no_resep', '$kd_obat[$key]', '$aturan_pakai[$key]', '$jumlah[$key]', '$dosis[$key]')");
                }
            }
            if($insert){
                echo '<div class="success">Resep Berhasil Disimpan</div>';
                echo '<meta http-equiv="refresh" content="0 url=index.php?page=resep">';
            }else{
                echo '<div class="error">Resep Gagal Disimpan</div>';
            }
        }
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <form method="post" action="">
                    <br><b>Nomor Resep</b>
                    <input type="text" name="no_resep" placeholder="Masukan Nomor Resep" class="form-control">
                    <br><b>Tanggal Resep</b>
                    <input type="date" name="tgl_resep" placeholder="Masukan Tanggal Resep" class="form-control">
                    <br><b>Nama Pasien</b>
                    <select name="kd_pasien" class="form-control">
                        <?php
                        $sql_tbl_pasien = mysqli_query($koneksi, "select * from pasien order by kd_pasien asc");
                        while($result = mysqli_fetch_array($sql_tbl_pasien)) {
                            echo '<option value="'.$result['kd_pasien'].'">'.$result['nm_pasien'].'</option>';
                        }
                        ?>
                    </select>
                    <br>
                    <hr>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered dataTable"
                                aria-describedby="editable-sample_info">
                                <thead>
                                    <tr>
                                        <th style="width: 5px">No</th>
                                        <th>Obat</th>
                                        <th>Aturan Pakai</th>
                                        <th>Jumlah</th>
                                        <th>Dosis</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="footer_resep">
                                        <td style="text-align:right" colspan="8">
                                            <a class="btn btn-success" id="add_row_resep">Tambah</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="submit" name="tambah_resep" value="SIMPAN" class="submit btn btn-md btn-success">
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    var index_table = 0;
    var obat_select = "";
        <?php
        $sql_tbl_obat = mysqli_query($koneksi, "select * from obat order by kd_obat asc");
        if($sql_tbl_obat) {
            while($result = mysqli_fetch_array($sql_tbl_obat)) { ?>
                obat_select +='<option value="<?php echo $result['kd_obat']; ?>"><?php echo $result['nm_obat'];?></option>';
            <?php
            }
        }
        ?>

        var no = 1;
        $("#add_row_resep").click(function() {
            $("#footer_resep").before(`<tr class="data-resep" id="row_resep_`+index_table+`">
                <td style="text-align:center">`+no+`</td>
                <td>
                    <select name="kd_obat[`+index_table+`]" id="obat_`+index_table+`" class="form-control small_data"> [`+obat_select+`]</select>
                </td>
                <td>
                    <input style="max-width:300px" name="aturan_pakai[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="aturan_pakai [`+index_table+`]">
                </td>
                <td>
                    <input style="max-width:300px" name="jumlah[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="jumlah [`+index_table+`]">
                </td>
                <td>
                    <input style="max-width:300px" name="dosis[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="dosis [`+index_table+`]">
                </td>
                <td>
                    <a onclick="remove_div_id(\`row_resep_`+index_table+`\`,1)" class="btn btn-danger"><i class="fa fa-minus"></i></a>

                    </td></tr>`);
                    no++;
                    index_table++;
                    });

                    function remove_div_id(id) {
                        $("#" + id).remove();
                    }
</script>
</div>
</div>
</div>
</section>
