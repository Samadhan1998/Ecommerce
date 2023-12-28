<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.png">
    <title>AttireAvenue - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Firebase CDN -->
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-database.js"></script>

</head>

<body>
    <!-- Header -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.html" class="logo">
                            <img src="assets/images/white-logo.png">
                        </a>

                         <ul class="nav">
                            <li class="scroll-to-section"><a href="registration.php">SignUp</a></li>
                            <li class="scroll-to-section"><a href="login.php" class="active">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="container1 forms">
            <div class="form login">
                <div class="form-content">
                    <div class="alert alert-success" role="alert" style="display: none;">
                        Login Sucessfully!!
                    </div>
                    <header>Login Here</header>
                    <form action="" id="logForm" method="POST">
                        <div class="field input-field">
                            <input type="email" id="email" name="email" placeholder="Email" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" id="password" name="password" placeholder="Password" class="password">
                        </div>

                        <div class="form-link">
                            <a href="registration.html" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field button-field">
                            <input type="submit" id="signin" class="button" value="submit">
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="registration.php" class="link signup-link">Signup</a></span>
                    </div>
                </div>
            </div>
            
        </section>

<?php

// $servername = "sql111.infinityfree.com";
// $username = "if0_35479957";
// $password = "lkHkwZl8xNU";
// $dbname = "if0_35479957_attireavenue";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attireavenue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo '<script>alert(Login sucessfully!!);</script>';
            session_start();
            $_SESSION['logged']=true;
            header('Location: home.html');
            exit();
        } else {
            echo '<script>
            const alert = document.querySelector(".alert");
            alert.innerHTML="Incorrect Email/Password! Please try again.";
            alert.style.backgroundColor = "red";
            alert.style.display = "block";
                    setTimeout(()=>{
                        alert.style.display = "none";
                    }, 3000);
            </script>';
        }
    } else {
        echo '<script>
            const alert = document.querySelector(".alert");
            alert.innerHTML="User not found";
            alert.style.backgroundColor = "red";
            alert.style.display = "block";
                    setTimeout(()=>{
                        alert.style.display = "none";
                    }, 3000);
            </script>';
    }
}

$conn->close();
?>
 </body>
</html>