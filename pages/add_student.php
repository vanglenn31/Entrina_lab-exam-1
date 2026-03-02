<?php
include "../db.php";
 
$message = "";
 
if (isset($_POST['save'])) {
    $student_ID = $_POST['student_ID'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
 
  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "INSERT INTO student (student_ID, full_name, email,  course)
            VALUES ('$student_ID', '$full_name', '$email', '$course')";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Add Client</title>
<link rel="stylesheet" href="../styles/pages.css">
</head>
<body>

<h2>Add Client</h2>
<p style="color:red;"><?php echo $message; ?></p>
 
<form method="post">
    <label>Student ID*</label><br>
  <input type="text" name="student_ID"><br><br>

  <label>Full Name*</label><br>
  <input type="text" name="full_name"><br><br>
 
  <label>Email*</label><br>
  <input type="text" name="email"><br><br>
 
  <label>course</label><br>
  <input type="text" name="course"><br><br>
 
  <button type="submit" name="save">Save</button>
</form>
</body>
</html>
 