<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-12">
                <h1 align="center">Form Tambah Jadwal Kelas</h1>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($_POST['tambah_jk'])) {
    $idjk = $_POST['id_jk'];
    $thnpel= $_POST['thn_pel'];
    $semester = $_POST['semester'];
    $idkelas = $_POST['id_kelas'];

    if(empty($idjk)) {
        echo '<div class="warning">Data Jadwal Kelas Tidak Boleh Kosong</div>';
    }else{
        $insert=mysqli_query($koneksi, "insert into jadwal_kelas (id_jk,thn_pel,semester,id_kelas)
        values ('$idjk', '$thnpel', '$semester','$idkelas')");

        $idmapel = $_POST['id_mapel'];
        $jamke = $_POST['jamke'];
        $hari = $_POST['hari'];
        $nmpengajar = $_POST['nm_pengajar'];
        if(empty($hari)) {
            echo '<div class="warning">Data Tidak Boleh Kosong</div>';
        }else{
            if(is_array($hari)) {
                foreach($hari as $key => $value) {
                    $insert=mysqli_query($koneksi, "insert into ada (id_jk,id_mapel,jamke,hari,nm_pengajar)
                    values ('$idjk', '$idmapel[$key]', '$jamke[$key]', '$hari[$key]', '$nmpengajar[$key]')");
                }
            }
            if($insert){
                echo '<div class="success">Jadwal Kelas Berhasil Disimpan</div>';
                echo '<meta http-equiv="refresh" content="0 url=index.php?page=jadwal_kelas">';
            }else{
                echo '<div class="error">Jadwal Kelas Gagal Disimpan</div>';
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
                    <br><b>ID Jadwal Kelas</b>
                    <input type="text" name="id_jk" placeholder="Masukan ID Jadwal Kelas" class="form-control">
                    <br><b>Tahun Pelajaran</b>
                    <input type="text" name="thn_pel" placeholder="Masukan Tahun Pelajaran" class="form-control">
                    <br><b>Semester</b>
                    <input type="text" name="semester" placeholder="Masukan Semester" class="form-control">
                    <br><b>Nama Kelas</b>
                    <select name="id_kelas" class="form-control">
                        <?php
                        $sql_tbl_kelas = mysqli_query($koneksi, "select * from kelas order by id_kelas asc");
                        while($result = mysqli_fetch_array($sql_tbl_kelas)) {
                            echo '<option value="'.$result['id_kelas'].'">'.$result['nm_kelas'].'</option>';
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
                                        <th>MAPEL</th>
                                        <th>Jam ke-</th>
                                        <th>Hari</th>
                                        <th>Nama Pengajar</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="footer_jk">
                                        <td style="text-align:right" colspan="8">
                                            <a class="btn btn-success" id="add_row_jk">Tambah</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="submit" name="tambah_jk" value="SIMPAN" class="submit btn btn-md btn-success">
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    var index_table = 0;
    var mapel_select = "";
        <?php
        $sql_tbl_mapel = mysqli_query($koneksi, "select * from mapel order by id_mapel asc");
        if($sql_tbl_mapel) {
            while($result = mysqli_fetch_array($sql_tbl_mapel)) { ?>
                mapel_select +='<option value="<?php echo $result['id_mapel']; ?>"><?php echo $result['nm_mapel'];?></option>';
            <?php
            }
        }
        ?>

        var no = 1;
        $("#add_row_jk").click(function() {
            $("#footer_jk").before(`<tr class="data-jk" id="row_jk_`+index_table+`">
                <td style="text-align:center">`+no+`</td>
                <td>
                    <select name="id_mapel[`+index_table+`]" id="mapel_`+index_table+`" class="form-control small_data"> `+mapel_select+`</select>
                </td>
                <td>
                    <input style="max-width:300px" name="jamke[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="jamke [`+index_table+`]">
                </td>
                <td>
                    <input style="max-width:300px" name="hari[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="hari [`+index_table+`]">
                </td>
                <td>
                    <input style="max-width:300px" name="nm_pengajar[`+index_table+`]" type="text" class="bigdrop form-control small_data" id="nm_pengajar [`+index_table+`]">
                </td>
                <td>
                    <a onclick="remove_div_id(\`row_jk_`+index_table+`\`,1)" class="btn btn-danger"><i class="fa fa-minus"></i></a>

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
