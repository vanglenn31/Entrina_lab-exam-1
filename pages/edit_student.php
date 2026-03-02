<?php
include "../db.php";
 
$id = $_GET['id'];
 
$get = mysqli_query($conn, "SELECT * FROM student WHERE ID = $id");
$client = mysqli_fetch_assoc($get);
 
$message = "";
 
if (isset($_POST['update'])) {
    $student_ID = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "UPDATE student
            SET student_id = '$student_ID', full_name='$full_name', email='$email'
            WHERE ID =$id";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Student</title></head>
<body>

 
<h2>Edit Student</h2>
<p style="color:red;"><?php echo $message; ?></p>
 
<form method="post">
    <label>Student ID*</label><br>
  <input type="text" name="student_id" value="<?php echo $client['student_id']; ?>"><br><br>

  <label>Full Name*</label><br>
  <input type="text" name="full_name" value="<?php echo $client['full_name']; ?>"><br><br>
 
  <label>Email*</label><br>
  <input type="text" name="email" value="<?php echo $client['email']; ?>"><br><br>
 
  <label>Course</label><br>
  <input type="text" name="course" value="<?php echo $client['course']; ?>"><br><br>

 
  <button type="submit" name="update">Update</button>
</form>
</body>
</html>
 