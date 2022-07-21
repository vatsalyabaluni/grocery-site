<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="https://project-shopping-with-recomend.herokuapp.com/add category.php" method="post" enctype="multipart/form-data">
    Enter Category ID <br>
    <input type="text" name="category_id" id="2"><br>
    
    Enter name of category <br>
    <input type="text" name="category_name" id="1"><br>
        <br>
    Add category image <br>
    <input type="file" name="category_image" id="4"><br>
    <input type="submit" name="submit" id="3" value="submit"><br>

    </form>
    Categories Available in Database <br>
    <table border="2">
  <tr>
    <td>Category_Id</td>
    <td>Category_Name</td>
  </tr>
    <?php
        include('login_cred.php');
        if(!$conn)
            die("Error in Connection : ".mysqli_connect_error());
        $sql = "SELECT * FROM category";
        $records = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_array($records))
        {
      ?>
      <tr>
        <td><?php echo $data['category_id']; ?></td>
        <td><?php echo $data['category_name']; ?></td>
      </tr>
      <?php
        }
        ?>
</body>
</html>