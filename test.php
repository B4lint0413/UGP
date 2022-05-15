<!DOCTYPE html>
<html>

<head>
    <title>How to put PHP in HTML- Date Example</title>
</head>

<body>
    <div>This is pure HTML message.</div>
    <div>Next, we ll display today s date and day by PHP!</div>
    <script>
        alert("wtf");
    </script>
    <?php
    echo 'Today s date is <b>' . date('Y/m/d') . '</b> and it’s a <b>' . date('l') . '</b> today!';
    ?>
    <script>
        alert("wtf");
    </script>
    <div>Again, this is static HTML content.</div>
</body>

</html>