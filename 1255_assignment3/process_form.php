<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Define variables and initialize with empty values
$firstName = $lastName = $email = $address = $photo = "";
$firstNameErr = $lastNameErr = $emailErr = $addressErr = $photoErr = "";
$path = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z .]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    // Validate last name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = test_input($_POST["lastName"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    // Validate photo
    if ($_FILES["photo"]["error"] == 4) {
        $photoErr = "Photo is required";
    } else {
        $targetFile = "uploads/" . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check === false) {
            $photoErr = "File is not an image.";
        }
        // Check file size
        elseif ($_FILES["photo"]["size"] > 5000000) {
            $photoErr = "Sorry, your file is too large.";
        }
        // Allow only certain file formats
        elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $photoErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        // Upload file
        else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                $photo = $targetFile;
            } else {
                $photoErr = "Sorry, there was an error uploading your file.";
            }
        }
    }

    // If there are no errors, redirect to confirmation page
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($addressErr) && empty($photoErr)) {
        // no error found
    } else {
        echo $photoErr . "<br>";
        echo $targetFile . "<br>";
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        exit();
    }
}

// Helper function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Mysite</title>
    <style>
        #myDiv {
            width: 70%;
            margin: auto;
            display: flex;
        }

        #left,
        #right {
            display: inline-block;
            margin: 0px 5px;
            width: 50%;
            height: 150px;
        }

        #right img {
            width: 150px;
            height: 150px;
            margin: auto; 
            text-align: center;
            border-radius: 50%;
            box-sizing: border-box; 
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div id="myDiv">
        <div id="left">
            <p><strong> Name:</strong> <?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
        </div>
        <div id="right">
            <img src="<?php echo htmlspecialchars($targetFile); ?>" alt="Uploaded image">
        </div>
    </div>

</body>

</html>