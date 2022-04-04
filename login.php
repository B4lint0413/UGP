<?php
    if (isset($_POST["submit"])) {

        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "ugp";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        if (isset($_POST["username"])) {
            $uname = $_POST["username"];
            $passwd = $_POST["password"];

            $sql = "select * from userdata where Username='" . $uname . "' AND Password='" . $passwd . "'";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) == 1) {
                echo "<p>Successful login!</p>";
                exit();
            } else {
                // echo "<p>Wrong password or username!</p>";
                header("Refresh:0");
                echo '<script type="text/javascript">alert("Wrong password or username!")</script>';
                exit();
            }
        }
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Unity Guide Page</title>

    </head>

    <body>
        <form method="post">
            <h2>Login</h2>
            <label>Username</label>
            <input type="text" name="username" placeholder="Username">
            <label>Username</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
        <a href="signup.php">Don't have an account? Sign up!</a>
    </body>

    </html>