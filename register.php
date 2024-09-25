<?php
require_once "Database/connection.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $address = $_POST["address"];
    $contact_no = $_POST["contact_no"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password

    // Check if email or username already exists
    $query = "SELECT * FROM registration WHERE email = :email OR username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // If user already exists
        if ($user['email'] == $email) {
            $errorMessage = "Email is already registered.";
        } elseif ($user['username'] == $username) {
            $errorMessage = "Username is already taken.";
        }
    } else {
        // Insert data into the database if email and username are not taken
        $sql = "INSERT INTO registration (full_name, username, address, contact_no, email, password) 
                VALUES (:full_name, :username, :address, :contact_no, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":full_name", $name);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":contact_no", $contact_no);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        if ($stmt->execute()) {
            header("Location: loginform.php"); // Redirect to login page on success
            exit();
        } else {
            $errorMessage = "Error: " . $stmt->errorInfo()[2]; // Capture execution error
        }
    }

    // Close the statement
    $stmt->closeCursor();
}

// Close the database connection
$conn = null;

// Include the registration form with error message if any
include 'registrationform.php'; 
?>
