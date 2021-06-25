<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <style>
    code {
        font-family: Consolas,"courier new";
        color: crimson;
        background-color: #f1f1f1;
        padding: 2px;
        font-size: 105%;
        border-radius: 5px;
        }
    </style>
    <title>Code Hat:Connect Us</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Code Hat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> 
        <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
             $name = $_POST['name'];
             $email = $_POST['email'];
             $des = $_POST['des'];
             //Connecting to a DataBase
             $servername = "sql208.epizy.com";
             $username = "epiz_27372876";
             $password = "3B2iiZyMfMY";
             $database = "epiz_27372876_1";
             //Creat a Connetion
             $conn = mysqli_connect($servername,$username,$password,$database);
             
             //Die IF connection was not SuccessFull
             if(!$conn){
               die("Sorry We Failed to Connect: " .mysqli_connect_error());
              }
              else{
                // echo "Connection Was Successfull<br>";
              }

            //Form Validation  

            if(empty($name)||empty($email)||empty($des)){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning! </strong>All Fiels are medetory.
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
             }
             else{
              
                    //Creating Table 
                    $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Des`) VALUES ('$name', '$email', '$des');
                    ";
                    $result = mysqli_query($conn, $sql);
                    //Check for the Table Creation Success
                    if ($result){  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your consern has been submitted Successfully.
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    else{
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your consern has been not submitted Successfully.
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                } 
         }
        ?>
    <div class="container mt-3">
        <h2>Contact Us</h2>
            <form action='/index.php' method = "post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name = "name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name = "email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Description</label>
                <textarea class="form-control" name="des" id="des" cols="30" rows="10"></textarea> 
             </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
    </div>
    <!-- JavaScript Bundle with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>
</body>
</html>