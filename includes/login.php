<?php
error_reporting(0);
session_start();

// session login logic
if (!empty($_SESSION["user"])) {
    header("location: dashboard.php");
}

include("includes/captcha.php");


// input fields 
$username = input_field($_POST["username"]);
$password = input_field($_POST["password"]);

// error variables 
$usernameErr = $passwordErr  = "";

// validation
if (isset($_POST["sub"])) {

    // username validation 
    if (empty($username)) {
        $usernameErr = "Please Enter Username.";
    } else if (!preg_match("/^[a-z_]+$/", $username)) {
        $usernameErr = "Invalid Username.";
    }

    // password validation 
    if (empty($password)) {
        $passwordErr = "Please Enter Password.";
    } else if (!preg_match("/^[a-zA-Z0-9]{3,16}+$/", $password)) {
        $passwordErr = "Length of password should be between 4, 16 characters.";
    }

    // login logic 
    if ($usernameErr === "" && $passwordErr  === "") {
        if ($username === "test_user" && $password === "123456") {
            $_SESSION["user"] = $username;
            setcookie("username", $username, time() + 3600 * 24);
            setcookie("password", $password, time() + 3600 * 24);
            header("location: index.php");
            exit();
        } else if ($username === "test_user" && $password !== "123456") {
            $passwordErr = "Incorrect Password.";
        } else if ($username !== "text_user" && $password === "123456") {
            $usernameErr = "Invalid User.";
        }
    }
}

?>
<div class="container content">
    <div class="row">
        <div class="col-md m-auto login-logo">
            <div class="container text-center">
                <img src="https://uilogos.co/img/logotype/hexa.png" class="wel-logo logo img-fluid" alt="">
                <p class="lead">Some Slogan Comes Here.</p>
            </div>
        </div>
        <div class="col-md">
            <form class="form-si p-4 bg-white border rounded shadow" method="POST">
                <div class="text-center">
                    <img src="https://uilogos.co/img/logomark/hexa.png" class="mb-4" alt="" width="60px" height="">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" onchange="cook();" placeholder="Enter username" value="<?php echo $_GET["uid"]; ?>">
                    <small id="err" class="form-text text-danger"><?php echo $usernameErr; ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    <small id="err" class="form-text text-danger"><?php echo $passwordErr; ?></small>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" id="check" name="remember" value="checked"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-warning btn-block" name="sub">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    const cook = () => {
        if (document.getElementById("username").value === "<?php echo $_COOKIE["username"]; ?>") {
            document.getElementById("password").value = "<?php echo $_COOKIE["password"]; ?>";
        } else {
            document.getElementById("password").value = "";
        }
    }
</script>