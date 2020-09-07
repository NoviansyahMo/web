<?php

include('../db_connection.php');

if (isset($_POST["action_transaction"])) {

    if ($_POST["action_transaction"] == "insert") {
        $query = "INSERT INTO transaksi (tanggal_beli, kode_barang, kode_pembeli) 
        VALUES ('" . $_POST["tanggal_beli"] . "','" . $_POST["kode_barang"] . "','" . $_POST["kode_pembeli"] . "')";
        $statement = $connect->prepare($query);
        $statement->execute();
        var_dump($statement);
        echo '<p>Data Inserted...</p>';
    }
}
