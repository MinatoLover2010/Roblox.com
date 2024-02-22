<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Your code to send data to Discord API
    // Example: Use cURL to send a message to a Discord webhook
    $webhookurl = "https://discord.com/api/webhooks/1202931496651067423/OH8ZMiwDYAkBEh8mxWECPzD1We2OysLg7baGJ5fKyWih30kAxywwe5buc_SukJFGST6X";
    $data = array("content" => "New submission from $username: $message");

    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);

    // Optionally, you can redirect the user after submission
    header("Location: index.html");
    exit();
}
?>