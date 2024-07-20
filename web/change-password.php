<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<Link rel="icon" href="./img/reset-password.png">

	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style1.css">
</head>
<body>

    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
		<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
    <form action="change-p.php" method="post">
   
		 <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">     	<h2>Change Password</h2></p>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
		<div class="form-outline mb-4">
              <label class="form-label" for="form1Example13"> <i class="bi bi-chat-left-dots-fill"></i> Mot de passe</label>
			  <input type="password" id="form3Example4c" class="form-control form-control-lg py-3"       name="op"  autocomplete="off" placeholder="Mot de passe " style="border-radius:25px ;" ><br>
     	       <br>

				<label class="form-label" for="form1Example13"> <i class="bi bi-chat-left-dots-fill"></i> nouveau Mot de passe</label>
				<input type="password" id="form3Example4c" class="form-control form-control-lg py-3"         name="np"   autocomplete="off" placeholder="Nouveau Mot de passe " style="border-radius:25px ;" ><br>
     	       <br>

				<label class="form-label" for="form1Example13"> <i class="bi bi-chat-left-dots-fill"></i> confirmer votre nouveau </label>
				<input type="password" id="form3Example4c" class="form-control form-control-lg py-3"         name="c_np"   autocomplete="off" placeholder="confirmer votre nouveau Mot de passe" style="border-radius:25px ;" ><br>

     				<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" value="Changer" name="login" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600; background-color: green; border-color:green" />
            </div>

		 </form><br>
		 <p align="center"><a href="index.php" class="text-warning" style="font-weight:600;text-decoration:none;">Accueil</a></p>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>