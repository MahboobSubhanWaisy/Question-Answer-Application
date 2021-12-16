<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT users.*, client_info.* FROM users JOIN client_info ON users.record_id = client_info.cl_id WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <?php
              if($row['photo'] != ''){
          ?>
              <img src="images/<?php echo $row['photo']; ?>" alt="company logo">
          <?php }else{ ?>
              <img src="images/user_default.jpg" alt="company logo">
          <?php } ?>
          <div class="details">
            <span><?php echo $row['fall_name'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="dashboard.php" class="logout">Back</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
