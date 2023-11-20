@extends('layouts.app')

@section('content')

<style>
    body {
        background-image: url('https://cdn.wallpapersafari.com/96/26/uHjPSz.jpg'); /* Sostituisci 'path/to/your/image.jpg' con il percorso dell'immagine */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100vh; /* Imposta l'altezza al 100% della viewport */
        margin: 0; /* Rimuovi il margine per evitare spazi bianchi attorno all'immagine */
    }

    .container {
        z-index: 1; /* Assicura che il contenuto sia sovrapposto all'immagine di sfondo */
        position: relative;
    }

    .card {
        background: rgba(255, 255, 255, 0.8); /* Aggiungi uno sfondo semi-trasparente alla card per rendere il testo più leggibile */
    }
</style>

<div class="container-fluid mt-4 text-center">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h1 class="mb-2 gold-text">Statistiche</h1>
        </div>
    </div>

    <div class="row">
        {{-- tabella ordini mesi --}}
        <div class="col-lg-6 col-12 mb-4">
            <canvas id="monthOrderChart" class="bg-white"></canvas>
        </div>

        {{-- tabella profitti mesi --}}
        <div class="col-lg-6 col-12 mb-4">
            <canvas id="monthProfitChart" class="bg-white"></canvas>
        </div>
    </div>

    <div class="row">
        {{-- tabella ordini anni --}}
        <div class="col-lg-6 col-12 mb-4">
            <canvas id="yearOrderChart" class="bg-white"></canvas>
        </div>

        {{-- tabella profitti anni --}}
        <div class="col-lg-6 col-12 mb-4">
            <canvas id="yearProfitChart" class="bg-white"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- script tabella ordini anni --}}
    <script>
        (async function () {
            const data = {{ Js::from($chartData)}};

            console.log(data);

            new Chart(
                document.getElementById('yearOrderChart'),
                {
                    type: 'bar',
                    options: {
                        maintainAspectRatio: false,
                        aspectRatio: 1
                    },
                    data: {
                        datasets: [
                            {
                                label: 'Numero ordini ricevuti per anno',
                                data: data.ordersYear
                            }
                        ],
                        labels: ['2023', '2024', '2025', '2026'],
                    }
                }
            );
        })();
    </script>

    {{-- script tabella profitti anni --}}
    <script>
        (async function () {
            const data = {{ Js::from($chartData)}};

            console.log(data);

            new Chart(
                document.getElementById('yearProfitChart'),
                {
                    type: 'bar',
                    options: {
                        maintainAspectRatio: false,
                        aspectRatio: 1
                    },
                    data: {
                        datasets: [
                            {
                                label: 'Guadagno in euro per anno',
                                data: data.profitYear,
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            }
                        ],
                        labels: ['2023', '2024', '2025', '2026'],
                    }
                }
            );
        })();
    </script>

    {{-- script tabella ordini mesi --}}
    <script>
        (async function () {
            const data = {{ Js::from($chartData)}};

            console.log(data);

            new Chart(
                document.getElementById('monthOrderChart'),
                {
                    type: 'bar',
                    options: {
                        maintainAspectRatio: false,
                        aspectRatio: 1
                    },
                    data: {
                        datasets: [
                            {
                                label: 'Numero ordini ricevuti per mese',
                                data: data.ordersMonth
                            }
                        ],
                        labels: ['November', 'December', 'January', 'February']
                    }
                }
            );
        })();
    </script>

    {{-- script tabella profitti mesi --}}
    <script>
        (async function () {
            const data = {{ Js::from($chartData)}};

            console.log(data);

            new Chart(
                document.getElementById('monthProfitChart'),
                {
                    type: 'bar',
                    options: {
                        maintainAspectRatio: false,
                        aspectRatio: 1
                    },
                    data: {
                        datasets: [
                            {
                                label: 'Guadagno in euro per mese',
                                data: data.profitMonth,
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            }
                        ],
                        labels: ['November', 'December', 'January', 'February'],
                    }
                }
            );
        })();
    </script>
</div>
@endsection
