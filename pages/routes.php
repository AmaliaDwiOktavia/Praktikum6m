<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch($page){
        case '':
        case 'dashboard':
            file_exists("dashboard.php") ? include "dashboard.php" : include "404.php";
            break;

        case 'dosen':
            file_exists("dosen/dosen.php") ? include "dosen/dosen.php" : include "404.php";
            break;
        case 'dosencreate':
            file_exists("dosen/dosencreate.php") ? include "dosen/dosencreate.php" : include "404.php";
            break;
        case 'dosenupdate':
            file_exists("dosen/dosenupdate.php") ? include "dosen/dosenupdate.php" : include "404.php";
            break;
        case 'dosendelete':
            file_exists("dosen/dosendelete.php") ? include "dosen/dosendelete.php" : include "404.php";
            break;
        
        case 'matakuliah':
            file_exists("matakuliah/matakuliah.php") ? include "matakuliah/matakuliah.php" : include "404.php";
            break;
        case 'matakuliahcreate':
            file_exists("matakuliah/matakuliahcreate.php") ? include "matakuliah/matakuliahcreate.php" : include "404.php";
            break;
        case 'matakuliahupdate':
            file_exists("matakuliah/matakuliahupdate.php") ? include "matakuliah/matakuliahupdate.php" : include "404.php";
            break;
        case 'matakuliahdelete':
            file_exists("matakuliah/matakuliahdelete.php") ? include "matakuliah/matakuliahdelete.php" : include "404.php";
            break;

        case 'tugas':
            file_exists("tugas/tugas.php") ? include "tugas/tugas.php" : include "404.php";
            break;
        case 'tugascreate':
            file_exists("tugas/tugascreate.php") ? include "tugas/tugascreate.php" : include "404.php";
            break;
        case 'tugasupdate':
            file_exists("tugas/tugasupdate.php") ? include "tugas/tugasupdate.php" : include "404.php";
            break;
        case 'tugasdelete':
            file_exists("tugas/tugasdelete.php") ? include "tugas/tugasdelete.php" : include "404.php";
            break;

        default:
            include "404.php";
            break;
    }
} else {
    include "dashboard.php";
}