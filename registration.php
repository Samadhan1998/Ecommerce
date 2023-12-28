<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/white-logo.png">
    <title>AttireAvenue-Signup</title>
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
                          <!--  <li class="scroll-to-section"><a target="_blank" href="home.html">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Men's</a></li>
                                <li class="scroll-to-section"><a href="#women">Women's</a></li>
                            <li class="scroll-to-section"><a target="_blank" href="about.html">About Us</a></li>
                            <li class="scroll-to-section"><a target="_blank" href="contact.html">Contact Us</a></li>-->
                            <li class="scroll-to-section"><a href="registration.php" class="active">SignUp</a></li>
                            <li class="scroll-to-section"><a href="login.php">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <section class="container1 forms">
        <div class="form signup">
            <div class="form-content">
                <header>Register Here</header>
                <div class="alert alert-success" role="alert" style="display: none;">
                    Registered Sucessfully!!
                </div>
                <form action="" id="regForm" method="POST">
                    <div class="field input-field">
                        <input type="text" id="username" name="username" placeholder="UserName" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="email" id="email" name="email" placeholder="Email" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="password" id="password" name="password" placeholder="Create password" class="password">
                    </div>

                    <div class="field input-field">
                        <input type="number" id="phone" name="phone" placeholder="Phone Number" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="text" id="gender" name="gender" placeholder="Gender" class="input">
                    </div>

                    <div class="field button-field">
                        <!-- <button type="submit">Submit</button> -->
                        <input type="submit" id="signup" class="button" value="submit">
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>


    <?php
    // Connection parameters for the MySQL database
    // $servername = "sql111.infinityfree.com";
    // $username = "if0_35479957";
    // $password = "lkHkwZl8xNU";
    // $dbname = "if0_35479957_attireavenue";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attireavenue";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $check_email_sql = "SELECT * FROM userdata WHERE email='$email'";
    $result = $conn->query($check_email_sql);

    if ($result->num_rows > 0) {
        echo '<script>
            const alert = document.querySelector(".alert");
            alert.innerHTML = "Email is already register";
                    alert.style.backgroundColor = "red";
                    alert.style.display = "block";
                    setTimeout(()=>{
                        alert.style.display = "none";
                    }, 3000);
        
            </script>';
    }else{
    
        // SQL query to insert user data into the database
        $sql = "INSERT INTO userdata (username, email, password, phone, gender) VALUES ('$username', '$email', '$password', '$phone', '$gender')";
    
        if ($conn->query($sql) === TRUE) {
            echo '<script>
            const alert = document.querySelector(".alert");
            alert.style.display = "block";
                    setTimeout(()=>{
                        alert.style.display = "none";
                    }, 3000);
            </script>';
        } else {
            echo '<script>
            const alert = document.querySelector(".alert");
            alert.innerHTML = "Error: " . $sql . "<br>" . $conn->error
                    alert.style.backgroundColor = "red";
                    alert.style.display = "block";
                    setTimeout(()=>{
                        alert.style.display = "none";
                    }, 3000);

        
            </script>';
        }
    }
}
    
    // Close the database connection
    $conn->close();
    ?>
    

    <!-- <script type="module">
        import {initializeApp} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
        import {getDatabase, set, ref, update} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-database.js";
        import {getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-auth.js";
    
        const signup = document.getElementById("signup");
        const form = document.getElementById("regForm");
        const alert = document.querySelector(".alert");
    
        const firebaseConfig = {
            apiKey: "AIzaSyBVz42n1vsbHP_ljJWuJsy49Mvg_ScObOM",
            authDomain: "ecommerceapp-76cf4.firebaseapp.com",
            databaseURL: "https://ecommerceapp-76cf4-default-rtdb.firebaseio.com",
            projectId: "ecommerceapp-76cf4",
            storageBucket: "ecommerceapp-76cf4.appspot.com",
            messagingSenderId: "79109426351",
            appId: "1:79109426351:web:169e482781e189319cd85a",
            measurementId: "G-GJL46J9QRX"
        };
    
        // Initialize Firebase
        const app =initializeApp(firebaseConfig);
        const database = getDatabase(app);
        const auth = getAuth();
    
        signup.addEventListener("click", (e) => {
            e.preventDefault();
    
            var username = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var phone = document.getElementById("phone").value;
            var gender = document.getElementById("gender").value;
            
            createUserWithEmailAndPassword(auth,email,password)
            .then((userCredential) =>{
                const user = userCredential.user;
                set(ref(database, 'users/' + user.uid),{
                    username: username,
                    email: email,
                    password: password,
                    phone: phone,
                    gender: gender
                })
                alert.style.display = "block";
                setTimeout(()=>{
                    alert.style.display = "none";
                }, 3000);
                form.reset();
            })
            .catch((error)=>{
                const errorCode = error.code;
                const errorMessage = error.message;
                // alert(errorMessage);
                alert.innerHTML = errorMessage;
                alert.style.backgroundColor = "red";
                alert.style.display = "block";
                setTimeout(()=>{
                    alert.style.display = "none";
                }, 3000);
    
            });
        });
    
        </script> -->

</body>

</html>