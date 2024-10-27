<?php
include "config.php";


if (isset($_POST['but_submit'])) {

    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);


    if ($admin_name != "" && $admin_password != "") {

        $sql_query = "select count(*) as cntUser from admin where admin_name='" . $admin_name . "' and admin_password='" . $admin_password . "'";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['admin_name'] = $admin_name;
            header('Location: admin_user.php');
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("Invalid username and password")';  //not showing an alert box.
            echo '</script>';
        }
    }
}
?>
<html>

<head>
    <title>Login Page Admin</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            

                <h2>ADMIN LOGIN</h2>

                <label>Username</label>
                <input type="text" name="admin_name" placeholder="Username"><br>

                <label>Password</label>
                <input type="password" name="admin_password" placeholder="Password"><br><br>
                

                <button type="submit" value="Submit" name="but_submit" id="but_submit">Submit</button><br><br>
                <input class="create" type="button" onclick="window.location.href='../homepage.php';" value="Homepage"><br><br><br>
            
        </form>
    </div>
</body>

</html>