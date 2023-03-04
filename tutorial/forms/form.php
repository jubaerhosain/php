<html>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Welcome " . $_POST["name"] . "<br>";
        echo "Your email address is: " . $_POST['email'];
    }
    ?>
</body>

</html>