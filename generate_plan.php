<!DOCTYPE html>
<html>
<head>
    <title>Study Plan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .card {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 15px;
            margin: 15px auto;
            width: 320px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card b {
            font-size: 18px;
        }
    </style>

</head>
<body>

<?php
include 'db.php';

echo "<h2>📘 Generated Study Plan</h2>";

$result = $conn->query("SELECT * FROM subjects ORDER BY exam_date ASC");

while($row = $result->fetch_assoc()){

    $today = date("Y-m-d");
    $exam = $row['exam_date'];

    $days_left = (strtotime($exam) - strtotime($today)) / (60*60*24);

    // AI logic
    if($row['difficulty'] == "Hard"){
        $hours = 3;
    } elseif($row['difficulty'] == "Medium"){
        $hours = 2;
    } else {
        $hours = 1;
    }

    echo "<div class='card'>";
    echo "<b>{$row['name']}</b><br>";
    echo "Days Left: " . round($days_left) . "<br>";
    echo "Recommended Study: $hours hours/day";
    echo "</div>";
}
?>

</body>
</html>