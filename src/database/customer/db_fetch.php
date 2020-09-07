<?php

include("../db_connection.php");

$query = "SELECT * FROM pembeli";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = ' 
        <table id="customer-table">
            <thead class="customer-table-head">
            <tr>
              <th>Kode</th>
              <th>Nama Pembeli</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Kota</th>
              <th>Ubah</th>
              <th>Hapus</th>
            </tr>
            </thead>';
if ($total_row > 0) {
  foreach ($result as $row) {
    $output .= '
		<tr>
		    <td>' . $row["kode_pembeli"] . '</td>
			<td>' . $row["nama_pembeli"] . '</td>
			<td>' . $row["kelamin_pembeli"] . '</td>
			<td>' . $row["alamat_pembeli"] . '</td>
			<td>' . $row["kota_pembeli"] . '</td>
			<td>
				<button type="submit" name="edit" class="btn-edit-customer edit" id="' . $row["kode_pembeli"] . '">Edit</button>
			</td>
			<td>
				<button type="submit name="delete" class="btn-delete-customer delete" id="' . $row["kode_pembeli"] . '">Delete</button>
			</td>
		</tr>
		';
  }
}
$output .= '</table>';
echo $output;
