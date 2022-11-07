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
          <a class="navbar-brand" href="adminHome.html">Maryville Car Pool</a>
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
    <section class="users">
      <header>
        <div class="content">
          <?php 
            try {
            $sql = mysqli_query($conn, "SELECT * FROM userlogin WHERE email = '{$_SESSION['email']}'");
            } catch (mysqli_sql_exception $e) { 
              var_dump($e);
              exit; 
           } 
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/chat.png" alt="">
          <div class="details">
            <span><?php echo $row['name']; ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['email']; ?>" class="logout">Logout</a>
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
  <script>
    document.getElementById('userNav').style.visibility = 'hidden';
    document.getElementById('adminNav').style.visibility = 'hidden';
    document.getElementById('postARide').style.visibility =  'hidden';

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
