<?php
include("database.php");
$uri_path = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$id       = $uri_path[3];
$query    = mysql_query("select * from barang where id_barang='$id'");
$edit     = mysql_fetch_array($query);
 
?>
<form action="" method="post">
  <input type="hidden" name="id_barang" value="<?php echo $edit['id_barang']; ?>">
  <input type="text" name="nm_barang" value="<?php echo $edit['nm_barang']; ?>">
  <br>
  <input type="text" name="jumlah" value="<?php echo $edit['jumlah']; ?>">
  <br>
  <select name="satuan">
    <option value="">--Pilih Satuan--</option>
    <option <?php if(  $edit['satuan']=='Pcs'){echo "selected"; } ?> value="Pcs">Pcs</option>
    <option <?php if(  $edit['satuan']=='Pack'){echo "selected"; } ?> value="Pack">Pack</option>
    <option <?php if(  $edit['satuan']=='liter'){echo "selected"; } ?> value="liter">liter</option>
    <option <?php if(  $edit['satuan']=='Kg'){echo "selected"; } ?> value="Kg">Kg</option>
    <option <?php if(  $edit['satuan']=='Rim'){echo "selected"; } ?> value="Rim">Rim</option>
  </select>
  <br>
  <button type="reset" class="btn btn-default">Reset</button>
  <input type="submit" name="edit_data" value="Simpan">
</form>

<?php 
if(isset($_POST['edit_data'])){
  $id_barang  = $_POST['id_barang'];
  $nm_barang  = $_POST['nm_barang'];
  $jumlah     = $_POST['jumlah'];
  $satuan     = $_POST['satuan'];
    $edit_partner = mysql_query("update barang set nm_barang='$nm_barang', jumlah='$jumlah', satuan='$satuan' where id_barang='$id_barang'");
    if($edit_partner){
        echo '<script>alert("Sukses");document.location="http://localhost/php-logika/crud-php-native/lihat.php";</script>';
    }else{
        echo '<script>alert("Gagal");history.go(-1)</script>';
    }
}

?>