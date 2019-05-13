<form action="" method="post">
  <input type="text" name="nm_barang">
  <br>
  <input type="text" name="jumlah">
  <br>
  <select name="satuan">
    <option value="">--Pilih Satuan--</option>
    <option value="Pcs">Pcs</option>
    <option value="Pack">Pack</option>
    <option value="liter">liter</option>
    <option value="Kg">Kg</option>
    <option value="Rim">Rim</option>
  </select>
  <br>
  <button type="reset" class="btn btn-default">Reset</button>
  <input type="submit" name="simpan_data" value="Simpan">
</form>

<?php
include("database.php");

if (isset($_POST['simpan_data'])){
  $nm_barang  = $_POST['nm_barang'];
  $jumlah     = $_POST['jumlah'];
  $satuan     = $_POST['satuan'];
  $simpan     = mysql_query("insert into barang values('null','$nm_barang', '$jumlah', '$satuan')");
  if($simpan){
    echo '<script>alert("Sukses");document.location="http://localhost/php-logika/crud-php-native/lihat.php";</script>';
  }else{
    echo '<script>alert("Gagal");history.go(-1)</script>';
  }
}

 ?>