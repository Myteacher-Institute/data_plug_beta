import Chart from 'chart.js/auto';

// const dataSet = JSON.parse('{!! json_encode($data) !!}');
// const labelsec = JSON.parse('@json($labels)');
// const datasetData = JSON.parse('{!! json_encode($datasetData) !!}');

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

// var transactions = @json({$transactions});  
// console.log(transactions); 

const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: /*dataSet*/ [0, 10, 5, 2, 20, 30, 45],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);
