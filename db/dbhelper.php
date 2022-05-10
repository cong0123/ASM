<?php
require_once ('config.php');
$con = mysqli_connect('localhost','root','','mau1') or die('connection failed');
function execute($sql) {
    // Them du lieu vao database
    // Mo ket noi toi database
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($con, 'utf8');

	//  truy van insert
	mysqli_query($con, $sql);

	// Dong ket noi database
	mysqli_close($con);
}

function executeResult($sql, $isSingle = false)
{
    // Them du lieu vao database
    // Mo ket noi toi database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($con, 'utf8');

    //truy van insert
    $resultset = mysqli_query($con, $sql);
    $data      = [];


    if($isSingle) {
        $data = mysqli_fetch_array($resultset, 1);
    } else {
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
    }

    // Dong ket noi database
    mysqli_close($con);

    return $data;
}

function executeSingleResult($sql)
{
    // Them du lieu vao database
    // Mo ket noi toi database
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    //truy van insert
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result, 1);

    // Dong ket noi database
    mysqli_close($con);

    return $row;
}