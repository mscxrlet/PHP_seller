<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function log_action($conn, $action) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $email = $_SESSION['email'];
        
        $stmt = $conn->prepare("INSERT INTO audit_logs (user_id, user_email, action) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $email, $action);
        $stmt->execute();
        $stmt->close();
    }
}
?>
