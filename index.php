<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard and Chat</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="leaderboard">
        <h2>Leaderboard</h2>
        <ul id="leaderboard-list">
            <!-- Leaderboard names will be inserted here by script.js -->
        </ul>
    </div>

   <div id="chat">
        <h2>Chat</h2>
        <h3>Annonce : Celui qui essaye de baiser le site on lui nique sa mere je le jure</h3>
        <div id="chat-messages-container">
            <div id="chat-messages">

            </div>
        </div>
    </div>
    
    <div id="chat-form">
        <?php include 'chat_form.php'; ?>
    </div>

    <script src="script.js"></script>
    <script> var isUserLoggedIn = <?php echo $isUserLoggedIn; ?>;
</script>
</body>
</html>
