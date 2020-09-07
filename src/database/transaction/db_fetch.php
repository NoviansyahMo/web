<?php

include("../db_connection.php");

$query = "SELECT transaksi.kode_transaksi,transaksi.tanggal_beli,
barang.merek_barang, barang.tipe_barang,
pembeli.nama_pembeli, pembeli.alamat_pembeli,
barang.harga_barang 
FROM transaksi 
JOIN barang ON transaksi.kode_barang = barang.kode_barang 
JOIN pembeli ON transaksi.kode_pembeli = pembeli.kode_pembeli";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = ' 
        <table id="transaction-table">
            <thead class="transaction-table-head">
            <tr>
              <th>Kode</th>
              <th>Tanggal Pembelian</th>
              <th>Merek Barang</th>
              <th>Tipe Barang</th>
              <th>Nama Pembeli</th>   
              <th>Alamat Pembeli</th>       
              <th>Harga Barang</th>
            </tr>
            </thead>';
if ($total_row > 0) {
  foreach ($result as $row) {
    $output .= '
		<tr>
			<td>' . $row["kode_transaksi"] . '</td>
			<td>' . $row["tanggal_beli"] . '</td>
      <td>' . $row["merek_barang"] . '</td>
      <td>' . $row["tipe_barang"] . '</td>
      <td>' . $row["nama_pembeli"] . '</td> 
      <td>' . $row["alamat_pembeli"] . '</td>
      <td>' . $row["harga_barang"] . '</td>
    </tr>';
  }
}
$output .= '</table>';
echo $output;
