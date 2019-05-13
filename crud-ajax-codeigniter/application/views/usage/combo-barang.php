<select name="id_barang">
<option value="">Select</option>
 <?php
foreach($combo as $row) {
?>
<option value="<?=$row->id_barang?>"><?=$row->nm_barang?></option>
<?php
}
?>
</select>

   