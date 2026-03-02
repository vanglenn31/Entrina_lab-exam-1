<?php
session_start();
 
// If not logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

/* ============================
   SOFT DELETE (Deactivate)
   ============================ */
if (isset($_GET['ID'])) {
  $delete_id = $_GET['ID'];
 
 
  // Soft delete (set is_active to 0)
  mysqli_query($conn, "UPDATE student SET is_active=0 WHERE ID=$delete_id");
 
 
  header("Location: index.php");
  exit;
}

$result = mysqli_query($conn, "SELECT * FROM student ORDER BY ID DESC");
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Students</title>
<link rel="stylesheet" href="./styles/index.css"></head>
<body>

<h2>Student Records</h2>
<p class="addClientbtn"><a  href="pages/add_student.php">+ Add Student</a></p>
 

<div class="container">
  <table class="show-data" border="1" cellpadding="8">
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { 
      if ($row['is_active'] == 0)
        continue
      ?>

      <tr>
        <td><?php echo $row['student_id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>
          <a class="edit-btn" href="pages/edit_student.php?id=<?php echo $row['ID']; ?>">Edit</a>
          <?php if ($row['is_active'] == 1) { ?>
          |
            <a class="deactivate-btn" href="index.php?ID=<?php echo $row['ID']; ?>"
              onclick="return confirm('Deactivate this service?')">
              Delete
            </a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
<a class="deactivate-btn logout" href="logout.php">Logout</a>
</html>
