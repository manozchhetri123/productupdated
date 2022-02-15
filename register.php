    <?php
    session_start();
    require_once("function.php");
    $r = new user();
    if(isset($_POST['signin']))
    {
      $uname= $_POST['uname'];
      $email= $_POST['email'];
      $password= ($_POST['password']);


      $result= $r->registration($uname,$email,$password);
      if ($result>0) {
        header("Location:login.php");
      }
      else{
        echo "<script>alert('Email has been already taken');</script>"; 
      }      
    }

    ?>


    <!DOCTYPE html>
    <html>
    <head>
    	<title>Register Here</title>
      <style>    
        body {
          font-family: Arial, Helvetica, sans-serif;
        }
        h3 {
          font-family: "Times New Roman", Times, serif;
        }
      </style>
    </head>
    <body>
    	<form action = "register.php" method = "POST">

        <p><h3>REGISTER YOUR DETAILS</h3></p>     
        Username: <input type = "uname" name = "uname" required="" /> <br> 
        Email: <input type = "email" name = "email" required="" /> <br>    
        Password: <input type = "password" name = "password" required="" /> <br>  
        <input type = "submit" value="Register" name="signin" />  
      </form> 

      <a href="login.php" class="btn btn-primary btn-lg">
       <span class="glyphicon glyphicon-user" ></span> Login Here
     </a><br>
     
     <a href="login.php" class="btn btn-primary btn-lg">
       <span class="glyphicon glyphicon-user" ></span> Back
     </a>


    </body>
    </html>

