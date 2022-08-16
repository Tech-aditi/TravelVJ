<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/signup.css" />
    <title>TravelVJ</title>
  </head>




  <body>

  <?php
  
   $server ="127.0.0.1:3306";
    $username ="u955232666_travelvj";
    $password ="0536282554aB$";
    $database ="u955232666_TravelVJ";

    $conn = mysqli_connect($server,$username,$password,$database);
    
  if($conn) {
      echo "success";
     
    
      
  } 
  else {
       die("Error". mysqli_connect_error()); 
    
  }   



    $showAlert = false; 
    $showError = false; 
    $exists=false;
        
    if($_SERVER["REQUEST_METHOD"] == "POST") {
          
        // Include file which makes the
        // Database Connection.
       
        
        $username = $_POST["username"]; 
        $email = $_POST["email"]; 
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
                
        
        $sql = "Select * from signup where username='$username'";
        
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result); 
        
        // This sql query is use to check if
        // the username is already present 
        // or not in our Database
        echo $num;
        if($num == 0) {
            if(($password == $cpassword) && $exists==false) {
        
                $hash = password_hash($password, 
                                    PASSWORD_DEFAULT);
                    
                // Password Hashing is used here. 
                $sql = "INSERT INTO `signup` ( `username`, 
                     `password`,`cpassword`) VALUES ('$username', 
                    '$hash', current_timestamp())";
        
                $result = mysqli_query($conn, $sql);
              echo $result;
                if ($result) {
                    $showAlert = true; 
                }
                else{
                 
                }
            } 
            else { 
                $showError = "Passwords do not match"; 
            }      
        }// end if 
      
        
    }//end if   
        
    ?>

    
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" " />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            
            <input type="submit"  id="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="#" class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username"  id="username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" id="email" name="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password"  id="password" name="password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="CPassword"  id="cpassword" name="cpassword" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    

    <script src="js/signup.js"></script>
  </body>
</html>