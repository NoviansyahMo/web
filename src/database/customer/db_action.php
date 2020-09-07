<?php

include('../db_connection.php');

if (isset($_POST["action_customer"])) {

    if ($_POST["action_customer"] == "insert") {
        $query = "
		INSERT INTO pembeli (nama_pembeli, kelamin_pembeli, alamat_pembeli, kota_pembeli)
		VALUES (
			'" . $_POST["nama_pembeli"] . "',
			'" . $_POST["kelamin_pembeli"] . "',
			'" . $_POST["alamat_pembeli"] . "',
			'" . $_POST["kota_pembeli"] . "')
		";
        $statement = $connect->prepare($query);
        $statement->execute();
        echo '<p>Data Inserted...</p>';
    }

    if ($_POST["action_customer"] == "fetch_single") {
        $query = "
		SELECT * FROM pembeli WHERE kode_pembeli = '" . $_POST["kode_pembeli"] . "'
		";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['kode_pembeli'] = $row['kode_pembeli'];
            $output['nama_pembeli'] = $row['nama_pembeli'];
            $output['kelamin_pembeli'] = $row['kelamin_pembeli'];
            $output['alamat_pembeli'] = $row['alamat_pembeli'];
            $output['kota_pembeli'] = $row['kota_pembeli'];
        }
        echo json_encode($output);
    }

    if ($_POST["action_customer"] == "update") {
        $query = "
		UPDATE pembeli
		SET nama_pembeli = '" . $_POST["nama_pembeli"] . "',
		kelamin_pembeli = '" . $_POST["kelamin_pembeli"] . "',
		alamat_pembeli = '" . $_POST["alamat_pembeli"] . "',
		kota_pembeli = '" . $_POST["kota_pembeli"] . "'
		WHERE kode_pembeli = '" . $_POST["kode_pembeli"] . "'
		";
        $statement = $connect->prepare($query);
        $statement->execute();
        echo '<p>Data Updated</p>';
    }

    if ($_POST["action_customer"] == "delete") {
        $query = "DELETE FROM pembeli WHERE kode_pembeli = '" . $_POST["kode_pembeli"] . "'";
        $statement = $connect->prepare($query);
        $statement->execute();
        echo '<p>Data Deleted</p>';
    }
}
