<?php

include('../db_connection.php');

if (isset($_POST["action_product"])) {

	if ($_POST["action_product"] == "insert") {
		$query = "
		INSERT INTO barang (nama_barang, merek_barang, tipe_barang, harga_barang, stok_barang)
		VALUES (
			'" . $_POST["nama_barang"] . "',
			'" . $_POST["merek_barang"] . "',
			'" . $_POST["tipe_barang"] . "',
			'" . $_POST["harga_barang"] . "',
			'" . $_POST["stok_barang"] . "')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}

	if ($_POST["action_product"] == "fetch_single") {
		$query = "
		SELECT * FROM barang WHERE kode_barang = '" . $_POST["kode_barang"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output['kode_barang'] = $row['kode_barang'];
			$output['nama_barang'] = $row['nama_barang'];
			$output['merek_barang'] = $row['merek_barang'];
			$output['tipe_barang'] = $row['tipe_barang'];
			$output['harga_barang'] = $row['harga_barang'];
			$output['stok_barang'] = $row['stok_barang'];
		}
		echo json_encode($output);
	}

	if ($_POST["action_product"] == "update") {
		$query = "
		UPDATE barang
		SET nama_barang = '" . $_POST["nama_barang"] . "',
		merek_barang = '" . $_POST["merek_barang"] . "',
		tipe_barang = '" . $_POST["tipe_barang"] . "',
		harga_barang = '" . $_POST["harga_barang"] . "',
		stok_barang = '" . $_POST["stok_barang"] . "'
		WHERE kode_barang = '" . $_POST["kode_barang"] . "'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}

	if ($_POST["action_product"] == "delete") {
		$query = "DELETE FROM barang WHERE kode_barang = '" . $_POST["kode_barang"] . "'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}
