<?php
include "config/koneksi.php";

if(isset($_POST['cetak_jk'])) {
    $_SESSION['id_jk']=$_POST['id_jk'];
    echo "<meta http-equiv='refresh' content='0; url=page/keluaran_jk.php?id_jk=$_SESSION[id_jk]' target='_blank'>";
}
else {

}
?>
<div class="title" align="center"><h3><b>CETAK JADWAL KELAS</b></h3></div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <form method="post" action="">
                    <br><b>ID Jadwal Kelas</b>
                    <select name="id_jk" class="form-control">
                        <?php
                        $sql_tbl_jk = mysqli_query($koneksi,"SELECT id_jk FROM jadwal_kelas ORDER BY id_jk ASC");
                        
                        while($result_jk = mysqli_fetch_array($sql_tbl_jk)){
                            echo '<option value='.$result_jk['id_jk'].'>'.$result_jk['id_jk'].'</option>';
                        }
                        ?>
                    </select><br>
                    <input type="submit" name="cetak_jk" value="CETAK" class="submit btn btn-md btn-success">
                </form>
            </div> 
        </div>
    </div>
</section>