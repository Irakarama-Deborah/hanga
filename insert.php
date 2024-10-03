<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $name=$_POST['name'];

  $email=$_POST['email'];

  $insert=mysqli_query($conn,"INSERT INTO `author` VALUES('','$name','$email')");
  if ($insert==true) {
    echo "data has been inserted in database";
      // code...
  }else{
    echo "data has not been connected to database, try again";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="name"><br><br>
        <label>Email</label>
        <input type="text" name="email"><br><br>
        <input type="submit" name="submit" value="insert">
    </form>
    

    <table border="2" align="center">
        <tr>
            <th>ID</th>
             <th>USERNAME</th>
              <th>EMAIL</th>
        </tr>
        <?php 
        $select=mysqli_query($conn,"SELECT * FROM `author`");
        
        while ($row=mysqli_fetch_assoc($select)) {
     
        ?>
        <tr>
            <td> <?php echo $row['id'] ?></td>
            <td> <?php echo $row['name'] ?></td>
            <td> <?php echo $row['email'] ?></td>
        </tr>
            <?php 
}
?>
    </table>

</body>
</html>