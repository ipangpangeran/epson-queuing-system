<table>
  <thead style="border-bottom: 1px solid #03498B;">
    <th style="padding-bottom: 5px;">No</th>
    <th>Nama Produk</th>
    <th>Harga (Rp)</th>    
  </thead>
  <tbody>
      <?php
      include "../../config/database.php";
      $binjais = mysql_query("SELECT * FROM produk");
      $i = 1;
      while($p = mysql_fetch_array($binjais)){
      $price= $p['price'];
      ?>
      <tr>
        <td style="text-align: center; padding-top: 5px;" ><?php echo $i; ?></td>
        <td style="text-align: center;"><?php echo $p['name_produk']; ?></td>
        <td style="text-align: left; padding-left: 80px; "><?php echo "Rp. ". number_format($price,0,',','.'); ?></td>
      </tr>
      <?php $i++; }  ?>
  </tbody>
</table>
