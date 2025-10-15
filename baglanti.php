<?php
// Veritabanı bağlantı bilgileri
$host="localhost"; // Veritabanı sunucusu
$kullanici="root"; // Veritabanı kullanıcı adı
$parola=""; // Veritabanı parolası
$vt="uyelik";  // Veritabanı adı

// Veritabanı bağlantısını kurma
$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");

?>