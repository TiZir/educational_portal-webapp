<?php
include 'configs\config.php';

function textFromTable($connect, $name, $baseID) {
    $txt = array();
    $query = "SELECT * FROM articles WHERE textID = $baseID and namepage = '$name'";
    $res = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_row($res)) {
        $txt[] = $row;
    }
    return $txt;
}

function getPageName($connect, $name) {
    $baseName = array();
    $query = "select * from articles where namepage='$name'";
    $res = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_row($res)) {
        $baseName[] = $row;
    }
    return $baseName;
}

function nextTextID($connect, $name) {
    $res = mysqli_query($connect, "SELECT count(*) FROM articles WHERE namepage = '$name'");
    $row = mysqli_fetch_row($res);
    return $row[0] + 1;
}

function insetTable($connect, $name, $baseName, $baseID, $text) {
    $txt = mysqli_real_escape_string($connect, $text);
    $query = "INSERT INTO `articles`(`namepage`, `caption`, `textID`, `text`) values('".$name."',"."'".$baseName."'".","."'".$baseID."'".",'".$text."');";
    mysqli_query($connect, $query);
}


function updateTable($connect,$name, $baseName, $baseID, $text) {
    $txt = mysqli_real_escape_string($connect, $text);
    $query = "UPDATE `articles` SET `caption`='$baseName',`text`='$txt' WHERE textID = $baseID and namepage = '$name'";
    mysqli_query($connect, $query);
}


function deleteTable($connect, $name, $baseID) {
    $query = "DELETE FROM `articles` WHERE textID=$baseID and namepage ='$name'";
    mysqli_query($connect, $query);
    $query = "UPDATE `articles`  SET `textID`=baseID - 1 WHERE namepage= '$name' and textID > $baseID";
    mysqli_query($connect, $query);
}
?>