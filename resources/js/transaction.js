// // Prepare data for Chart.js  
// // const transactions = @json($transactions);  
// const scatterData = transactions.map(transaction => ({  
//     x: new Date(transaction.date).getTime(), // Convert date to timestamp  
//     y: transaction.total  
// }));  

// // Create the scatter chart  
// const ctx = document.getElementById('transactionChart').getContext('2d');  
// const transactionChart = new Chart(ctx, {  
//     type: 'scatter',  
//     data: {  
//         datasets: [{  
//             label: 'Daily Transactions',  
//             data: scatterData,  
//             backgroundColor: 'rgba(75, 192, 192, 1)',  
//             pointRadius: 5,  
//         }]  
//     },  
//     options: {  
//         scales: {  
//             x: {  
//                 type: 'time', // Use time scale for the x-axis  
//                 time: {  
//                     unit: 'day',  
//                     tooltipFormat: 'MMM D, YYYY', // Format for tooltips  
//                     displayFormats: {  
//                         day: 'MMM D' // Display format on the x-axis  
//                     }  
//                 },  
//                 title: {  
//                     display: true,  
//                     text: 'Date'  
//                 }  
//             },  
//             y: {  
//                 title: {  
//                     display: true,  
//                     text: 'Total Amount'  
//                 }  
//             }  
//         }  
//     }  
// });  

import Chart from 'chart.js';



        // Fetch transaction data from the API
        fetch('../api/trac_data')
            .then(response => response.json())
            .then(data => {
                // Extract dates and total amounts
                const dates = data.map(item => item.date);
                const totals = data.map(item => item.total);

                // Create the chart
                const ctx = document.getElementById('transactionChart').getContext('2d');
                const transactionChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Transaction Totals',
                            data: totals,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Transaction Chart'
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error(error));