<?php
$host = "localhost"; 
$user = "root"; 
$password = "pass\$word"; 
$dbname = "atudform"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);


if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} 


switch ($method) {
    case 'GET':
      $id = $_GET['id'];
      $sql = "select * from contacts".($id?" where id=$id":''); 
      break;
    case 'POST':
      $location = $_POST["location"];
      $business_name = $_POST["business_name"];
      $number_branches = $_POST["number_branches"];
      $business_address = $_POST["business_address"];
      $mobile_number = $_POST["mobile_number"];
      $business_email = $_POST["business_email"];

      $sql = "insert into paratinda (location, business_name, number_branches, business_address, mobile_number, business_email) values ('$location', '$business_name', '$number_branches', '$business_address', '$mobile_number', '$business_email' )"; 
      break;
}

// run SQL statement
$result = mysqli_query($con,$sql);

// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } elseif ($method == 'POST') {
    echo json_encode($result);
  } else {
    echo mysqli_affected_rows($con);
  }

$con->close();