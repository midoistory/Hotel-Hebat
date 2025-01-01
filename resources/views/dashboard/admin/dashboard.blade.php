@extends('dashboard.admin.template')

@section('title-web', 'Dashboard')
@section('title-content', 'Dashboard')
@section('content')
    <!-- Donut Chart for Room Availability -->
    <div class="max-w-sm w-full items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="flex justify-between mb-3">
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Ketersediaan Ruangan
            </p>
        </div>

        <!-- Donut Chart -->
        <div class="py-6" id="donut-chart"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const getChartOptions = () => {
            return {
                series: [{{ $tersedia }}, {{ $terisi }}, {{ $pemeliharaan }}],
                colors: ["#0694a2", "#ac94fa", "#e02424"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    offsetY: 20,
                                },
                                value: {
                                    show: true,
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value + " Kamar";
                                    },
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Total Kamar",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b;
                                        }, 0);
                                        return sum + ' Kamar';
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Tersedia", "Terisi", "Pemeliharaan"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                },
            };
        };

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
            chart.render();
        }
    </script>

    <style>
        #donut-chart {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>

@endsection
