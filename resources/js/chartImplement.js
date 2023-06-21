/* Implementazione di Chart.js */
import Chart from 'chart.js/auto';

const ctx = document.getElementById('myChart');

/* Impostazioni di default dei font */
Chart.defaults.font.family = "'Montserrat', sans-serif";
Chart.defaults.font.size = 14;
Chart.defaults.borderColor = "#fff";

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mav', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'], //Etichette asse X
    datasets: [{ //Set di dati
      borderColor: '#0c8599',
      label: 'Visite', //Legenda
      data: [12, 19, 3, 5, 22, 3, 6, 14, 28, 2, 11, 13], // Dati asse Y
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