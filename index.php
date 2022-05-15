<!DOCTYPE html>
<?php
    session_start();
    if (isset($_POST["submit"])) {

        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b22cd095417ef4";
        $password = "7513ff98";
        $db = "heroku_462ab0de7635101";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        if (isset($_POST["username"])) {
            // $_SESSION['uname'] = $_POST["username"];
            // $_SESSION['passwd'] = $_POST["password"];
            $uname = $_POST["username"];
            $passwd = $_POST["password"]; 

            $sql = "select * from ugp where `Username`='" . $uname . "' AND `Password`='" . $passwd . "'";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) >= 1) {
                // header("Location:progress.php?uname=usern&passwd=pass");
                header('Location: Create.php?pass='.$passwd.'&user='.$uname.'');
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