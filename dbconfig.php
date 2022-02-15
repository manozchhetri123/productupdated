  <?php 
  define('host','localhost');
  define('username','root');
  define('password' ,'admin');
  define('database', 'productmanagementdb');

  class dbconfig{
  	
    public $dbh; 
    public function __construct(){
      $con = mysqli_connect(host,username,password,database); 
      $this->dbh = $con;

      if (mysqli_connect_errno())
      {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
     
   }
 }