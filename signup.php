<?php
    if (isset($_POST["submit"])) {

        $host = "us-cdbr-east-05.cleardb.net";
        $user = "bd88d17e743092";
        $password = "224ac2fe";
        $db = " heroku_c8dbe50d0c9829c ";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        if (isset($_POST["username"])) {
            $uname = $_POST["username"];
            $passwd = $_POST["password"];

            $sql = "select * from ugp where Username='" . $uname . "'";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) == 1) {
                header("Refresh:0");
                echo "<script>alert('Username is taken');</script>";
                exit();
            } else {
                $sql_newacc = "insert into ugp (Username, Password, Progress) values ('".$uname."', '".$passwd."', '0')";
                mysqli_query($mysqli, $sql_newacc);
                echo "<script>alert('Successful registration! Now log in!')</script>";
                header("Location: login.php");
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
            <h2>Registration</h2>
            <label>Username</label>
            <input type="text" name="username" placeholder="Username">
            <label>Username</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
        <a href="login.php">Do you have an account? Sign in!</a>
    </body>

    </html>