<?php
session_start();
// Destruir la sesión y redirigir al login
session_unset();
session_destroy();
<<<<<<< HEAD
header("Location: login.php");
=======
header("Location: ../login/auth/login.html");
>>>>>>> 2a4f5ef9c9ec57eef4cb7b6cc7a723b5e34c80e7
exit();
