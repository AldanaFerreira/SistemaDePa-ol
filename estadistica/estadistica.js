window.addEventListener('DOMContentLoaded', () => {
    // Gráfico circular
    const ctxPie = document.getElementById('graficoCircular').getContext('2d');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: categorias,
            datasets: [{
                data: stockCategorias,
                backgroundColor: ['#0056b3','#4da6ff','#99ccff','#ff9933','#ff6666','#33cc33'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Gráfico de línea (tendencia de consumo)
    const ctxLine = document.getElementById('graficoLinea').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: meses,
            datasets: [{
                label: 'Consumo',
                data: consumo,
                borderColor: '#0d3b66',
                fill: false,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
});
