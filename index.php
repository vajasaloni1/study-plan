<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Study Planner</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap');

body {
    font-family: 'Orbitron', sans-serif;
    background: #0f172a;
    margin: 0;
    padding: 0;
    color: #e2e8f0;
}

.container {
    width: 85%;
    margin: 40px auto;
    padding: 25px;
    background: #020617;
    border: 2px solid #00f7ff;
    border-radius: 12px;
    box-shadow: 0 0 25px #00f7ff;
}

h1 {
    text-align: center;
    color: #00f7ff;
    text-shadow: 0 0 10px #00f7ff;
}

input, select {
    padding: 10px;
    background: transparent;
    border: 2px solid #00f7ff;
    border-radius: 8px;
    color: #00f7ff;
    margin-right: 10px;
    outline: none;
}

input::placeholder {
    color: #94a3b8;
}

button {
    padding: 10px 15px;
    background: transparent;
    border: 2px solid #ff00ff;
    color: #ff00ff;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #ff00ff;
    color: black;
    box-shadow: 0 0 15px #ff00ff;
}

a {
    color: #22c55e;
    text-decoration: none;
    display: inline-block;
    margin-top: 15px;
}

a:hover {
    text-shadow: 0 0 10px #22c55e;
}

h2 {
    color: #38bdf8;
}

li {
    background: transparent;
    border-left: 5px solid #00f7ff;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,247,255,0.3);
}
    </style>
</head>
<body>

<h2>📚 Smart Study Planner</h2>

<form action="add_subject.php" method="POST">
    <input type="text" name="name" placeholder="Subject Name" required>

    <select name="difficulty">
        <option>Easy</option>
        <option>Medium</option>
        <option>Hard</option>
    </select>

    <input type="date" name="exam_date" required>

    <button type="submit">Add Subject</button>
</form>

<hr>

<a href="generate_plan.php">📅 Generate Study Plan</a>

<h3>Subjects List</h3>

<?php
$result = $conn->query("SELECT * FROM subjects");

while($row = $result->fetch_assoc()){
    echo "<div class='card'>
            <b>{$row['name']}</b><br>
            Difficulty: {$row['difficulty']}<br>
            Exam: {$row['exam_date']}
          </div>";
}
?>

</body>
</html>