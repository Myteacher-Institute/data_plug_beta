import Chart from 'chart.js/auto';

const data = {
    labels: [
      'Red',
      'Blue',
      'Yellow'
    ],
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
    data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          callbacks: {
            label: (context) => {
              return context.label + ': ' + context.parsed;
            }
          }
        }
      }
    }
  };

  const ctx = document.getElementById('pieChart').getContext('2d');
  new Chart(ctx, config);

// Example 2: Bar chart