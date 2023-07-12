<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("Location: ./login.php");
}
include "header.php";
?>
<body>
    <section class="index">
     <div class="chat">
         <?php
         include "config.php";
         $id = mysqli_real_escape_string($conn, $_GET["id"]);
         $data = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = '$id'");
         if (mysqli_num_rows($data) > 0) {
             $row = mysqli_fetch_assoc($data);
         ?>
         <header>
             <div class="content">
                 <div class="img">
                     <a href="users.php"><img src="img/next.jpg" alt=""></a>
                 </div>
             <img src="php/uploads/<?php echo $row['img']?>" alt="">
             <div class="info">
                 <p class="first"><?php echo $row["fname"]." ". $row["lname"]?></p>
                 <p class="second"><?php echo $row["status"]?></p>
             </div>
            </div>
             <button style="display: none;">#</button>
         </header>
         <?php
         }
         ?>
         
         <div class="chat_box">

         </div>

         <div class="search chat_schr">
        <form action="#" autocomplete="off">
            <input   type="hidden">
            <input name="oid" value="<?php echo $_SESSION["unique_id"] ?>"  type="hidden">
            <input name="in" value="<?php echo $id ?>"  type="hidden">
            <input id="msg" name="msg" placeholder="Type Massege" type="text">
            <img id="img" src="img/check.png" alt="">
        </form>
        </div>

        </div>
    </section>
    <script src="js/chat.js"></script>
</body>
</html>