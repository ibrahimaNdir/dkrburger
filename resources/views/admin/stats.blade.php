@extends('admin.sidebar')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Statistiques des Commandes</title>

    <!-- Custom fonts & styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    @vite(['resources/css/acceuil/style.css',
    'resources/css/acceuil/style.scss',
    'resources/css/acceuil/responsive.css',
    'resources/js/index/custom.js',
    'resources/js/index/bootstrap.js',
    'resources/css/acceuil/bootstrap.css',
    'resources/css/chart.css'])

    <!-- Utiliser UNE SEULE version de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <style>
        /* CSS pour centrer le contenu */
        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            margin: 0 auto;
        }

        .chart-container {
            width: 100%;
            max-width: 800px; /* Ajustez selon vos besoins */
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>


<body id="page-top">
<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid centered-content">
                <h1 class="h3 mb-2 text-gray-800 text-center">Statistiques des Commandes</h1>
                <p class="mb-4 text-center">Données des commandes enregistrées en {{ $currentYear }}.</p>

                <div class="chart-container">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Évolution des commandes</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area" style="height: 300px;">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Stocker les données dans une variable pour débogage
    var chartData = {!! $chartData !!};
    console.log("Données du graphique :", chartData);

    // Attendre que le DOM soit complètement chargé
    document.addEventListener("DOMContentLoaded", function() {
        // S'assurer que le canvas existe
        var canvas = document.getElementById("myAreaChart");
        if (!canvas) {
            console.error(" Canvas non trouvé!");
            return;
        }

        // Obtenir le contexte 2D
        var ctx = canvas.getContext("2d");
        if (!ctx) {
            console.error("Impossible d'obtenir le contexte 2D!");
            return;
        }

        // Créer le graphique avec options améliorées
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Nombre de commandes',
                    data: chartData.data,
                    lineTension: 0.3,
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHitRadius: 10,
                    borderWidth: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            maxTicksLimit: 10,
                            padding: 10
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: true
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10
                }
            }
        });
    });
</script>
</body>
</html>
@endsection
