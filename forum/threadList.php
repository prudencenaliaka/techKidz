<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tech Kidz Africa - Community Forum</title>
</head>

<body>
    <?php require "partials/_dbconnect.php"; ?>
    <?php require "partials/_header.php"; ?>
    <?php
        $id = $_GET['cateid'];
        $sql = "SELECT * FROM `category` WHERE `cate_id` = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['cate_name'];
            $catdesc = $row['cate_desc'];

        }
        ?>
    <?php
       $showAlert = false;
       $method = $_SERVER['REQUEST_METHOD'];
       if($method=='POST'){
           //Insert thread into DB
           $th_title = $_POST['title'];
           $th_desc = $_POST['desc'];

           $th_title = str_replace("<", "&lt;", $comment);
           $th_title = str_replace(">", "&gt;", $comment);

           $th_desc = str_replace("<", "&lt;", $comment);
           $th_desc = str_replace(">", "&gt;", $comment);

           $askedBy = $_POST['sno'];
           $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cate_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$askedBy', current_timestamp())";
           $result = mysqli_query($conn, $sql);
           $showAlert = true;
           if($showAlert){
               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Success!</strong> Your concern has been added, wait for the response from the community.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
           }
       }

    ?>


    <div class="container my-3">

        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname ?> forum</h1>
            <p class="lead"> <?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>
            <ul>
                <li>No Spam / Advertising / Self-promote in the forums.</li>
                <li>Do not post “offensive” posts, links or images.</li>
                <li>Do not cross post questions.</li>
                <li>Remain respectful of other members at all times.</li>
            </ul>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button" style="background-color:purple; border:2px solid white;">Learn more</a>
            </p>
        </div>
    </div>
    <hr>
    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
        <div class="mb-3">
                <label for="title" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="hintTitle" class="form-text">Title should be more short and precise.</div>
                <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '">
                </div>
                <div class="mb-3">
                <label for="desc" class="form-label">Ask your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
                </div>';
        }else{
            echo '<div class="container">
                 <h1 class="py-2">Start a Discussion</h1>
                <p class="lead">You are not logged in. Please login to the community to start a discussion.</p>
                </div>';
        }

    ?>
    <div class="container mb-5">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['cateid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cate_id` = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $timestamp = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT * FROM `users` WHERE `sno`='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

        echo '<div class="media my-3 ">
            <img class="mr-3" src="img/user.png" height="75px" alt="Generic placeholder image">
            <div class="media-body">
            <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='. $id .'">' . $title . '</a></h5>
            ' . $desc . '
            <p class="mb-0"><b>Asked by: ' . $row2['user_email'] . ' at ' . $timestamp . '</b></p>
            </div>
        </div>';
        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No question/comments found!</p>
              <p class="lead">Be the first person to ask a question.</p>
            </div>
          </div>';
            "<b> </b>";
        }
        ?>


    </div>

    <?php require "partials/_footer.php"; ?>
    <h1></h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <!-- JavaScript Bundle with Popper -->
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>

</html>
