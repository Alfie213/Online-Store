<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinestore";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение параметров запроса
$query = $_POST["query"];

// Выполнение SQL-запроса
$result = $conn->query($query);

// Возвращение результатов в формате JSON
echo json_encode($result);

// Закрытие соединения
$conn->close();
?>