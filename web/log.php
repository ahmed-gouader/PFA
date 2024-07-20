<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
  <Link rel="icon" href="img\log-in.png">

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style1.css">
</head>
<body>
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="./img/11.png" class="img-fluid" alt="Phone image" height="250px" width="600px">
        </div>
		<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
     <form action="login.php" method="post">
	 <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Se connecter</p>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		 <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> E-mail d'utilisateur</label>
              <input type="email" id="form1Example13" class="form-control form-control-lg py-3" name="uname" autocomplete="off" placeholder="enter votre e-mail" style="border-radius:25px ;" />
            </div>
			<div class="form-outline mb-4">
              <label class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i>Mot de passe</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="enter votre Mot de passe" style="border-radius:25px ;" />

            </div>

			<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" value="Se connecter" name="login" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600; background-color: blue; border-color:blue" />
            </div>

		 </form><br>

		  <p align="center">je n'ai pas de compte<a href="signup.php" class="text-warning" style="font-weight:600;text-decoration:none;">Inscrivez-vous ici</a></p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>