<?php

require_once 'db_config.php';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/* CREATE */
if (isset($_POST['create'])) {
    $stmt = $conn->prepare(
        "INSERT INTO students (name,email,phone,department_id)
         VALUES (?,?,?,?)"
    );
    $stmt->bind_param(
        "sssi",
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['department_id']
    );
    $stmt->execute();
}

/* UPDATE */
if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE students
         SET name=?, email=?, phone=?, department_id=?
         WHERE student_id=?"
    );
    $stmt->bind_param(
        "sssii",
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['department_id'],
        $_POST['student_id']
    );
    $stmt->execute();
}

/* DELETE */
if (isset($_GET['delete'])) {
    $stmt = $conn->prepare(
        "DELETE FROM students WHERE student_id=?"
    );
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
}

/* READ */
$result = $conn->query(
    "SELECT s.*, d.department_name
     FROM students s
     LEFT JOIN departments d
     ON s.department_id=d.department_id
     ORDER BY s.student_id"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD - RDS</title>
</head>

<body>

<h1>Student Management</h1>

<h2>Create Student</h2>

<form method="POST">
    Name:
    <input type="text" name="name" required><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Phone:
    <input type="text" name="phone"><br><br>

    Department ID:
    <input type="number" name="department_id" required><br><br>

    <button name="create">Create</button>
</form>

<h2>Students</h2>

<table border="1" cellpadding="8">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Department</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>

<tr>

<td><?= $row['student_id'] ?></td>

<td>
<form method="POST">
<input type="hidden" name="student_id"
       value="<?= $row['student_id'] ?>">
<input type="text" name="name"
       value="<?= htmlspecialchars($row['name']) ?>">
</td>

<td>
<input type="email" name="email"
       value="<?= htmlspecialchars($row['email']) ?>">
</td>

<td>
<input type="text" name="phone"
       value="<?= htmlspecialchars($row['phone']) ?>">
</td>

<td>
<input type="number" name="department_id"
       value="<?= $row['department_id'] ?>">
</td>

<td>
<button name="update">Update</button>
</form>
</td>

<td>
<a href="?delete=<?= $row['student_id'] ?>"
   onclick="return confirm('Delete this student?')">
   Delete
</a>
</td>

</tr>

<?php endwhile; ?>

</table>

</body>
</html>
