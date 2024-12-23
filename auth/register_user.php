<?php
//Database connection

include "../db.php";

// Set response header
header('Content_Type: application/json');

//Retrieve form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$role = $_POST['role'] ?? '';
$password = $_POST['password'] ?? '';

// Input validation
if (empty($name) || empty($email) || empty($phone) || empty($role) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    // Prepare and execute the SQL query
    $sql = "INSERT INTO users (name, email, phone, role, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $role, $hashedPassword);
    $stmt->execute();

    // Success response
    echo json_encode(['success' => true, 'message' => 'User registered successfully.']);
} catch (Exception $e) {
    // Handle unique email constraint or other errors
    if ($conn->errno === 1062) { // Duplicate entry error
        echo json_encode(['success' => false, 'message' => 'Email already exists.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} finally {
    $stmt->close();
    $conn->close();
}
?>
