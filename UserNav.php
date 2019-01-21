<?php
  include_once 'conn.php';
	session_start();
	// check whether accessing this page is logged in
	if($_SESSION['U_type']=="" or $_SESSION['U_type']==="admin"){
		header("location:login.php?message=failed");
	}
	//$page = "User Navbar";
?>
<head>
	<title>Maersk Line|<?php echo $page; ?></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel='icon' href='img/logo.svg' type='image/x-icon' sizes="48x48" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="img/logo.svg" alt="MaerskLine logo" height="40px" width="150px" class="img-fluid"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="user.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bookingUser.php">Booking</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <p class="px-3">Hello<span class="font-weight-bold pl-2"><?php echo $_SESSION['U_fname']; ?></span></p>
      <a class="btn btn-danger my-2 my-sm-0" href="logout.php">LOGOUT</a>
    </form>
  </div>
</nav>