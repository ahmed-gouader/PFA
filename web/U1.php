<?php

  $con = mysqli_connect("localhost","root","","charts");
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
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="navbar.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
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
          title: 'Students and their contribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <style>
.cardBox1 {
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(3, 2fr);
    grid-gap: 30px;
    
}
.cardBox1 .card1 {
    position: relative;
    background:rgb(255, 255, 255);
    padding: 30px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    cursor: pointer;
    box-shadow: rgb(255, 255, 255);
    animation: fadeIn 1s ease-out; /* Animation for card fade in */
}
.conn{
margin-right: 90%;
}
        
        #temp-div {
            font-size: 60px;
            margin-top: -30px;
            animation: slideIn 1s ease-out; /* Animation for temperature slide in */
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
            }
            to {
                transform: translateY(0);
            }
        }

        #weather-info {
            font-size: 20px;
            margin-top: 20px;
            animation: fadeIn 1s ease-out; /* Animation for weather info fade in */
        }
            #weather-emoji {
        font-size: 40px;
        margin-top: -10px;
        animation: fadeIn 1s ease-out; /* Animation for emoji fade in */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }


    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.html">
                        <span class="icon">
                            <img src="./img/world.png">
                        </span>
                        <span class="title"><h1 class="animate__animated animate__heartBeat"><strong>HELP </strong></h1></span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
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
                        <div class="numbers">1,504</div>
                        <div class="cardName">Pertes humaines</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-remove-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Date</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">échelle</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">7,842$B</div>
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
                        <h2><marquee>les 10 catastrophes naturelles les plus important daans le mondes</marquee></h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>..................</h2>
                    </div>

                    <table>
                        <tr class="1">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/OIP.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Bangladesh<br> <span> Inondations, cyclones</span></h4>
                            </td>
                        </tr>

                        <tr class="2">
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/download.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Philippines <br> <span>Typhons, séismes</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Haïti <br> <span>Tremblements de terre, ouragans</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Népal <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Indonésie <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Vanuatu <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Honduras<br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Éthiopie<br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="solid">
               
            
                    <div id="piechart" style="width: 900px; height: 500px;"></div>

                  
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="js/gafsa.js"></script>
    <script src="clock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function searchGoogleScholar() {
            var query = document.getElementById('search-input').value;
            if (query.trim() !== '') {
                window.location.href = 'https://scholar.google.com/scholar?q=' + encodeURIComponent(query);
            }
        }
    </script>
    <script>
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [' tremblements de terre ', 'tsunamis', 'ouragans', 'inondations', 'Purtornadesple' ],
            datasets: [{
              label: '# of Votes',
              data: [1, 1, 8, 54, 21, 3],
              backgroundColor: [ // Assigning background color for each label
        'rgba(255, 99, 132, 0.2)', // Red
        'rgba(54, 162, 235, 0.2)', // Blue
        'rgba(255, 206, 86, 0.2)', // Yellow
        'rgba(75, 192, 192, 0.2)', // Green
        'rgba(153, 102, 255, 0.2)', // Purple
        
      ],
      borderColor: [ // Border color for each label (optional)
        'rgba(255, 99, 132, 1)', // Red
        'rgba(54, 162, 235, 1)', // Blue
        'rgba(255, 206, 86, 1)', // Yellow
        'rgba(75, 192, 192, 1)', // Green
        'rgba(153, 102, 255, 1)', // Purple
        
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
      <script>
    const data = {
      labels: ['Red', 'Blue', 'Yellow'],
      datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'pie',
      data: data,
    };

    // Get the context of the canvas element
    const btx = document.getElementById('pourcentage').getContext('2d');

    // Create a new chart instance

      
    const myPieChart = new Chart(btx, config);
  </script>

     

    <script>
        // JavaScript code to handle the click event on table rows with classes
        const tableRows = document.querySelectorAll('table tr');
        const cardNumbers = document.querySelectorAll('.cardBox .numbers');
        const specificValues = {
            "1": [
                { name: 'Pertes humaines', value: '185' },
                { name: 'Date', value: '89' },
                { name: 'échelle', value: '88' },
                { name: 'perte économiques ', value: '7,846$B' }
            ],
            "2": [
                { name: 'Pertes humaines', value: '185' },
{ name: 'Date', value: '89' },
{ name: 'échelle', value: '88' },
{ name: 'perte économiques ', value: '7,87$B' }
                // Define values for class "2" if needed
            ]
            // Add more classes and their respective values as needed
        };

        tableRows.forEach((row, index) => {
            row.addEventListener('click', () => {
                const rowClass = row.getAttribute('class');
                if (rowClass && specificValues[rowClass]) {
                    specificValues[rowClass].forEach((value, i) => {
                        cardNumbers[i].textContent = value.value;
                    });
                } else {
                    // Generate random numbers for other rows
                    cardNumbers.forEach(cardNumber => {
                        cardNumber.textContent = Math.floor(Math.random() * 1000) + 1;
                    });
                }
            });
        });
    </script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
  