<?php 
include("database.php");
error_reporting(0);
?>

<a href="tambah.php" >Tambah</a>
<br>

<table border="1">
            <thead>
            <tr>
                <th style="text-align: center">no</th>
                <th style="text-align: center">nama barang</th>
                <th style="text-align: center">jumlah</th>
                <th style="text-align: center">satuan</th>
                <th style="text-align: center">Opsi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            $result = mysql_query("SELECT * FROM barang");
            while($data = mysql_fetch_array($result)){
                ?>
                <tr>
                    <td width="50" align="center"><?=$no;?></td>
                    <td><?=$data['nm_barang'];?></td>
                    <td><?=$data['jumlah'];?></td>
                    <td align="center"> <?=$data['satuan'] ?></td>
                       <?php echo"<td align='center' width='120'><a href='edit.php/$data[id_barang]'><button> Edit</button></a>"?>
                     <?php echo"<a href='lihat.php&hapus=true&id=$data[id_barang]' onclick='return confirm(\"Apakah Anda Yakin Ingin Menghapus Data Ini ?\")'><button> Hapus</button></a></td>"?>
               
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>

<?php
if($_GET['edit']=="true"){
  include("edit.php");
}elseif($_GET['hapus']=="true"){
    $id = $_REQUEST['id_barang'];
    $result = mysql_query("delete from barang where id_barang='$id'");
    if($result){
        echo '<script>history.go(-1)</script>';
    }
}
?>  