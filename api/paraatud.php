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
      $vehicle = $_POST["vehicle"];
      $license = $_POST["license"];
      $motorcycle_model = $_POST["motorcycle_model"];
      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];
      $mobile_number = $_POST["mobile_number"];
      $email_address = $_POST["email_address"];

      $sql = "insert into paraatud (location, vehicle, license, motorcycle_model, first_name, last_name, mobile_number, email_address) values ( '$location', '$vehicle', '$license', '$motorcycle_model', '$first_name', '$last_name', '$mobile_number', '$email_address')"; 
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