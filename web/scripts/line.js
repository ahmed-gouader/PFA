
        // Données à tracer
        const data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
          datasets: [{
            label: 'Exemple de données',
            data: [12, 19, 3, 5, 2],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        };
    
        // Configuration du graphique
        const config = {
          type: 'line',
          data: data,
        };
    
        // Créer le graphique
        var myChart = new Chart(
          document.getElementById('lin'),
          config
        );
      