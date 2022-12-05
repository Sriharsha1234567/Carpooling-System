<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>

<nav id = "userNav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="userHome.html">Maryville Car Pool</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../userHome.html">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../bookRide.html">Book Your Ride</a>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="../previousRides.html" >Ride History</a>
              </li>
              <li class="nav-item" id="postARide">
               <a class="nav-link" href="../postRideUser.html">Post A Ride</a>
             </li>
              <li class="nav-item"> 
                <a class="nav-link " href="../aboutUs.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="../contactUS.html">Contact Us</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link " href="login.php">Chat<span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <a href="../index.html"><span class="navbar-text">Signout</span> </a>
          </div>
  </nav>

  <nav id="adminNav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="adminHome.html">Car Pooling System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../adminHome.html">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../postRide.html">Post A Ride</a>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="../adminPreviousRides.html" >Ride History</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link " href="../dashboard.html">Dashboard</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link " href="login.php">Chat<span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <a href="../index.html"><span class="navbar-text">Signout</span> </a>
          </div>
    </nav>

  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM userlogin WHERE email = '{$user_id}'");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/chat.png" alt="">
        <div class="details">
          <span><?php echo $row['name'];?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <script>
    document.getElementById('userNav').style.visibility = 'hidden';
    document.getElementById('adminNav').style.visibility = 'hidden';
    document.getElementById('postARide').hide();   
          
    var isDriver = window.sessionStorage.getItem('isDriver');
    console.log("Is Driver",isDriver);
    if(isDriver === "true") {
      document.getElementById('postARide').style.visibility =  'visible';
    }

    var userLoggedIn = window.sessionStorage.getItem('userID');
    var adminLoggedIn = window.sessionStorage.getItem('adminID');
    if(adminLoggedIn === null && userLoggedIn === null) {
      window.location.href = "../index.html";
    } 

    if(adminLoggedIn === null && userLoggedIn !== null){
    document.getElementById('userNav').style.visibility = 'visible';
    }
    
    if(adminLoggedIn !== null && userLoggedIn === null){
    document.getElementById('adminNav').style.visibility = 'visible';
    }
  </script>
</body>
</html>
