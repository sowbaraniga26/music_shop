<?php

//Database connection
include "../db.php";

header('Content-Type: application/json');

//Retrieve email and pasword from POST request
$email = $_POST['email'] ??'';
$password =$_POST['password'] ?? '';

// prepare the SQL query to find the user
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result ();

// Check if the user exists

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // var_dump($user['password']);

    // Verify the password

    if (password_verify($password, $user['password'])) {
        echo json_encode(['success' => true, 'message' => 'Login successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid password!']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not found!']);
}
$stmt->close();
$conn->close();
?>

