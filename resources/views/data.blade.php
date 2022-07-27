@extends('layouts.main')
@section('container')
    @include('partials.sidebar');
    <section class="home-section">
        <div
            class="pt-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Dashboard</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        <div>
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </div>
        {{-- <div>
            <canvas class="my-4 w-100" id="yourChart" width="900" height="380"></canvas>
        </div> --}}
        {{ $date1 }}
    </section>
@endsection
@section('script')
    <script src="https://github.com/chartjs/Chart.js/blob/master/docs/scripts/utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = ["2022-07-25 14:41:17", "2022-07-25 15:36:04", "2022-07-25 16:36:04", "2022-07-25 17:36:03",
            "2022-07-25 18:36:03", "2022-07-25 19:36:03", "2022-07-26 10:19:57", "2022-07-26 12:05:44",
            "2022-07-26 13:05:44", "2022-07-26 14:05:44", "2022-07-26 15:05:44", "2022-07-26 16:05:44",
            "2022-07-26 17:05:44", "2022-07-26 18:05:44", "2022-07-26 19:05:44", "2022-07-26 20:05:44",
            "2022-07-26 21:05:43", "2022-07-26 23:05:43", "2022-07-27 00:05:43", "2022-07-27 09:05:43",
            "2022-07-27 10:05:42"
        ];
        // const labels = ["January", "February", "March", "April", "May", "June"];

        const data = {
            labels: labels,
            datasets: [{
                    label: "Node 1 ",
                    backgroundColor: "rgb(98,130,159)",
                    borderColor: "rgb(98,130,159)",
                    data: {{ $percent1 }},
                    tension: 0.1
                },
                {
                    label: "Node 2",
                    backgroundColor: "rgb(77,99,96)",
                    borderColor: "rgb(77,99,96)",
                    data: {{ $percent2 }},
                    tension: 0.1
                },
            ],
        };

        const config = {
            type: "line",
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Volume Sampah'
                    }
                }
            },
        };

        const myChart = new Chart(document.getElementById("myChart"), config);
    </script>
    {{-- <script>
        var a = {{ $date1 }};
        console.log(a);
        const myChart = new Chart(document.getElementById("yourChart"), config);
    </script> --}}
    {{-- <script>
        var canvas = document.getElementById('myChart');
        var data = {
            labels: {{ $data }},
            datasets: [{
                    label: "Daya Listrik",
                    fill: true,
                    lineTension: 0.1,
                    backgroundColor: "rgba(105, 0, 132, .2)",
                    borderColor: "rgba(200, 99, 132, .7)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(200, 99, 132, .7)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                    pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: {{ $node }},
                }

            ]
        };

        var option = {
            showLines: true,
            animation: {
                duration: 0
            }
        };

        var myLineChart = Chart.Line(canvas, {
            data: data,
            options: option
        });
    </script> --}}
@endsection
