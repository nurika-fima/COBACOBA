<?php
include 'jalan.php';
?>
<center>
    <?php
        if ($_SESSION['fungsi'] == "edit-buku") {
            while ($mamam = mysqli_fetch_array($edit)){
    ?>
        <form method="post">
            <input type="hidden"    name="id_buku"  value="<?=$_SESSION['id_buku'];?>"  placeholder="JUDUL">
            <input type="text"      name="judul"    value="<?=$mamam['judul'];?>"       placeholder="JUDUL">
            <input type="text"      name="judul"    value="<?=$mamam['judul'];?>"       placeholder="PENGARANG">
            <input type="text"      name="judul"    value="<?=$mamam['judul'];?>"       placeholder="PENERBIT">
            <input type="text"      name="judul"    value="<?=$mamam['judul'];?>"       placeholder="KOTA">
        <select name   ="tahun">
        <option value  ="<?=$mamam['tahun'];?>"><?=$mamam['tahun'];?></option>
    
    <?php  // ini seperti kelompok, jadi setiap var itu setiap php
        $tahun = date('Y');         // nanti kalau ditaruh diatas jadi bingung, nanti kalau naruh var dekat bisa benar dan jelas manggilnya tuh yang ini atau yang mana
    //pembuatan var tidak bisa depannya angka, tidak boleh pakai spasi, tidak boleh pakai tanda baca
    //$ = itu variabel
            for ($i=0; $i < 100; $i++){
                $_SESSION['tahun'] = $tahun;
                $tahun = $tahun-1;
                echo "<option value='".$tahun."'>".$tahun."</option>";
            }
    ?>
        </select>
            <input type="submit" name="edit-aja" value="SIMPAN">
        </form>
    <?php
        }
    ?>

    <?php
        }else if ($_SESSION['fungsi'] == "tambah-buku"){
    ?>
        <form method="post">
            <input type="text" name ="judul"        placeholder  ="JUDUL" >
            <input type="text" name ="pengarang"    placeholder  ="PENGARANG">
            <input type="text" name ="penerbit"     placeholder  ="PENERBIT">
            <input type="text" name ="kota"         placeholder  ="KOTA">
        <select name="tahun">
    <?php
            $tahun = date('Y');
            for ($i=0; $i < 100; $i++) { 
            $_SESSION['tahun']  =   $tahun;
            $tahun              =   $tahun-1;
            echo "<option value='".$tahun."'>".$tahun."</option>";
        }
    ?>
            <input type="submit" name="tambah" value="SIMPAN">
        </select>
        </form>

    <?php
}else{
    ?>
        <form method="post"><button name="proses-tambah">TAMBAH DATA</button>
            <table border="5">
                <thead>
                    <tr>
                        <th>
                            JUDUL
                        </th>
                        <th>
                            PENGARANG
                        </th>
                        <th>
                            PENERBIT
                        </th>
                        <th>
                            KOTA
                        </th>
                        <th>
                            TAHUN
                        </th>
                        <th>
                            AKSI
                        </th>
                    </tr>
                </thead>
    <tbody>
        <?php
            while($muncul = mysqli_fetch_array($sql)){
            echo "<tr><td>".$muncul['judul']."</td>"
                 ."<td>".$muncul['pengarang']."</td>"
                 ."<td>".$muncul['penerbit']."</td>"
                 ."<td>".$muncul['kota']."</td>"
                 ."<td>".$muncul['tahun']."</td>"
        ?>
            <td><form method="post">
            <input  type    ="hidden" name ="id_buku"    value ="<?=$muncul['id_buku'];?>">
            <button name    ="proses-edit">EDIT</button> | <button  name="hapus" onclick="return confirm('hapus data?')">HAPUS</button></form></td></tr>
        <?php
            }
        ?>
    </tbody>
            </table>
            </form>
    <?php
}
    ?>
</center>