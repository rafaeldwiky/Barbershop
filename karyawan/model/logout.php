<?php
session_start();
if (isset($_SESSION['id_penggunaempl']) && $_SESSION['id_penggunaempl']) {
    unset($_SESSION['id_penggunaempl']);
    header("Location: ../../auth/auth-login.php");
} else {
    header("Location: ../../auth/auth-login.php");
}
exit();
?>