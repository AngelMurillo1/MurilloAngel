<?php
$user1 = $_POST["user"];
$user2 = $_POST["password"];
$user3 = isset($_POST["check"]);

if ($user3===true) {
    echo $user1, " ", $user2;
}
else{
    echo "El usuario no acepto los Terminos y Condiciones";
}

?>