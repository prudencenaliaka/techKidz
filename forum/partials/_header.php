<?php
session_start();
require "partials/_dbconnect.php";
echo '<nav class="navbar navbar-expand-lg navbar-dark" >
<div class="container-fluid" style="background-color:purple">
  <a class="navbar-brand" href="/forum">Techkidz</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT cate_name, cate_id FROM `category` LIMIT 3";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a class="dropdown-item" href="threadList.php?cateid=' . $row['cate_id'] . '">' . $row['cate_name'] . '</a></li>';

          }
            echo '</ul>
            </li>
            <li class="nav-item">
        <a class="nav-link" href="contact.php" >Contact </a>
      </li>
      </ul>';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="d-flex" method="get" action="search.php">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
        <h5 class="text-light mx-2 mt-2 mb-0 text-nowrap"> Welcome, ' . $_SESSION['useremail'] .'</h5>
        <a href="partials/_logout.php" class="btn btn-dark">Logout</a></form>';
      }else{
        echo '<form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        <div class="mx-2">
          <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        </div>';
      }

  echo '</div>
        </div>
        </nav>';

include "partials/_loginModal.php";
include "partials/_signupModal.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-info my-0" role="alert">
       Now you can login!
       </div>';
}
// elseif ($_GET['signupsuccess']=="false") {
//     // $showError = $_GET['error'];
//     echo '<div class="alert alert-danger my-0" role="alert">
//      There is a problem occured while signup!
// </div>';
// }
?>
