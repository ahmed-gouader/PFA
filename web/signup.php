<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
  <Link rel="icon" href="img\signup.png">

       <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="style1.css">


</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">S'inscrire</p>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <form class="mx-1 mx-md-4" action="signup-check.php" method="post">
                <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label class="form-label" for="form3Example1c"><i class="bi bi-person-circle"></i> Votre Nom</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" id="form3Example1c" class="form-control form-control-lg py-3" name="name" autocomplete="off" placeholder="enter votre nom" style="border-radius:25px ;" 

                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" id="form3Example1c" class="form-control form-control-lg py-3" name="name" autocomplete="off" placeholder="enter votre nom" style="border-radius:25px ;" >
<br>
          <?php }?>
          </div></div>
          <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">

                      <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Votre E-mail</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="email" id="form3Example3c" class="form-control form-control-lg py-3"      name="uname"  autocomplete="off" placeholder="enter votre Nom d'utilisateur" style="border-radius:25px ;" 

                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="email" id="form3Example3c" class="form-control form-control-lg py-3"      name="uname"  autocomplete="off" placeholder="enter votre Nom d'utilisateur" style="border-radius:25px ;" 
><br>
          <?php }?>
          </div></div>


          <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Mot de passe </label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="enter votre Mot de passe " style="border-radius:25px ;" ><br>
                       
                        <label class="form-label" for="form3Example4c" style="margin-top: 18px;"><i class="bi bi-chat-left-dots-fill"></i> confirmer le Mot de passe </label>
          <input type="password" id="form3Example4c" class="form-control form-control-lg py-3"   name="re_password" autocomplete="off" placeholder="confirmer votre Mot de passe " style="border-radius:25px;  " ><br>
          </div>
          </div>
          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">

          <input type="submit" value="Registre" name="register" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;    background: hsl(117, 50%, 48%);border-color:green " style="border-radius:25px ;" />
          </div>

          </form>
                  <p align="center">j'ai déjà un compte <a href="log.php" class="text-warning" style="font-weight:600; text-decoration:none; color:greenyellow">Se connecter</a></p>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./img/11.png" class="img-fluid" alt="Phone image" height="150px" width="600px" style="margin-bottom:20px;">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

