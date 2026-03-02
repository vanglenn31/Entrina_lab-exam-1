<?php
include "db.php";

/* ============================
   SOFT DELETE (Deactivate)
   ============================ */
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
 
 
  // Soft delete (set is_active to 0)
  mysqli_query($conn, "UPDATE services SET is_active=0 WHERE service_id=$delete_id");
 
 
  header("Location: services_list.php");
  exit;
}

$result = mysqli_query($conn, "SELECT * FROM student ORDER BY ID DESC");
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Clients</title></head>
<body>

<h2>Student Records</h2>
<p><a href="pages/add_student.php">+ Add Client</a></p>
 
<table border="1" cellpadding="8">
  <tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th>
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['student_id']; ?></td>
      <td><?php echo $row['full_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['course']; ?></td>
      <td>
        <a href="pages/edit_student.php?id=<?php echo $row['ID']; ?>">Edit</a>
         <?php if ($row['is_active'] == 1) { ?>
          |
          <a class="deactivate-btn" href="services_list.php?delete_id=<?php echo $row['service_id']; ?>"
             onclick="return confirm('Deactivate this service?')">
             Deactivate
          </a>
        <?php } ?>
      </td>
    </tr>
  <?php } ?>
</table>
</body>
</html>
