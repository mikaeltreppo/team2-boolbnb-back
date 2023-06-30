/* Implementazione di Chart.js */
import Chart from 'chart.js/auto';

const ctx = document.getElementById('myChart');
const chartData = JSON.parse(ctx.dataset.chartData); // Ottieni i dati dal dataset

/* Impostazioni di default dei font */
Chart.defaults.font.family = "'Montserrat', sans-serif";
Chart.defaults.font.size = 14;
Chart.defaults.borderColor = "#f8f9fa";

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'], //Etichette asse X
    datasets: [{ //Set di dati
      borderColor: '#0c8599',
      label: 'Visite', //Legenda
      data: chartData, // Dati asse Y
      borderWidth: 3 //Spessore linea
    }]
  },
  options: {
    scales: {
      y: {

        beginAtZero: true //Include o meno in valore 0
      }
    }
  }
});