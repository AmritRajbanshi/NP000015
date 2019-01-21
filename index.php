<!-- 
  https://www.youtube.com/watch?v=cwUuCL_6l60&list=PLwGdqUZWnOp3ZgLj8upMGSRSC1ezBfEZs&index=9 
  https://www.youtube.com/watch?v=VrK4YaUKcf8
-->
<!DOCTYPE html>
<html>
<head>
	<title>MaerskLine|Homepage</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='icon' href='img/logo.svg' type='image/x-icon' sizes="48x48" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style type="text/css">
  #bg{
      width: 1400px;
      height: 600px;
  }
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt="MaerskLine logo" height="40px" width="150px" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>    
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Register</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="jumbotron-fluid text-center">
    <img src="img/bg.jpg" class="img-fluid" id="bg">
  </div>
  <div class="container-fluid text-center">
    <h1 class="display-4 font-weight-bold">About MaerskLine</h1> 
    <div class="row">
      <div class="col-md-6 m-auto">
        <hr class="my-4 bg-info">
        <p class="text-justify text-muted">
          Maersk Line is the global container division and the largest operating unit of the A.P. Moller – MaerskGroup, a Danish business conglomerate. It is the world's largest container shipping company having customers through 374 offices in 116 countries. It employs approximately 7,000 sea farers and approximately 25,000 land-based people. Maersk Line operates over 600 vessels and has a capacity of 2.6 million TEU. The company was founded in 1928.
        </p>
      </div>
    </div>
  </div>
  <?php include_once 'footerScript.php'; ?>
</body>
</html>