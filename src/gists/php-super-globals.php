<HTML>
    <BODY>
        <form method="post" action="php-super-globals.php">
            Age: <input type="text" name="fage">
            <input type="submit">
        </form>
    </BODY>

<?php

// GLOBALS
function myfunction() {
  $GLOBALS["x"] = 100;
}

myfunction();

echo $GLOBALS["x"] . "\n";
echo $x . "\n";

# Servers
# You just can try with build-in server
# php -S localhost:8000  
# then open
# http://localhost:8000/src/gists/php-super-globals.php
echo $_SERVER['PHP_SELF'] . "<BR>";
echo $_SERVER['SERVER_NAME'] . "<BR>";
echo $_SERVER['HTTP_HOST'] . "<BR>";
echo $_SERVER['HTTP_REFERER'] . "<BR>";
echo $_SERVER['HTTP_USER_AGENT'] . "<BR>";
echo $_SERVER['SCRIPT_NAME'] . "<BR>";

echo "<BR><BR>";

# Requests
# $_REQUEST is an array containing data from $_GET, $_POST, and $_COOKIE.
# http://localhost:8000/src/gists/php-super-globals.php?name=John
echo $_REQUEST['name'] ?? "Name not provided" . "<BR>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = htmlspecialchars($_POST['fage']) ?? "N.A";
    echo "Age : $age <BR>" ;
}

