<?php
require_once('product.php');
$pobj = new product();
session_start();



?>

<html> 

<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCT</title>
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

	<form action = "addproduct.php" method = "POST">

    <p><h3>ADD MORE PRODUCT</h3></p>  
    <div> Product Name: <input type = "text" name = "pname" value="" required="" /></div> <br>  
    <div> Description: <br><textarea for="pdescription" type="text" value="" name="pdescription" required=""> </textarea> </div><br> 
    <div> Gender: <br>
      <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
    </div><br>
    <div> Status:  <br>
      <input type="radio" id="active" name="pstatus" value="active">
        <label for="active">Active</label><br>
        <input type="radio" id="inactive" name="pstatus" value="inactive">
        <label for="inactive">Inactive</label> 
    </div><br>

    <div action="" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="iname" id="pimage">
      <div><img src="..." id="imgPlaceholder" alt=""></div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
   <select name="sname" id="psize">
    <option value="small">Small</option>
    <option value="medium">Medium</option>
    <option value="large">Large</option>
    <option value="elarge">Extra Large</option>
  </select>
</div><br>
<div> Price: <input type = "text" name = "price" value="" /></div> <br>  
<input type ="submit" value="add" name="add" /> 
<a href="displayproduct.php" class="btn btn-primary btn-lg">
 <span class="glyphicon glyphicon-user" ></span> Back
</a> 

</form> 

</body>
</html>





<?php
if(isset($_POST['add']))

{
  $pname= $_POST['pname'];
  $pdescription= $_POST['pdescription'];
  $gender= ($_POST['gender']);
  $pstatus= ($_POST['pstatus']);
  $sname= ($_POST['sname']);
  $price= ($_POST['price']);
  $cname= ($_POST['cname']);
  if ($iname= ($_POST['iname'])){
    $image=$_FILES['file']['name']; 
      $imageArr=explode('.',$image); 
      $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
      $uploadPath="C:/Apache24/htdocs/uploads/image1/".$newImageName;
      $isUploaded=move_uploaded_file($_FILES["file"]["tmp_name"],$uploadPath);
  }

  $product = $pobj->getLatestProduct();
  $productId = $product['id'];
  $result= $pobj->addProduct($pname,$pdescription,$gender,$pstatus,$sname,$price,$cname,$iname,$productId);
  if ($result== true) {
    echo "<script>alert('Product created');</script>"; 
  echo "<script>window.location.href = 'displayproduct.php'</script>";
  }


}

?>