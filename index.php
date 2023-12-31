<!doctype html>
<html lang="en">

<head>
  <met a charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php



  if (isset($_POST['btnsub']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['desc'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['desc'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $desc = $_POST['desc'];
    }
    if (empty($name) || empty($email) || empty($desc)) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> All fields required.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
      try {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'co';

        $con = new PDO('mysql:host =localhost; dbname=test1', $user, $password);

        $insertquery = "INSERT INTO `contactus` (`sno`, `email`, `full_name`, `msg`, `dt`)
        VALUES (NULL, '$email', '$name', '$desc', current_timestamp())";

        $resp = $con->query($insertquery);

        if ($resp) {

          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      } catch (PDOException $e) {

        echo "Database Error: " . $e->getMessage();
      }
    }
  }
  // if($con){
  //   echo 'connection done';
  // }
  ?>

  <div class="container">
    <h1>Contact Us</h1>
    <form action="" method="POST" autocomplete="off">
      <div class="mb-3">
        <label for="Name" class="form-label">name</label>
        <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" require>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="25" rows="5" required></textarea>
      </div>
      <input type="submit" name="btnsub" value="Submit">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>