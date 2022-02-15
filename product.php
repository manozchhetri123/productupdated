<?php
include_once ("dbconfig.php");

class product extends dbconfig{
	function __construct() {
		parent::__construct();
	}

	public function addProduct($pname,$pdescription,$gender,$pstatus,$sname,$price,$cname,$iname){

		$query= "INSERT INTO producttab (pname, pdescription, gender, pstatus) VALUES ('$pname', '$pdescription', '$gender','$pstatus')"; 
		$result= mysqli_query($this->dbh,$query);
		$product=null;
		if($result == true){
			$product= product::getLatestProduct();
		}
		if ($product) {
			product::addSize($sname,$price,$product['id']);
			product::addCategory($cname,$product['id']);
			product::addImage($iname,$product['id']);
		} else {
			return false;		}
		

	}

	public function addSize($sname,$price,$id){ 
		$query = "INSERT INTO sizetab (sname, price,id) VALUES ('$sname', $price,(SELECT id FROM producttab WHERE id=$id))"; 

		$result= mysqli_query($this->dbh,$query);
		
		if($result == true){
			header("Location:displayproduct.php");
		}
		else{
			return false;
		}
	}

	public function addCategory($cname,$id){

		$query = "INSERT INTO categorytab (cname, id) VALUES ('$cname', (SELECT id FROM producttab WHERE id=$id))";

		$result= mysqli_query($this->dbh,$query); 
		if($result == true){
			header("Location:displayproduct.php");
		}
		else{
			return false;
		}
	}

	public function addImage($iname,$id){
		
		$query = "INSERT INTO imagetab (iname, id) VALUES ('$iname', (SELECT id FROM producttab WHERE id=$id))";

		$result= mysqli_query($this->dbh,$query); 
		
		if($result == true){
			header("Location:displayproduct.php");
		}
		else{
			return false; 
		}
	}

	public function getProductById($id){

		$result= mysqli_query($this->dbh,"SELECT * FROM producttab Where id = $id");
		return $result;
	}

	public function getLatestProduct(){

		$result= mysqli_query($this->dbh,"SELECT * From producttab Order By id Desc limit 1;");
		$result=mysqli_fetch_array($result);
		return $result;
	}

	public function fetchallproduct(){

		$result= mysqli_query($this->dbh,"SELECT * From producttab Order By id;");
		$result=mysqli_fetch_array($result);
		return $result;
	}


	public function updateProduct($pname,$pdescription,$gender,$pstatus){

		$result= mysqli_query($this->dbh, "UPDATE producttab SET pname='$pname',pdescription='$pdescription', gender='$gender', pstatus='$pstatus' Where id='$id'"); 
		return $result;	
	}	


	public function deleteProduct(){
		$result= mysqli_query($this->dbh, "DELETE FROM producttab Where id='$id'");
		return $result;	
	}

	public function fetchdatapi($pname,$pdescription,$gender,$pstatus,$sname,$price,$cname,$iname)
	{
		$query= "SELECT * from producttab";
		$result= mysqli_query($this->dbh,$query);
		$product= null;
		if ($result== true) 
		{
			$product = product::fetchallproduct();
		
		product::fetchdataps($sname,$price,$product['id']);
		product::fetchdatapc($cname,$product['id']);
		product::fetchdatapm($iname,$product['id']);
		return $result;
		}
	}

	public function fetchdatapc()
	{
		$result= mysqli_query($this->dbh,"SELECT * from categorytab");
		return $result;
	}

	public function fetchdatapm()
	{
		$result= mysqli_query($this->dbh,"SELECT * from imagetab");
		return $result;
	}

	public function fetchdataps()
	{
		$result= mysqli_query($this->dbh,"SELECT * from sizetab");
		return $result;
	}



}


?>
