<?php
session_start();
$isUserLoggedIn = isset($_SESSION['email']) ? 'true' : 'false';

if (isset($_SESSION['email'])) {
    // Utilisateur connecté
    echo '
    <input id="username-input" type="text" placeholder="Enter your username...">
    <input id="chat-input" type="text" placeholder="Type your message here...">
    <button id="chat-send">Send</button>
    <button id="chat-logout" onclick="window.location.href=\'logout.php\'">Logout</button>';
} else {
    // Utilisateur non connecté
    echo '
    <input id="username-input" type="text" placeholder="Enter your username..." disabled>
    <input id="chat-input" type="text" placeholder="Type your message here..." disabled>
    <button id="chat-send" disabled>Send</button>
    <button id="chat-login" onclick="window.location.href=\'login.html\'">Login</button>';
}
?>
