var ctx1 = document.querySelector(".chart-1");
const chart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['ONESIE Pig', 'PRINCESS JASMINE', 'HERO Thor', 'INTER Sparta', 'CHAR Avatar'],
        datasets: [
            {
                label: 'Dataset 1',
                data: [1, 3, 5, 2, 5],
                backgroundColor: [
                    'rgba(240, 112, 134, 1)'
                ]
            }
        ]
    }, options: {
        responsive: true,
    }
});

var ctx2 = document.querySelector(".chart-2");
const chart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['PRINCESS Cinderella', 'PRINCESS Belle', 'HERO Thor', 'INTER China', 'INTER Eropa', 
        'HERO Spiderman', 'HERO Captain America', 'CHAR Raja', 'CHAR Ratu'],
        datasets: [
            {
                label: 'Dataset 1',
                data: [600, 500, 400, 300, 200, 100, 90, 80, 70],
                backgroundColor: [
                    'rgba(10, 15, 118, 1)'
                ]
            }
        ]
    }, options: {
        responsive: true,
    }
});