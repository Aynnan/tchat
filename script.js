// Array of names for the leaderboard
var names = ["anonyme"];

// Randomize the order of the names
names.sort(function() { return 0.1 - Math.random() });

// Insert the names into the leaderboard
var leaderboardList = document.getElementById("leaderboard-list");
for (var i = 0; i < names.length; i++) {
    var li = document.createElement("li");
    li.textContent = names[i];
    leaderboardList.appendChild(li);
}

var chatMessagesContainer = document.getElementById("chat-messages-container");

// Handle chat messages
var chatInput = document.getElementById("chat-input");
var chatSend = document.getElementById("chat-send");
var usernameInput = document.getElementById("username-input");
var chatLogin = document.getElementById("chat-login");

// Fonction pour mettre à jour le formulaire du chat
function updateChatForm() {
    var chatInput = document.getElementById("chat-input");
    var chatSend = document.getElementById("chat-send");
    var usernameInput = document.getElementById("username-input");
    var chatLogin = document.getElementById("chat-login");

    if (isUserLoggedIn) {
        // Utilisateur connecté
        chatInput.disabled = false;
        chatSend.disabled = false;
        usernameInput.disabled = false;
        chatLogin.disabled = true;
    } else {
        // Utilisateur non connecté
        chatInput.disabled = true;
        chatSend.disabled = true;
        usernameInput.disabled = true;
        chatLogin.disabled = false;
    }
}

updateChatForm(); // Appel de la fonction pour mettre à jour le formulaire du chat

chatSend.addEventListener("click", function() {
    var username = usernameInput.value;
    var message = chatInput.value;
    chatInput.value = "";

    fetch("send_message.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "username=" + encodeURIComponent(username) + "&message=" + encodeURIComponent(message)
    });
});

// Fetch and display chat messages every 5 seconds
setInterval(function() {
    fetch("chat.php")
        .then(response => response.text())
        .then(messages => {
            var chatMessages = document.getElementById("chat-messages");
            chatMessages.innerHTML = messages;

            // Scroll to the bottom
            var chatMessagesContainers = document.getElementById("chat-messages-container");
            chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
        });
}, 5000);
