<?php
include 'db.php';

$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$exam_date = $_POST['exam_date'];

$sql = "INSERT INTO subjects (name, difficulty, exam_date)
        VALUES ('$name', '$difficulty', '$exam_date')";

$conn->query($sql);

header("Location: index.php");
?>