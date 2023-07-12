<?php
session_start();
if (isset($_SESSION["unique_id"])) {
    header("Location: ./users.php");
}
?>
<?php
include_once "header.php";
?>
<body>
    <section class="index">
        <div class="container">
            <div class="header">
                <p>Realtime Chat App</p>
            </div>
            <div class="error_text">
                <p>This is error massage</p>
            </div>
            <form  enctype="multipart/form-data">
                <div class="name">
                    <div class="input first">
                        <label>First Name</label>
                        <input name="fname"   placeholder="First name" type="text">
                    </div>
                    <div class="input Last">
                        <label>Last Name</label>
                        <input name="lname"   placeholder="Last name" type="text">
                    </div>
                </div>
                <div class="input Email">
                    <label>Email Address</label>
                    <input name="email"   placeholder="Enter your email" type="text">
                </div>
                <div class="input password">
                    <label>Password</label>
                    <input name="password"   placeholder="Password" type="password">
                    <button>Toggle</button>
                </div>
                <div class="file">
                    <label>Select Image</label>
                    <input name="file"  type="file">
                </div>
                <div class="button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Already signed up?<a href="login.php">Login now</a></div>
        </div>
    </section>

    <script src="js/js.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>