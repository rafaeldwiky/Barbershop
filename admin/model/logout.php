<?php
session_start();
if (isset($_SESSION['id_penggunaamdin']) && $_SESSION['id_penggunaamdin']) {
    unset($_SESSION['id_penggunaamdin']);
    header("Location: ../../auth/auth-login.php");
} else {
    header("Location: ../../auth/auth-login.php");
}
exit();
?>