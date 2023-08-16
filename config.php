<?php
$host = "127.0.0.1"; // MySQL 호스트 주소
$username = "root"; // MySQL 사용자 이름
$password = "1234"; // MySQL 비밀번호
$database = "inform"; // 사용할 데이터베이스 이름

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>