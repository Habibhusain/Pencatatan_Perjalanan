<?php

// menambah database
$db = new SQLite3("perjalanan.sqlite");

// mengecek variable db
if(!$db)
{
    echo $db -> lasterrorMsg();
    exit();
}else{
    // echo "Database Berhaisl";
}

// Tambah Table
 $db -> query("CREATE TABLE IF NOT EXISTS perjalanan 
                (id INTEGER NOT NULL PRIMARY KEY,transportasi TEXT NOT NULL, dari_jalan TEXT NOT NULL, ke_jalan TEXT NOT NULL,pengeluaran TEXT NOT NULL, dok TEXT NOT NULL,tanggal TEXT NOT NULL)");
