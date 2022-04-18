<?php
    function Progress($progress) {

        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b22cd095417ef4";
        $password = "7513ff98";
        $db = " heroku_462ab0de7635101 ";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        include 'index.php';
        
        $sql = "SELECT `Progress` FROM `ugp` WHERE `Username`='".$uname."' AND `Password`='".$passwd."'";
        $db_progress = mysqli_query($mysqli, $sql);
        
        if ($db_progress == $progress-1) {
            $uname = $_POST["username"];
            $passwd = $_POST["password"];
            $sql = "UPDATE `ugp` SET `Progress`='".$progress."' WHERE `Username`='".$uname."' AND `Password`='".$passwd."'";
            mysqli_query($mysqli, $sql);
            header("Refresh:0");
        }else{
            echo "<script>alert('You have solved the task well, but you are more forward with the progress!')</script>";
        }

        //     if (mysqli_num_rows($result) == 1) {
        //         header("Refresh:0");
        //         echo "<script>alert('Username is taken');</script>";
        //         exit();
        //     } else {
        //         $sql_newacc = "insert into ugp (Username, Password, Progress) values ('".$uname."', '".$passwd."', '0')";
        //         mysqli_query($mysqli, $sql_newacc);
        //         echo "<script>alert('Successful registration! Now log in!')</script>";
        //         header("Location: login.php");
        //         exit();
        //     }
        // }
    }

?>