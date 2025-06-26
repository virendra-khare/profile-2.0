<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loging</title>
</head>
<body>
    <?php include('../connect.php'); 

    $id = $_POST['id'];
    $pass = $_POST['password'];

    ?>

    <div class="login">
        <form action="auth.php" method="post">
            <label for="User" >User Id</label>
            <input type="text" name="id">
            <label for="password">Password</label>
            <input type="password" name="password">
            <button type="submit">Submit</button>
        </form>
    </div>


    <?php
  

    
    if($query = "SELECT `Id`, `Password` FROM `user` WHERE 'Password' = '$pass' AND 'Id' = '$id'"){
        echo"$id";
    }else
    echo"Reconrd Not Found";
    ?>
</body>
</html>