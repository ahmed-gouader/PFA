<?php
  include("./connection/DB.php");
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
    <link rel="stylesheet" href="assets/css/autre.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        <?php
  $con = mysqli_connect("localhost","root","","charts");
  ?>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT * FROM contribution";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['student']."',".$result['contribution']."],";
          }

         ?>
        ]);

        var options = {
  title: '',
  titleTextStyle: {
    fontSize: 14,  // taille de police du titre
    bold: true,    // en gras
    textAlign: 'left',  // centré horizontalement
    // si vous voulez centrer verticalement, vous pouvez utiliser marginTop
    // par exemple, marginTop: 20 pour déplacer le titre vers le bas de 20 pixels
  }
};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <link rel="stylesheet" href="./assets/new.css">
    <style>
        .slider1 {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 600px;
        }
        .slides1 {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        .iframe-container {
            flex: 0 0 100%;
            width: 100%;
            height: 100%;
        }
    
        
        .custom-prev, .custom-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1;
            border-radius: 50%;
        }
        .custom-prev {
            left: 0;
        }
        .custom-next {
            right: 0;
        }

    </style>

</head>

<body>
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
                <form action="https://www.google.com/search" method="get">
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
                  <ul class="nav navbar-nav navbar-right">
                  <i class="fa fa-bell"   id="over" data-value ="<?php echo $count_active;?>" style="z-index:-99 !important;font-size:32px;color:black;margin:0.5rem 0.4rem !important;"></i>
                    <?php if(!empty($count_active)){?>
                    <div class="round" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>
                    <?php }?>
                     
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
                        <!--old Messages-->
                     
                     <?php } ?>
                     
                     </div>
                  </ul>
                  </div>
                  <div>
       
            <!-- ======================= Cards ================== -->
             <div class="cardBox1" style="margin-left: 60%; margin-bottom:30px">
 <div class="card1">
     <div id="date-time"></div>
     <div id="location"></div> <!-- Ajout du lieu -->
     <div id="temp-div"></div>
     <div id="weather-info"></div>
     <div id="weather-emoji"></div>
 </div>
 
 



  </div>



            <!-- ================ Order Details List ================= -->
           <div class="pour">
            <div class="pourcen">
                    <div class="cardHeader">
                        <h2><marquee>Analyse Mondiale des Catastrophes Naturelles : Impact Humain et Géographique</marquee></h2>
                    </div>

                    <div class="slider">
                        <div class="slides">
                            <canvas id="myChart" width="100%" height="50px"></canvas>
                            <canvas id="lin" width="100%" height="50px"></canvas>
                        </div>
                        <button class="prev" onclick="prevSlide()">&#10094;</button>
                     <button class="next" onclick="nextSlide()">&#10095;</button>
                    </div>
                    
                </div>

                <!-- ================= New Customers ================ -->
        </div>

        <div class="pour">
<div class="pourcen">
<div class="slider1">
    <div class="slides1">
        <div class="iframe-container">
        <iframe src="https://ourworldindata.org/explorers/natural-disasters?tab=map&time=2024&region=Africa&facet=none&Disaster+Type=Floods&Impact=Deaths&Timespan=Decadal+average&Per+capita=false&country=~OWID_WRL&hideControls=true" loading="lazy" style="width: 100%; height: 600px; border: 0px none;" allow="web-share; clipboard-write"></iframe>        </div>        <div class="iframe-container">
            <iframe src="https://ourworldindata.org/explorers/natural-disasters?tab=map&region=Africa&facet=none&hideControls=true&Disaster+Type=Wildfires&Impact=Deaths&Timespan=Decadal+average&Per+capita=false&country=TUN~OWID_AFR" loading="lazy" style="width: 100%; height: 600px; border: 0px none;" allow="web-share; clipboard-write"></iframe> </div>            <div class="iframe-container">
            <iframe src="https://ourworldindata.org/explorers/natural-disasters?tab=map&time=2024&region=Africa&facet=none&Disaster+Type=Earthquakes&Impact=Deaths&Timespan=Decadal+average&Per+capita=false&country=~OWID_WRL&hideControls=true" loading="lazy" style="width: 100%; height: 600px; border: 0px none;" allow="web-share; clipboard-write"></iframe>        </div>
    </div>
        <button class="custom-prev" onclick="pslide()"><</button>
        <button class="custom-next" onclick="sslide()">></button>
</div>

</div>
</div>
      
        
  
      <div class="pour">
      <div class="pourcen">
        
      <iframe src="https://ourworldindata.org/explorers/natural-disasters?facet=none&country=~TUN&hideControls=true&Disaster+Type=All+disasters&Impact=Deaths&Timespan=Annual&Per+capita=false&tab=chart" loading="lazy" style="width: 100%; height: 600px; border: 0px none;" allow="web-share; clipboard-write"></iframe>
      </div></div>

             <div class="pour">
  <div class="pourcen">
  <iframe src="https://ourworldindata.org/grapher/natural-disasters-by-type?tab=chart" loading="lazy" style="width: 100%; height: 600px; border: 0px none;" allow="web-share; clipboard-write"></iframe>
  </div></div>
            <div class="pour">
            <div class="pourcen">
            <h2 style="color: red;"><marquee>Répartition des Catastrophes Naturelles par Continent : Une Analyse en Pourcentage en 2023</marquee></h2>

     
  <div id="piechart" style="width: 900px; height: 500px; margin: 0 auto;"></div>

  

   
</div>
</div>
<div class="pour">
<div class="pourcen">
<h1 class="achievement-title" >Petite formation en premiers secours</h1>
<div class="achievement-container">
    <div class="achievement-row">
        <div class="achievement-col achievement-col-md-4">
            <div class="achievement-card mx-auto" style="width: 50rem;">
            <iframe src="https://www.youtube-nocookie.com/embed/0VIEer-SV6c?start=4&end=130&autoplay=1&rel=0&q=catastrophes naturelles " width="100%" height="450" title="Trousse de secours" frameborder="0" allowfullscreen></iframe>                <div class="achievement-card-body bg-dark">
                    <h5 class="achievement-card-title">Trousse de secours</h5>
                    <p class="achievement-card-text">
Les trousses de secours sont utilisées pour fournir des premiers soins en cas d'urgence ou de blessure mineure, que ce soit à la maison, au travail, à l'école ou lors d'activités sportives.</p>
                    <a href="https://www.sikana.tv/en" class="achievement-btn">Voir plus</a>
                </div>
            </div>
        </div>
        <div class="achievement-col achievement-col-md-4">
            <div class="achievement-card mx-auto" style="width: 50rem;">
            <iframe src="https://www.youtube-nocookie.com/embed/jz6lOVvedl4?start=4&end=95&autoplay=1&rel=0" width="100%" height="450" title="A YouTube video" frameborder="0" allowfullscreen></iframe>                 
                   <h5 class="achievement-card-title" style="margin-top: 10px; margin-left: 20px;">Alerter Les Secours</h5>
                    <p class="achievement-card-text " style="   margin-left: 20px;">
En cas d'alerte de secours, suivez les instructions, aidez les autres si possible, contactez les services d'urgence si nécessaire, et restez informé des mises à jour.</p>
                    <a href="https://www.sikana.tv/en" class="achievement-btn" style="    margin-bottom: 10px; margin-right: 10px;">Voir plus</a>
                </div>
            </div>
        </div>

    </div>
</div>

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



<script>
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'./connection/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });


});
</script>
<script>

    let slideIndex1 = 0;

    function showSlides1() {
        const slides1 = document.querySelectorAll('.slides1 .iframe-container');
        if (slideIndex1 >= slides1.length) {
            slideIndex1 = 0;
        }
        if (slideIndex1 < 0) {
            slideIndex1 = slides1.length - 1;
        }
        slides1.forEach(slide => {
            slide.style.transform = `translateX(-${slideIndex1 * 100}%)`;
        });
    }

    function sslide() {
        slideIndex1++;
        showSlides1();
    }

    function pslide() {
        slideIndex1--;
        showSlides1();
    }

    showSlides1();




</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>