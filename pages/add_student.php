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
<div class="flex justify-center">
    <div class="size-fit w-lg rounded-3xl shadow-lg text-lg text-black flex flex-col text-center items-center addForm m-10">
      <h2 class="text-4xl font-serif font-bold text-center">Add Student</h2>
      <p style="color:red;"><?php echo $message; ?></p>
 
      <form method="post">
          <label>Student ID*</label><br>
        <input class="w-sm" type="text" name="student_ID"><br><br>

        <label>Full Name*</label><br>
        <input class="w-sm" type="text" name="full_name"><br><br>
      
        <label>Email*</label><br>
        <input class="w-sm" type="text" name="email"><br><br>
      
        <label>course</label><br>
        <input class="w-sm" type="text" name="course"><br><br>
          <div class="flex gap-6 mt-4 mb-10" >
            <div class="flex flex-col w-1/2">
              <button class="" type="submit" name="save">Save</button>
            </div>
            <div class="flex flex-col w-1/2">
              <button class=" cancel"><a href="../index.php">Cancel</a></button>
            </div>
          </div>
              
      </form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>
 