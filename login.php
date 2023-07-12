<?php
session_start();
if (isset($_SESSION["unique_id"])) {
    header("Location: http://localhost/Projects/Chat-app/users.php");

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
            <form action="#" enctype="multipart/form-data">
                <div class="input Email">
                    <label>Email Address</label>
                    <input name="email" type="text">
                </div>
                <div class="input password">
                    <label>Password</label>
                    <input name="password" type="password">
                    <button>Toggle</button>
                </div>
                <div class="button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up?<a href="index.php">Signup now</a></div>
        </div>
    </section>

    <script src="js/js.js"></script>
    <script src="js/login.js"></script>
</body>
</html>