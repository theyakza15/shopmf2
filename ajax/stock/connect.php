<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_mafearshop"; //ชื่อฐานข้อมูล

//การเชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($host, $username, $password, $dbname);

//กำหนด charset ให้ฐานข้อมุลอ่านภาษาไทยได้
mysqli_query($conn, 'set names utf8');
