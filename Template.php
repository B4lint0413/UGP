    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Unity Guide Page</title>
    </head>

    <body>
        <script>
            // It gets called on every reload from PHP with the DB current progress
            function start(currentProg) {
                var pages = document.getElementsByClassName("pages");

                for (i = 0; i < pages.length; i++) {
                    if (parseInt(pages[i].id) == currentProg) {
                        pages[i].classList.add("current");
                    } else if (parseInt(pages[i].id) < currentProg) {
                        pages[i].classList.add("done");
                    } else {
                        pages[i].classList.add("disabled");
                    }
                    // Adding classes doesnt work yet (it works finally)
                }
            }

            //It gets called on button click, it checkes whether user answered well, and reloads page with proper JQUERY run value
            function check(question) {
                // Delete last run value (from now it is being deleted from the php part)
                if (document.getElementById("imp1").value == "string" && document.getElementById("imp2").value == "public" && document.getElementById("imp3").value == "=5f;" && document.getElementById("K1").value == "3") {
                    location.assign(window.location + "&run=1");
                } else {
                    alert("Unfortunately you missed something! Try again!");
                }
                // run=0 isnt needed
            }
        </script>


        <div class="sidebar">
            <h3>Unity Guide Page</h3>
            <a class="pages" href="Create.php" id="0">Create main things</a>
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
                            <!-- Questions -->

                            <!-- It doesnt reload the page, just call JS check func which reloads with keep JQUERY -->
                            <button type="button" class="btn btn-secondary" name="button" onclick="check()">Check all</button><!-- check value doesnt needed(there is just one query here) -->
                            <!-- Not submit just classic button doesnt reload the page, so php code doesn't run again -->
                        </div>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <?php
        // Runs on reload when JS checking happened and act according to the JQUERY run's value
        ob_start();
        if (isset($_GET["run"])) {
            $host = "us-cdbr-east-05.cleardb.net";
            $user = "b22cd095417ef4";
            $password = "7513ff98";
            $db = "heroku_462ab0de7635101";

            $mysqli = mysqli_connect($host, $user, $password);
            mysqli_select_db($mysqli, $db);

            $sql = "select `Progress` from `ugp` where `Username`='" . $_GET['user'] . "' and `Password`='" . $_GET['pass'] . "'";
            $db_progress = mysqli_fetch_array(mysqli_query($mysqli, $sql))[0];
            $progress = 1; //the number of the progress where we get if we answer correctly (different in each page)

            if ($_GET["run"] == 1) {
                if ($db_progress == $progress - 1) {
                    $sql = "update `ugp` set `Progress`=" . $progress . " where `Username`='" . $_GET['user'] . "' and `Password`='" . $_GET['pass'] . "'";
                    $sql_result = mysqli_query($mysqli, $sql);

                    // Refresh the page with no run values to avoid running this part so getting the else branch on reload (replace doesnt work)
                    echo "<script>location.assign('http://" . $_SERVER['HTTP_HOST'] . "/Images.php?" . str_replace("&run=1", "", $_SERVER['QUERY_STRING']) . "')</script>"; //Enter the next page here; we use JS here because PHP had problem with modifying header
                } else {
                    echo "<script>alert('You have solved the task well, but you are more forward with the progress!')</script>";
                    echo "<script>location.assign('http://" . $_SERVER['HTTP_HOST'] . "/Create.php?" . str_replace("&run=0", "", $_SERVER['QUERY_STRING']) . "')</script>"; //Enter here current page
                }
            }
        }
        // Checks the current progress and modifies sidebar classes with JS start func; it runs on every reload
        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b22cd095417ef4";
        $password = "7513ff98";
        $db = "heroku_462ab0de7635101";

        $mysqli = mysqli_connect($host, $user, $password);
        mysqli_select_db($mysqli, $db);

        $sql = "select Progress from ugp where `Username`='" . $_GET['user'] . "' AND `Password`='" . $_GET['pass'] . "'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($result);
        echo "<script>start(" . $row[0] . ");</script>";
        ?>
    </body>

    </html>