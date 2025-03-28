<?php

// https://www.simplilearn.com/tutorials/php-tutorial/php-using-xampp
//https://power-plugins.com/developer-guides/install-and-configure-xampp-on-a-mac/
//https://www.cloudways.com/blog/connect-mysql-with-php/#MySQL-on-Localhost
//https://www.cloudways.com/blog/custom-php-mysql-contact-form/


$conn = new mysqli("localhost", "root", "", "carWebsite");
if ($conn->connect_error) die("Connection failed reason: " . $conn->connect_error);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO customerInformation (firstName, secondName, emailAddress, mobileNumber) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $_POST['firstName'], $_POST['secondName'], $_POST['emailAddress'], $_POST['mobileNumber']);
    
    if ($stmt->execute()) {
        echo "<script>alert('Thanks for submitting your contact details \\n We will contact you soon'); window.location.href = 'main.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
