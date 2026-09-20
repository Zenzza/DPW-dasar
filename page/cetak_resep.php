<?php
include "config/koneksi.php";

if(isset($_POST['cetak_resep'])) {
    $_SESSION['no_resep']=$_POST['no_resep'];
    echo "<meta http-equiv='refresh' content='0; url=page/keluaran_resep.php?no_resep=$_SESSION[no_resep]' target='_blank'>";
}
else {

}
?>
<div class="title" align="center"><h3><b>CETAK RESEP OBAT</b></h3></div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <form method="post" action="">
                    <br><b>Nomor Resep</b>
                    <select name="no_resep" class="form-control">
                        <?php
                        $sql_tbl_resep = mysqli_query($koneksi,"SELECT no_resep FROM resep ORDER BY no_resep ASC");
                        
                        while($result_resep = mysqli_fetch_array($sql_tbl_resep)){
                            echo '<option value='.$result_resep['no_resep'].'>'.$result_resep['no_resep'].'</option>';
                        }
                        ?>
                    </select><br>
                    <input type="submit" name="cetak_resep" value="CETAK" class="submit btn btn-md btn-success">
                </form>
            </div> 
        </div>
    </div>
</section>