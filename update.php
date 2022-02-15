      <?php 
      session_start();
      require_once('product.php');
      $con = mysqli_connect(host,username,password,database);
      $db= new product();

      if(isset($_POST['update']))
      {
        $eid = $_GET['editid'];
        $pname = $_POST['pname'];
        $pdescription = $_POST['pdescription'];
        $gender = $_POST['gender'];
        $pstatus = $_POST['pstatus'];
        $ret= $db->updateProduct($pname,$pdescription,$gender,$pstatus);
      }

      ?>

      <!DOCTYPE html>
      <html>
      <head>
       <title>UPDATE</title>
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
       <form action = "update.php>" method = "POST">
        
        <?php
        $eid=$_GET['editid'];
        $ret= mysqli_query($con,"SELECT * from producttab where id='$eid'");
        while ($row=mysqli_fetch_array($ret)) {
          ?>

          <p><h3>UPDATE</h3></p>  
          
          <div> Product Name: <input type = "text" name = "pname" value="<?php echo $row['pname'];?>" /></div> <br>  
          <div> Description: <br><textarea for="pdescription" type="text" name="pdescription" value="<?php echo $row['pdescription'];?>"> </textarea> </div><br> 
          <div> Gender: <br>
            <input type="radio" id="male" name="gender" value="<?php echo $row['gender'];?>">
              <label for="male">Male</label><br>
              <input type="radio" id="female" name="gender" value="<?php echo $row['gender'];?>">
              <label for="female">Female</label>
          </div><br>
          <div> Status:  <br>
            <input type="radio" id="active" name="sts" value="<?php echo $row['pstatus'];?>">
              <label for="active">Active</label><br>
              <input type="radio" id="inactive" name="sts" value="<?php echo $row['pstatus'];?>">
              <label for="inactive">Inactive</label> 
          </div><br>
          <div action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="pimage" id="pimage">
          </div><br>  
          <div> Category:  <br> 
           <select name="cname" id="cname">
             <option value="male">Male</option>
             <option value="female">Female</option>
             <option value="small">Small</option>
             <option value="medium">Medium</option>
             <option value="large">Large</option>
             <option value="elarge">Extra Large</option>
           </select>
         </div><br>
         <div> Size:  <br> 
           <select name="psize" id="psize">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
            <option value="elarge">Extra Large</option>
          </select>
        </div><br>         
        <input type = "submit" value="UPDATE" name="update" /> 
        <a href="displayproduct.php" class="btn btn-primary btn-lg">
         <span class="glyphicon glyphicon-user" ></span> Back
       </a>  
      <?php } ?>

      </form> 

      </body>
      </html>
