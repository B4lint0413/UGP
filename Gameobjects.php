<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="query.js"></script>
    <title>Unity Guide Page</title>
</head>

<body>

    <script>
        if (question == 1) {
            if (document.getElementById("K2").value == "1" && document.getElementById("K3").value == "1" && document.getElementById("K4").value == "3") {
                alert("You answered well! Keep going!");
                window.location.href = "Create.php?run=true";
            } else {
                alert("Unfortunately you missed something! Try again!");
            }
        }
    </script>

    <div class="sidebar">
        <h3>Unity Guide Page</h3>
        <a href="Create.php" name="0">Create main things</a>
        <a href="Images.php" name="1">Import and use images</a>
        <a class="active" href="Gameobjects.php" name="2">GameObjects introduced</a>
    </div>

    <div class="content">
        <iframe src="https://www.youtube.com/embed/uCA8Q3nwaz4" width="420" height="315"></iframe>
        <!-- Documentation -->
        <div class="documentation">
            <h2>Documentation</h3>
                <p></p>
        </div>
        <!-- Query -->
        <div class="query">
            <h2>Knowledge checking query</h3>
                <div class="question">
                    <h3>With which component of a GameObject can you give it a visual part, like an image?</h3>
                    <select class="custom-select" id="K5">
                        <option value="1">ImageEditor</option>
                        <option value="2">SpriteRenderer</option>
                        <option value="3">GameObjectImage</option>
                    </select>
                    <h3>How do you write <i>Hello World!</i> in the console?</h3>
                    <p><input type="text" id="imp4">"Hello World!");</p>
                    <h3>How do you create a new GameObject named <i>MyGameObject</i> from code?</h3>
                    <p><input type="text" id="imp5"> = <input type="text" id="imp6">("MyGameObject");</p>
                    <button class="btn btn-secondary" onclick="check(2)">Check all</button>
                </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>