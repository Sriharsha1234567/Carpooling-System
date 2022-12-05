<?php 
  session_start();
  if(isset($_SESSION['email'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>

<nav id = "userNav" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="userHome.html">Car Pooling System</a>
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
          <a class="navbar-brand" href="adminHome.html"> Car Pooling System</a>
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
    <section class="form login">
      <header>Welcome to Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" id="emailwithChat" value="" placeholder="Enter your email" readonly required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" id="password" value = "" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
    </section>
  </div>
  
  <script>
    console.log("We are inside the script");
    document.getElementById('userNav').style.visibility = 'hidden';
    document.getElementById('adminNav').style.visibility = 'hidden';

    document.getElementById('postARide').style.visibility =  'hidden';          
    var isDriver = window.sessionStorage.getItem('isDriver');
    console.log("Is Driver",isDriver);
    if(isDriver !== null && isDriver === "true") {
      document.getElementById('postARide').style.visibility =  'visible';
    }

    var userLoggedIn = window.sessionStorage.getItem('userID');
    var adminLoggedIn = window.sessionStorage.getItem('adminID');
    if(adminLoggedIn === null && userLoggedIn === null) {
      window.location.href = "../index.html";
    } 

    if(adminLoggedIn === null && userLoggedIn !== null){
    console.log("Inside the user Flow");
    document.getElementById("emailwithChat").value = userLoggedIn;
    document.getElementById('userNav').style.visibility = 'visible';
    }
    
    if(adminLoggedIn !== null && userLoggedIn === null){
    console.log("Inside the admin Flow");
    if (adminLoggedIn === "carpoolingteam") {
    document.getElementById("emailwithChat").value = adminLoggedIn;
    document.getElementById("password").value = "bearcat";
    document.getElementById('adminNav').style.visibility = 'visible';
    } else {
    document.getElementById("emailwithChat").value = adminLoggedIn;
    document.getElementById('adminNav').style.visibility = 'visible';
    }
    }

  </script>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
