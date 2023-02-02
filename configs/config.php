<?php
$host="localhost";
$user="root";
$psw="";
$connect=mysqli_connect($host,$user,$psw);
$db_name="tikhon";
$tbl="users";
$tb2="articles";

$db_list=mysqli_query($connect, "SHOW DATABASES;");

$flag=0;

while ($row=mysqli_fetch_object($db_list)){ //проверка наличия БД
    if ($row->Database==$db_name){
        $flag=1;
    }
}

if ($flag==0){
    mysqli_query($connect, "CREATE DATABASE ".$db_name.";");
}

mysqli_query($connect, "USE ".$db_name.";");

$tbl_list=mysqli_query($connect, "SHOW TABLES LIKE 'users';");
$tb2_list=mysqli_query($connect, "SHOW TABLES LIKE 'articles';");

if ($tbl_list){//создание таблицы
    mysqli_query($connect, "CREATE TABLE ".$tbl."(`ID` int(10) UNSIGNED NOT NULL auto_increment UNIQUE KEY COMMENT 'Ключ',
        `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Пользователи';");
}

if ($tb2_list){//создание таблицы
    mysqli_query($connect, "CREATE TABLE ".$tb2."(`ID` int(11) unsigned not null auto_increment primary key,
        `namepage` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `caption` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        `textID` int(11) UNSIGNED NOT NULL,
		`text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
}
?>