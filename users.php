<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("Location: ./login.php");
}
?>
<?php
include "header.php";
?>
<body>
    <section class="index">
     <div class="container">
         <?php
         include "config.php";
         $data = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
         if (mysqli_num_rows($data) > 0) {
             $row = mysqli_fetch_assoc($data);
         ?>
         <header>
             <div class="content">
             <img src="php/uploads/<?php echo $row['img']?>" alt="">
             <div class="info">
                 <p class="first"><?php echo $row["fname"] ." ". $row["lname"] ?></p>
             </div>
            </div>
             <a href="php/logout.php?id=<?php echo $row["unique_id"]?>"><button>Logout</button></a>
         </header>
        <?php
         }
        ?>
         <div class="search shr">
             <p>Select on user to start chat</p>
             <input id = "srch" placeholder="Search users" type="text">
             <button>Search</button>
         </div>

         <div class="list">
        
        </div>
        </div>
    </section>

    <script src="js/users.js"></script>
    
</body>
</html>