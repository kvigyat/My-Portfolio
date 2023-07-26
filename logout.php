<?php
// Start the session
session_start();

// Clear the session data
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page (index.html)
header('Location: index.html');
exit();
?>