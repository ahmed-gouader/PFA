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
