<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');   // agar already login hai to home pe bhej do
} else {
    header('Location: login.php');   // nahi to login pe bhej do
}
exit();
?>