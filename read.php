    <?php

    require_once("dbconfig.php");
    $con = mysqli_connect(host,username,password,database);
    $m= new dbconfig();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>read</title>
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
      <?php

      $vid=$_GET['viewid'];
      $ret= mysqli_query($con,"SELECT * FROM producttab Where id = '$vid'");

      $cnt=1;
      while ($row= mysqli_fetch_array($ret)) {
       
        ?>
        <tr>
          <th>Product Name</th>
          <td><?php  echo $row['pname'];?></td><br>
          <th>Description</th>
          <td><?php  echo $row['pdescription'];?></td>  <br>
          <th>Gender</th>
          <td><?php  echo $row['gender'];?></td><br>
          <th>status</th>
          <td><?php  echo $row['pstatus'];?></td><br>
          <th>Image</th>
       <!-- <td><?php  //echo $row['iname'];?></td><br>
        <th>Category</th>
        <td><?php  //echo $row['cname'];?></td><br>
        <th>Size</th>
        <td><?php  //echo $row['sname'];?></td><br>
        <th>Price</th>
        <td><?php  //echo $row['price'];?></td><br> -->
      </tr>
      
      <?php 
      $cnt=$cnt+1;
    }?>

    </tbody>
    </table>

    </body>
    </html>
    <tbody>
