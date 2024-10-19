<?php


function database(){
// menambah database
$db = new SQLite3("db_perjalanan.sqlite");

// mengecek variable db
if(!$db)
{
    echo $db -> lasterrorMsg();
    exit();
}else{
    // echo "Database Berhaisl";
}
return $db;
}

function table(){
// Tambah Table
$table= database() -> query("CREATE TABLE IF NOT EXISTS perjalanan 
                (id INTEGER NOT NULL PRIMARY KEY,transportasi TEXT NOT NULL, dari_jalan TEXT NOT NULL, ke_jalan TEXT NOT NULL,pengeluaran TEXT NOT NULL, dok TEXT NOT NULL,tanggal TEXT NOT NULL)");
    return $table;
}

table();