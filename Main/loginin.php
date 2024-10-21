<?php
session_start();
include("connect.php");

// Function to authenticate user and get ID
function authenticateUser($username, $password, $conn) {

    if($username=="Admin" && $password=="Admin123")
    {
        return   [
            'role' => 'Admin',
            'id' => 0
        ];
    }
    // Check if username exists in patient table
    $sql = "SELECT * FROM patient WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            return array("role" => "patient", "id" => $row['ID']);
        }
    }

    // Check if username exists in doctor table
    $sql = "SELECT * FROM doctor WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            return array("role" => "doctor", "id" => $row['ID']);
        }
    }

    // If username doesn't exist in either table or password is incorrect
    return array("role" => "invalid", "id" => null);
}

// Main code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user_info = authenticateUser($username, $password, $conn);

    $role = $user_info["role"];
    $id = $user_info["id"];

    if($role=="doctor" || "patient" || "Admin")
        {
        $expire = time() + 3600;
        setcookie("cookie", "LifeLine", $expire, "/");
        setcookie("user_ID", $id, $expire, "/");
        setcookie("user_name", $username, $expire, "/");
        }

    if ($role == "patient") {
        setcookie("user_role", $role, $expire, "/");

        header("Location: Patient/index.php?id=$id");
        exit;
    } elseif ($role == "doctor") {
        setcookie("user_role", $role, $expire, "/");
        header("Location: Doctor/index.php?id=$id");
        exit;

    } elseif ($role == "Admin") {
        setcookie("user_role", $role, $expire, "/");
        header("Location: Admin/index.php");
        exit;
    } elseif ($role == "invalid") {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeLine - Login </title>
  <link rel="stylesheet" href="login.css">
  <link rel="icon" href="transperent.png">
</head>

<body>

<div class="wrapper">
    <img src="transperent.png" alt="Logo" class="logol">
    <h2>Log In</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <?php
    if(isset($_COOKIE['cookie'])) 
    {
        $exp = time() - 3600;
        setcookie("cookie", "LifeLine", $exp, "/");
    }

     ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btt" name="signIn">Sign In</button>
    
    </form>    
    
    <?php
    // Display error message if exists
    if (isset($error_message)) {
        echo '<div class="error">' . $error_message . '</div>';
    }
    ?>

    <div class="member">
        Don't have an account? <a href="Sign Up.php">Register</a>
    </div>
</div>

</body>
</html>