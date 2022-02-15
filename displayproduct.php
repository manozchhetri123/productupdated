  <?php
  require_once("product.php");
  $m= new product();
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>DASHBOARD</title>
  </head>
  <body>
  	<div>
      <a href="logout.php" class="btn btn-primary btn-lg">
       <span class="glyphicon glyphicon-user" ></span> LOGOUT
     </a><br><br>
     <a class="add_button" href="addproduct.php"><button>Add More Product</button></a></div>
     <p><h3> List of products </h3></p>
     <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>                       
          <th>Description</th>
          <th>Gender</th>
          <th>Status</th>
          <th>Image</th>
          <th>Category</th>
          <th>Size</th>
          <th>Price</th>                     
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php

        $re = $m->fetchdatapi($pname,$pdescription,$gender,$pstatus,$sname,$price,$cname,$iname);
        $cnt=1;

        if ($re->num_rows>0) {
        
        while($row=mysqli_fetch_array($re))
        {
          ?>   
          <tr>
            <td height="25"><?php echo $cnt;?></td>
            <td><?php echo $row['pname'];?></td>
            <td><?php echo $row['pdescription'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['pstatus'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['cname'];?></td>
            <td><?php echo $row['iname'];?></td>            
            
            <td>
              <a href="read.php?viewid=<?php echo htmlentities ($row['id']);?>" class="view" title="View" >View</a>
              <a href="update.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" >Edit</a>
              <a href="delete.php?deleteid=<?php echo htmlentities ($row['id']);?>" class="delete" title="delete" >Delete</a>
            </td>
          </tr>
          <?php $cnt=$cnt+1;} }?>


        </tbody>
      </table>

    </body>
    </html>








