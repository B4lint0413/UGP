<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="query.js"></script> -->
    <title>Unity Guide Page</title>
</head>

<body>

    <?php
        function Progress($progress) {

            $host = "us-cdbr-east-05.cleardb.net";
            $user = "b22cd095417ef4";
            $password = "7513ff98";
            $db = "heroku_462ab0de7635101";

            $mysqli = mysqli_connect($host, $user, $password);
            mysqli_select_db($mysqli, $db);

            include 'index.php';
            
            $sql = "select `Progress` from `ugp` where `Username`='".$uname."' and `Password`='".$passwd."'";
            $db_progress = mysqli_query($mysqli, $sql);
            
            if ($db_progress == $progress-1) {
                $uname = $_POST["username"];
                $passwd = $_POST["password"];
                $sql = "update `ugp` set `Progress`='".$progress."' where `Username`='".$uname."' and `Password`='".$passwd."'";
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
        function getCurProg(){
            $host = "us-cdbr-east-05.cleardb.net";
            $user = "b22cd095417ef4";
            $password = "7513ff98";
            $db = "heroku_462ab0de7635101";

            $mysqli = mysqli_connect($host, $user, $password);
            mysqli_select_db($mysqli, $db);

            include 'index.php';
            
            echo "<p>test</p>";

            $sql = "select `Progress` from `ugp` where `Username`='".$uname."' and `Password`='".$passwd."'";
            return mysqli_query($mysqli, $sql);
        }
    ?>
    <script type="text/javascript">
        var currentProg = <?php echo getCurProg();?>
        var sidebar = document.getElementsByClassName("sidebar");
        var pages = sidebar.getElementsByTagName("a");

        console.log(currentProg);
        console.log(pages);

        for (const page in pages) {
            if (page.name == currentProg) {
                page.classList.add("current");
            } else if (page.name < currentProg) {
                page.classList.add("done");
            } else {
                page.classList.add("disabled");
            }
        }

        function check(question) {
            if (question == 0) {
                if (document.getElementById("imp1").value == "string" && document.getElementById("imp2").value == "public" && document.getElementById("imp3").value == "=5f;" && document.getElementById("K1").value == "3") {
                    alert("You answered well! Keep going!");
                    <?php echo Progress(1); ?>
                } else {
                    alert("Unfortunately you missed something! Try again!");
                }
            } else if (question == 1) {
                if (document.getElementById("K2").value == "1" && document.getElementById("K3").value == "1" && document.getElementById("K4").value == "3") {
                    alert("You answered well! Keep going!");
                    <?php echo Progress(2); ?>
                } else {
                    alert("Unfortunately you missed something! Try again!");
                }

            } else if (question == 2) {
                if (document.getElementById("K5").value == "2" && document.getElementById("imp4").value == "Debug.log(" && document.getElementById("imp5").value == "GameObject MyGameObject" && document.getElementById("imp6").value == "new GameObject(") {
                    alert("You answered well! Keep going!");
                    <?php echo Progress(3); ?>
                } else {
                    alert("Unfortunately you missed something! Try again!");
                }
            }
        }
    </script>

    <div class="sidebar">
        <h3>Unity Guide Page</h3>
        <a class="active" href="Create.php" name="0">Create main things</a>
        <a href="Images.html" name="1">Import and use images</a>
        <a href="Gameobjects.html" name="2">GameObjects introduced</a>
    </div>

    <div class="content">
        <!-- Homemade screenshots instead of YT video -->
        <div class="media">
            <h2>Media for learning</h3>
            <p></p>
        </div>
        <!-- Documentation -->
        <div class="documentation">
            <h2>Documentation</h3>
            <p></p>
        </div>
        <!-- Query -->
        <div class="query">
            <h2>Knowledge checking query</h3>
            <div class="question">
                <h3>Complete the code line to define a string variable with the name <i>itIsString</i>!</h3>
                <p><input type="text" id="imp1"> ItIsString;</p>
                <h3>Complete the code line to define a PUBLIC float varible with the name <i>itIsFloat</i> with value of 5!</h3>
                <p><input type="text" id="imp2"> float itIsFloat <input type="text" id="imp3"></p>
                <h3>How do create a GameObject, a Material, a Script or a Scene?</h3>
                <select class="custom-select" id="K1">
                    <option value="1">Define them from code.</option>
                    <option value="2">Right-click on the files section and select what you want.</option>
                    <option value="3">Both of the methods above works well.</option>
                </select>
                <button type="submit" class="btn btn-secondary" onclick="check(0)">Check all</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>

</html>