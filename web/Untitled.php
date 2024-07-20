<?php
  include("./connection/DB.php");
?>
     <?php
     
     $find_notifications = "SELECT * from inf where active = 1";
     $result = mysqli_query($connection,$find_notifications);
     $count_active = '';
     $notifications_data = array(); 
     $deactive_notifications_dump = array();
      while($rows = mysqli_fetch_assoc($result)){
              $count_active = mysqli_num_rows($result);
              $notifications_data[] = array(
                          "n_id" => $rows['n_id'],
                          "notifications_name"=>$rows['notifications_name'],
                          "message"=>$rows['message'],
                          "date"=>$rows['date'],
                          "heure"=>$rows['heure'],
              );
      }
      //only five specific posts
      $deactive_notifications = "SELECT * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
      $result = mysqli_query($connection,$deactive_notifications);
      while($rows = $result->fetch_assoc()){
        $deactive_notifications_dump[] = array(
                    "n_id" => $rows['n_id'],
                    "notifications_name"=>$rows['notifications_name'],
                    "message"=>$rows['message'],
                    "date"=>$rows['date'],
                    "heure"=>$rows['heure'],
        );
      }

   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <Link rel="icon" href="img/11.png">
    <!-- ======= Styles ====== -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
    .pour {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;

  grid-gap: 30px;
  /* margin-top: 10px; */
}

.pour .pourcen {
  position: relative;
  display: grid;
  min-height: 500px;
  background: var(--white);
  cursor: pointer;
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
      
      .container1 {
        max-width: 1100px;
        width: 100%;
      }
.slider-wrapper {
        position: relative;
      }
      
      .slider-wrapper .slide-button {
        position: absolute;
        top: 50%;
        outline: none;
        border: none;
        height: 50px;
        width: 50px;
        z-index: 5;
        color: #fff;
        display: flex;
        cursor: pointer;
        font-size: 2.2rem;
        background: #000;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transform: translateY(-50%);
      }
      
      .slider-wrapper .slide-button:hover {
        background: #404040;
      }
      
      .slider-wrapper .slide-button#prev-slide {
        left: -25px;
        display: none;
      }
      
      .slider-wrapper .slide-button#next-slide {
        right: -25px;
      }
      
      .slider-wrapper .image-list {
        display: grid;
        grid-template-columns: repeat(16, 1fr);
        gap: 18px;
        font-size: 0;
        list-style: none;
        margin-bottom: 30px;
        overflow-x: auto;
        scrollbar-width: none;
      }
      
      .slider-wrapper .image-list::-webkit-scrollbar {
        display: none;
      }
      
      .slider-wrapper .image-list .image-item {
        width: 325px;
        height: 400px;
        object-fit: cover;
      }
      
      .container .slider-scrollbar {
        height: 24px;
        width: 100%;
        display: flex;
        align-items: center;
      }
      
      .slider-scrollbar .scrollbar-track {
        background: #ccc;
        width: 100%;
        height: 2px;
        display: flex;
        align-items: center;
        border-radius: 4px;
        position: relative;
      }
      
      .slider-scrollbar:hover .scrollbar-track {
        height: 4px;
      }
      
      .slider-scrollbar .scrollbar-thumb {
        position: absolute;
        background: #000;
        top: 0;
        bottom: 0;
        width: 50%;
        height: 100%;
        cursor: grab;
        border-radius: inherit;
      }
      
      .slider-scrollbar .scrollbar-thumb:active {
        cursor: grabbing;
        height: 8px;
        top: -2px;
      }
      
      .slider-scrollbar .scrollbar-thumb::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -10px;
        bottom: -10px;
      }
      .image-item {
  transition: transform 0.3s ease; /* Smooth transition effect */
}

.image-item:hover {
  transform: scale(1.1); /* Scale the image on hover */
}

.image-item:not(:hover) {
  transform: scale(1); /* Reset scale for non-hovered images */
}
      /* Styles for mobile and tablets */
      @media only screen and (max-width: 1023px) {
        .slider-wrapper .slide-button {
          display: none !important;
        }
      
        .slider-wrapper .image-list {
          gap: 10px;
          margin-bottom: 15px;
          scroll-snap-type: x mandatory;
        }
      
        .slider-wrapper .image-list .image-item {
          width: 280px;
          height: 380px;
        }
      
        .slider-scrollbar .scrollbar-thumb {
          width: 20%;
        }
      }
</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <img src="./img/world.png">
                        </span>
                        <span class="title"><h1 class="animate__animated animate__heartBeat"><strong>HELP </strong></h1></span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">HOME</span>
                    </a>
                </li>
                <li>
                    <a href="meteo.html">
                        <span class="icon">
                            <ion-icon name="thermometer-outline"></ion-icon>
                                       </span>
                        <span class="title">Meteo</span>
                    </a>
                </li>
                <li>
                    <a href="WIKI-HELP.html">
                        <span class="icon">
                            <ion-icon name="library-outline"></ion-icon>
                        </span>
                        <span class="title">ARTICLES</span>
                    </a>
                </li>
                <li>
                    <a href="index1.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">QUIZ</span>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <span class="icon">
                            <ion-icon name="navigate-circle-outline"></ion-icon>
                        </span>
                        <span class="title">MAPS</span>
                    </a>
                </li>
                <hr>

                <li class="sit">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="alarm-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>
               
                <li class="log">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <form action="https://scholar.google.com/scholar" method="get">
                    <div class="search">
                        <label>
                            <input type="text" name="q" placeholder="Search here" >
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                </form>
                                <div id="conn">
                    <p id="clock"></p>
               
                </div> 
                <div>
                <div>
                  <ul class="nav navbar-nav navbar-right">
                  <li>
    <div class="bell-container">
        <i class="fa fa-bell" id="over" data-value="<?php echo $count_active;?>" style="font-size:32px;color:black;margin:0.5rem 0.4rem !important;"></i>
        <?php if(!empty($count_active)){?>
            <div class="round" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
        <?php }?>
    </div>
</li>

                     
                    <?php if(!empty($count_active)){?>
                      <div id="list">
                       <?php
                          foreach($notifications_data as $list_rows){?>
                            <li id="message_items">
                            <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id'];?>>
                              <span><?php echo $list_rows['notifications_name'];?></span>
                              <div class="msg">
                                <p><?php 
                                  echo $list_rows['message'];
                                ?></p>
                              </div>
                              <div><p><?php echo $list_rows['date'];?></p></div>
                              <div><p><?php echo $list_rows['heure'];?></p></div>
                            </div>
                            </li>
                         <?php }
                       ?> 
                       </div> 
                     <?php }else{?>
                        <!--old Messages-->
                        <div id="list">
                        <?php
                          foreach($deactive_notifications_dump as $list_rows){?>
                            <li id="message_items">
                            <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id'];?>>
                              <span><?php echo $list_rows['notifications_name'];?></span>
                              <div class="msg">
                                <p><?php 
                                  echo $list_rows['message'];
                                ?></p>
                              </div>
                            </div>
                            </li>
                         <?php }
                       ?>
                        <!--old Messages-->
                     
                     <?php } ?>
                     
                     </div>
                  </ul>
                  </div>                </div>
                <div class="user">
               
                    <img src="img/protc.jpeg" alt="">
                </div>
            </div>
            <!-- ======================= Cards ================== -->
             <div class="cardBox1">
 <div class="card1">
     <div id="date-time"></div>
     <div id="location"></div> <!-- Ajout du lieu -->
     <div id="temp-div"></div>
     <div id="weather-info"></div>
     <div id="weather-emoji"></div>
 </div>
 
 



  </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">N/A</div>
                        <div class="cardName">Pertes humaines</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-remove-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">N/A</div>
                        <div class="cardName">Date</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">N/A</div>
                        <div class="cardName">échelle</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">N/A$B</div>
                        <div class="cardName">Pertes économiques</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2><marquee>Analyse Mondiale des Catastrophes Naturelles : Impact Humain et Géographique</marquee></h2>
                    </div>

                    <div class="slider">
                        <div class="slides">
                            <canvas id="myChart" width="100%" height="70%"></canvas>
                            <canvas id="lin" width="100%" height="70%"></canvas>
                        </div>
                        <button class="prev" onclick="prevSlide()">&#10094;</button>
                        <button class="next" onclick="nextSlide()">&#10095;</button>
                    </div>
                    
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2><marquee >Classement des catastrophes naturelles les plus meurtrières au monde</marquee></h2>
                    </div>

                    <table>
                        <tr class="1">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/ind.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Tsunami de l'océan<br> <span> Indien</span></h4>
                            </td>
                        </tr>

                        <tr class="2">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/HAITI.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Séisme d'Haïti <br> <span>Haïti</span></h4>
                            </td>
                        </tr>

                        <tr class="3">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/OIP.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Cyclone de Bhola<br> <span>Bangladesh</span></h4>
                            </td>
                        </tr>

                        <tr class="4">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/samar.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Tsunami de Sumatra <br> <span> Sumatra </span></h4>
                            </td>
                        </tr>

                        <tr class="5">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/R.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Séisme au Japon <br> <span>Japon</span></h4>
                            </td>
                        </tr>

                        <tr class="6">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/r1.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Ouragan Katrina <br> <span>États-Unis</span></h4>
                            </td>
                        </tr>

                        <tr class="7">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/OIP.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Cyclone de Nargis<br> <span>Myanmar</span></h4>
                            </td>
                        </tr>

                        <tr class="8">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/turq.jpeg" alt=""></div>
                            </td>
                            <td>
                                <h4>Séisme en Turquie<br> <span>Turquie</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="pour">
            <div class="pourcen">
     
  <div id="piechart" style="width: 900px; height: 500px; margin: 0 auto;"></div>

  

   
</div>
</div>
<div class="pour">
<div class="pourcen">
<div class="container1">
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
        <ul class="image-list">
          <img class="image-item" src="images/2.jpg" alt="img-1" />
          <img class="image-item" src="images/1.jpg" alt="img-2" />
          <img class="image-item" src="images/3.jpg" alt="img-3" />
          <img class="image-item" src="images/4.jpg" alt="img-4" />
          <img class="image-item" src="images/5.jpg" alt="img-5" />
          <img class="image-item" src="images/6.jpg" alt="img-6" />
          <img class="image-item" src="images/7.jpg" alt="img-7" />
          <img class="image-item" src="images/8.jpg" alt="img-8" />
          <img class="image-item" src="images/9.jpg" alt="img-9" />
          <img class="image-item" src="images/10.jpg" alt="img-10" />
          <img class="image-item" src="images/11.jpg" alt="img-5" />
            <img class="image-item" src="images/12.jpg" alt="img-6" />
            <img class="image-item" src="images/13.jpg" alt="img-7" />
            <img class="image-item" src="images/14.jpg" alt="img-8" />
            <img class="image-item" src="images/15.jpg" alt="img-9" />
            <img class="image-item" src="images/16.jpg" alt="img-10" />
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>

      </div>
    </div>
</div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="js/gafsa.js"></script>
    <script src="scripts/clock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scripts/sholar.js"></script>
  <script src="scripts/class.js"></script>
<script src="scripts/slide.js"></script>
<script>
        // Récupérer les données PHP et les convertir en JavaScript
        <?php
        // Connexion à la base de données
        $con = mysqli_connect("localhost", "root", "", "charts");

        // Vérifier la connexion
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Récupérer les données depuis la base de données
        $query = "SELECT * FROM month";
        $result = mysqli_query($con, $query);

        // Convertir les données en format utilisable par Chart.js
        $labels = array();
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['name'];
            $data[] = $row['number'];
        }

        // Convertir les tableaux en JSON pour pouvoir les utiliser dans le code JavaScript
        $labels_json = json_encode($labels);
        $data_json = json_encode($data);

        // Fermer la connexion à la base de données
        mysqli_close($con);
        ?> 

        // Créer le graphique
        var ctx = document.getElementById('lin').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo $labels_json; ?>,
                datasets: [{
                    label: 'Nombre moyen : Nombre de décès par type de catastrophe naturelle dans le monde',
                    data: <?php echo $data_json; ?>,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<script>
<?php
// Connexion à la base de données
$con = mysqli_connect("localhost", "root", "", "charts");

// Vérifier la connexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Récupérer les données depuis la base de données
$query = "SELECT * FROM disaster WHERE numbers != 0";
$results = mysqli_query($con, $query);

// Créer des tableaux pour stocker les données
$pays = array();
$numbers = array();

// Parcourir les résultats et les ajouter aux tableaux
while ($row = mysqli_fetch_assoc($results)) {
    $pays[] = $row['pays'];
    $numbers[] = $row['numbers'];
}

// Convertir les tableaux en format JSON
$pays_json = json_encode($pays);
$numbers_json = json_encode($numbers);

// Fermer la connexion à la base de données
mysqli_close($con);
?>


const ktx = document.getElementById('myChart');
new Chart(ktx, {
    type: 'bar',
    data: {
        labels: <?php echo $pays_json; ?>,
        datasets: [{
            label: 'Classement des pays subissant le plus de catastrophes naturelles dans le monde en 2022',
            data: <?php echo $numbers_json; ?>,
            backgroundColor: [
    'rgba(255, 99, 132, 0.2)', // Red
    'rgba(54, 162, 235, 0.2)', // Blue
    'rgba(255, 206, 86, 0.2)', // Yellow
    'rgba(75, 192, 192, 0.2)', // Green
    'rgba(153, 102, 255, 0.2)', // Purple
    'rgba(255, 159, 64, 0.2)', // Orange
    'rgba(255, 0, 0, 0.2)', // Dark Red
    'rgba(0, 255, 0, 0.2)', // Lime Green
    'rgba(0, 0, 255, 0.2)', // Dark Blue
    'rgba(255, 255, 0, 0.2)', // Cyan
],
borderColor: [
    'rgba(255, 99, 132, 1)', // Red
    'rgba(54, 162, 235, 1)', // Blue
    'rgba(255, 206, 86, 1)', // Yellow
    'rgba(75, 192, 192, 1)', // Green
    'rgba(153, 102, 255, 1)', // Purple
    'rgba(255, 159, 64, 1)', // Orange
    'rgba(255, 0, 0, 1)', // Dark Red
    'rgba(0, 255, 0, 1)', // Lime Green
    'rgba(0, 0, 255, 1)', // Dark Blue
    'rgba(255, 255, 0, 1)', // Cyan
],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>const initSlider = () => {
        const imageList = document.querySelector(".slider-wrapper .image-list");
        const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
        const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
        const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
        const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
        
        // Handle scrollbar thumb drag
        scrollbarThumb.addEventListener("mousedown", (e) => {
            const startX = e.clientX;
            const thumbPosition = scrollbarThumb.offsetLeft;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
            
            // Update thumb position on mouse move
            const handleMouseMove = (e) => {
                const deltaX = e.clientX - startX;
                const newThumbPosition = thumbPosition + deltaX;
    
                // Ensure the scrollbar thumb stays within bounds
                const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
                
                scrollbarThumb.style.left = `${boundedPosition}px`;
                imageList.scrollLeft = scrollPosition;
            }
    
            // Remove event listeners on mouse up
            const handleMouseUp = () => {
                document.removeEventListener("mousemove", handleMouseMove);
                document.removeEventListener("mouseup", handleMouseUp);
            }
    
            // Add event listeners for drag interaction
            document.addEventListener("mousemove", handleMouseMove);
            document.addEventListener("mouseup", handleMouseUp);
        });
    
        // Slide images according to the slide button clicks
        slideButtons.forEach(button => {
            button.addEventListener("click", () => {
                const direction = button.id === "prev-slide" ? -1 : 1;
                const scrollAmount = imageList.clientWidth * direction;
                imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
            });
        });
    
         // Show or hide slide buttons based on scroll position
        const handleSlideButtons = () => {
            slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
            slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
        }
    
        // Update scrollbar thumb position based on image scroll
        const updateScrollThumbPosition = () => {
            const scrollPosition = imageList.scrollLeft;
            const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
            scrollbarThumb.style.left = `${thumbPosition}px`;
        }
    
        // Call these two functions when image list scrolls
        imageList.addEventListener("scroll", () => {
            updateScrollThumbPosition();
            handleSlideButtons();
        });
    }
    
    window.addEventListener("resize", initSlider);
    window.addEventListener("load", initSlider);</script>




    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>