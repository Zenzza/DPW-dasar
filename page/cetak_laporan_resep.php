<h2 align="center"><font color="black"></font><strong>LAPORAN PENCATATAN RESEP OBAT</strong></h2>
<form action="index.php?page=laporan_resep" method="POST" name="form1"> 
    <table width="60%" border="0" class="table_list" align="center">
        <tr>
            <td colspan="3" bgcolor="#CCCCCC"><font color="black"><strong>FILTER DATA</strong></font></td>
        </tr><tr></tr>
        <tr align="center">
            <td wdith="55%"><div align="left"><font color="black"><strong>Periode Transaksi</strong></font></div></td>
            <td width="5%"><div align="right"><font color="#FF0066"><strong>:</strong></font></div></td>
            <td width="50%" height="40">
                <input name="tglawal" type="date" class="tcal" value="<?php echo $tglAwal;?>">
                 s/d 
                <input type="date" name="TglAkhir" class="tcal" value="<?php echo $tglAkhir;?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
            <tr>
                <td colspan="3"><div align="center">
                    <input type="submit" name="btnTampil" value="CETAK LAPORAN">                    
                </div></td><br>
            </tr>
    </table>
</form>