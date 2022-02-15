    <?php
    session_start();
    require_once("function.php");
    $db = new user();

    if(isset($_POST['login']))
    {

      $email= $_POST['email'];
      $password=($_POST['password']);

      $result= $db->signin($email,$password);
      if($result>0)
        {            
            header("Location:displayproduct.php");
        }
        else
        {
            echo "<script>alert('Email or password do not match');</script>"; 
        }
    }

    ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>login</title>
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

      <form action = "" method = "POST">

        <p><h3>LOGIN FORM</h3></p>  
        Username: <input type = "email" name = "email" required="" /> <br>  
        Password: <input type = "password" name = "password" required="" /> <br>  
        <input type = "submit" name="login" />  
      </form> 

      <a href="register.php" class="btn btn-primary btn-lg">
       <span class="glyphicon glyphicon-user" ></span> Register Now
     </a>

    </body>
    </html>
