    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- <meta charset="UTF-8"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <!-- <script src="query.js"></script> -->
        <title>Unity Guide Page</title>
    </head>

    <body>
        <script>
            function start(currentProg) {
                // var sidebar = document.getElementsByClassName("sidebar");
                var pages = document.getElementsByClassName("pages");
                // console.log(currentProg);

                for (i = 0; i < pages.length; i++) {
                    console.log(pages[i].id);
                    if (parseInt(pages[i].id) == currentProg) {
                        pages[i].classList.add("current");
                        console.log("active");
                    } else if (parseInt(pages[i].id) < currentProg) {
                        pages[i].classList.add("done");
                        console.log("done");
                    } else {
                        pages[i].classList.add("disabled");
                        console.log("disabled");
                    }
                    // Adding classes doesnt work yet (it works finally)
                }
            }

            function check(question) {
                // Delete last run value (from now it is deleted from the php part)
                // console.log(window.location.replace("&run=1",""));
                // location.assign(window.location.replace("&run=1","")); //href is needed for value, because replace cant handle window location 
                // location.assign(window.location.replace("&run=0",""));
                if (question == 0) {
                    if (document.getElementById("imp1").value == "string" && document.getElementById("imp2").value == "public" && document.getElementById("imp3").value == "=5f;" && document.getElementById("K1").value == "3") {
                        console.log(window.location.href.replace("%22", ""));
                        // alert("You answered well! Keep going!");
                        //Alert reloads current page??
                        // window.location.href = window.location+"&run=1";
                        location.assign(window.location + "&run=1");
                    } else {
                        alert("Unfortunately you missed something! Try again!");
                    }
                } else {
                    location.assign(window.location + "&run=0");
                }
            }
        </script>


        <div class="sidebar">
            <h3>Unity Guide Page</h3>
            <a class="active pages" href="Create.php" id="0">Create main things</a>
            <a class="pages" href="Images.php" id="1">Import and use images</a>
            <a class="pages" href="Gameobjects.php" id="2">GameObjects introduced</a>
            <!-- Problem was that I referred to id when we had names here instead of ids -->
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
                <form action="Create.php" method="post">
                    <h2>Knowledge checking query</h3>
                        <div class="question">
                            <h3>Complete the code line to define a string variable with the name <i>itIsString</i>!</h3>
                            <p><input type="text" id="imp1"> ItIsString;</p>
                            <h3>Complete the code line to define a PUBLIC float varible with the name <i>itIsFloat</i> with
                                value of 5!</h3>
                            <p><input type="text" id="imp2"> float itIsFloat <input type="text" id="imp3"></p>
                            <h3>How do create a GameObject, a Material, a Script or a Scene?</h3>
                            <select class="custom-select" id="K1">
                                <option value="1">Define them from code.</option>
                                <option value="2">Right-click on the files section and select what you want.</option>
                                <option value="3">Both of the methods above works well.</option>
                            </select>
                            <button type="button" class="btn btn-secondary" name="button" onclick="check(0)">Check all</button>
                            <!-- Not submit just classic button doesnt reload the page, so php code doesn't run again -->
                        </div>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <?php
        // session_start();
        ob_start();
        // function Progress($progress)
        // {
        if (isset($_GET["run"])) {
            $host = "us-cdbr-east-05.cleardb.net";
            $user = "b22cd095417ef4";
            $password = "7513ff98";
            $db = "heroku_462ab0de7635101";

            $mysqli = mysqli_connect($host, $user, $password);
            mysqli_select_db($mysqli, $db);

            // include 'index.php';

            // global $uname;
            // global $passwd;

            $sql = "select `Progress` from `ugp` where `Username`='" . $_GET['user'] . "' and `Password`='" . $_GET['pass'] . "'";
            $db_progress = mysqli_fetch_array(mysqli_query($mysqli, $sql))[0];
            // echo "<script>console.log('" . $db_progress . "');</script>";
            $progress = 1; //the number of the progress where we get if we answer correctly (different in each page)
            // echo "<script>console.log(". $_GET['run'] .");</script>";

            if ($_GET["run"] == 1) {
                if ($db_progress == $progress - 1) {
                    $sql = "update `ugp` set `Progress`=" . $progress . " where `Username`='" . $_GET['user'] . "' and `Password`='" . $_GET['pass'] . "'";
                    $sql_result = mysqli_query($mysqli, $sql);

                    // Refresh the page with no run values to avoid running this part so getting the else branch on reload (replace doesnt work)
                    // echo "<script>console.log(". str_replace('&run=1', '', $_SERVER['QUERY_STRING']) . ");</script>";
                    // echo "<script>console.log(". $_SERVER['HTTP_HOST'] .");</script>"; //Turned out that this gives us just localhost:8000, so that's the problem
                    echo "<script>location.assign('http://" . $_SERVER['HTTP_HOST']."/Images.php?".str_replace("&run=1", "", $_SERVER['QUERY_STRING']) . "')</script>";//Enter the next page here; we use JS here because PHP had problem with modifying header
                    // header("Location:".$_SERVER['HTTP_HOST'].$_SERVER['HTTP_URl']."");
                } else {
                    // echo "<script>console.log(". str_replace('&run=1', '', $_SERVER['QUERY_STRING']) .");</script>";
                    echo "<script>alert('You have solved the task well, but you are more forward with the progress!')</script>";
                    echo "<script>location.assign('http://" . $_SERVER['HTTP_HOST']."/Create.php?".str_replace("&run=0", "", $_SERVER['QUERY_STRING']) . "')</script>";
                }
            }
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
        // }
        // function getCurProg()
        // {
        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b22cd095417ef4";
        $password = "7513ff98";
        $db = "heroku_462ab0de7635101";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        // echo "<script>alert('I dont get it');</script>";

        $sql = "select Progress from ugp where `Username`='" . $_GET['user'] . "' AND `Password`='" . $_GET['pass'] . "'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($result);
        // echo "<script>console.log(" . $row[0] . ")</script>";
        echo "<script>start(" . $row[0] . ");</script>";
        // echo "<script>console.log(" . $_GET['user'] . ")</script>";
        // }
        ?>
    </body>

    </html>