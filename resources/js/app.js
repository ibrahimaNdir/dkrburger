import './bootstrap';
import 'bootstrap'
import  'bootstrap/dist/css/bootstrap.css'

import Chart from 'chart.js/auto';
import $ from 'jquery';

document.addEventListener("DOMContentLoaded", function () {
    let ctx = document.getElementById('myChart').getContext('2d');
    let chart;

    function loadChart(year) {
        $.ajax({
            url: "/chart-data/" + year, // Nouvelle route pour AJAX
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (chart) {
                    chart.destroy();
                }

                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: 'Nombre de commandes',
                            data: response.data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            }
        });
    }

    // Charger le graphique avec l'année actuelle
    let selectedYear = $('#year').val();
    loadChart(selectedYear);

    // Mettre à jour le graphique au changement d'année
    $('#year').change(function () {
        let newYear = $(this).val();
        loadChart(newYear);
    });
});

