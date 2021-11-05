<?php
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$tel = $_POST['tel'];
$courses = $_POST['courses'];
  if(!empty($name) || !empty($email) || !empty($age) || !empty($tel) || !empty($courses)){
    $servername = 'localhost';
    $dBUsername = 'root';
    $dBPassword = 'nalika*1';
    $dBName = 'techKidz';
    $conn =mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
  }
  else {
    header("location: ../techKidz/enroll-page/index.html.html?erroremptyfieldsusername.".$name."&email".$email."&age".$."&tel".$tel."&courses".$courses;
  echo"Please fill the empty fields";
    exit();
  }
    if(!$conn){
    die("connection failed".mysqli_connect_error());
    }
    else {
        $sql = "INSERT INTO users (name,email,age,tel,courses) values ('[$name]','[$email]','[$age]','[$tel]','[$courses]')";
        if($conn->query($sql)=== TRUE){
      //echo"<script>alert("Insert was succsessfuly recorded")</script>;"
          header("location: ../techKidz/index.html?succsessfulyrecorded");
          exit();
        }
        else{
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if (!filter_var($email , FILTER_VALIDATE_EMAIL)&& !preg_match("/^(a-ZA-ZO-Z9)*$/", $name)) {
          header("location: ../techKidz/enroll-page/index.html?errorinvalidemailusername.");
          exit();
        }
        else if (!filter_var($email , FILTER_VALIDATE_EMAIL)){
            header("location: ../techKidz/enroll-page/index.html?errorinvalidemailusername.");
            exit();
        }
        else if(!preg_match("/^(a-ZA-ZO-Z9)*$/", $name)) {
          header("location: ../techKidz/enroll-page/index.html?errorinvalidemailusername.");
          exit();
        }
        else {
          $sql="SELECT username FROM users WHERE username=?";
          $stmt= mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../firstphp/signup.html?=errorsqlerror");
            exit();
          }
        }
        $conn->close();
}
 ?>
