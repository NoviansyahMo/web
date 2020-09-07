<?php

include("../db_connection.php");

$query = "SELECT * FROM barang";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = ' 
        <table id="product-table">
            <thead class="product-table-head">
            <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Merek</th>
              <th>Tipe</th>
              <th>Harga</th>
              <th>Stock</th>
              <th>Ubah</th>
              <th>Hapus</th>
            </tr>
            </thead>';
if ($total_row > 0) {
  foreach ($result as $row) {
    $output .= '
		<tr>
			<td>' . $row["kode_barang"] . '</td>
			<td>' . $row["nama_barang"] . '</td>
			<td>' . $row["merek_barang"] . '</td>
			<td>' . $row["tipe_barang"] . '</td>
			<td>' . $row["harga_barang"] . '</td>
			<td>' . $row["stok_barang"] . '</td>
			<td>
				<button type="submit" name="edit" class="btn-edit-product edit" id="' . $row["kode_barang"] . '">Edit</button>
			</td>
			<td>
				<button type="button" name="delete" class="btn-delete-product delete" id="' . $row["kode_barang"] . '">Delete</button>
			</td>
		</tr>
		';
  }
}
$output .= '</table>';
echo $output;
