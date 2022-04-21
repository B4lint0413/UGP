<?php
    if (isset($_POST["submit"])) {

        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b22cd095417ef4";
        $password = "7513ff98";
        $db = "heroku_462ab0de7635101";
        
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
                header("Location: index.php");
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
        <a href="index.php">Do you have an account? Sign in!</a>
    </body>

    </html>