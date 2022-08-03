@extends('layouts.main')
@section('container')
    @include('partials.sidebar');
    <section class="home-section">
        <div
            class="pt-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Dashboard</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                {{-- <input type="text" id="reportrange" class="btn btn-secondary btn-sm dropdown-toggle" readonly> --}}

                {{-- <div class="btn-group ms-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div> --}}
                {{-- <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Time
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2">
                    <select class="form-select form-select-sm" id="list" onchange="getSelectValue()">
                        <option value="1">Sampah Node 1</option>
                        <option value="2">Sampah Node 2</option>
                    </select>
                </div>
                <canvas class="mt-4 w-100" id="myChart" width="900" height="190"></canvas>
                <span class="text-center">Start Date :</span>
                <input type="date" id="startdate" class="btn btn-secondary btn-sm col-lg-2 col-md-2"
                    onchange="filterData()">
                <span class="text-center">End Date :</span>
                <input type="date" id="enddate" class="btn btn-secondary btn-sm col-lg-2 col-md-2"
                    onchange="filterData()">
            </div>
            <div class="mb-4">
                <canvas class="my-4 w-100" id="myChart2" width="900" height="190"></canvas>
                <input type="date" id="startdate2" class="btn btn-secondary btn-sm" onchange="filterData2()">
                <input type="date" id="enddate2" class="btn btn-secondary btn-sm" onchange="filterData2()">
            </div>
        </div>
        {{-- <div>
            <canvas class="my-4 w-100" id="yourChart" width="900" height="380"></canvas>
        </div> --}}
        {{-- {{ $date1 }} --}}
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        function autoRefreshPage() {
            window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 600000);
    </script>
    <script src="https://github.com/chartjs/Chart.js/blob/master/docs/scripts/utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        let avgday1 = {!! json_encode($avgday1) !!};
        let day1pick = {!! json_encode($day1pick) !!};
        let avgday2 = {!! json_encode($avgday2) !!};
        let day2pick = {!! json_encode($day2pick) !!};

        // function getSelectValue() {
        //     var selectedValue = document.getElementById('list').value;
        //     if (selectedValue == 2) {
        //         let avgday1 = {!! json_encode($avgday2) !!};
        //         let day1pick = {!! json_encode($day2pick) !!};
        //     } else {
        //         let avgday1 = {!! json_encode($avgday1) !!};
        //         let day1pick = {!! json_encode($day1pick) !!};
        //     }
        //     // myChart.update();
        // }

        const dates = day1pick;
        const datapoint = avgday1;
        const data = {
            labels: dates,
            datasets: [{
                label: "Percentage of Nodes 1 ",
                backgroundColor: [
                    "rgb(68,78,63)",
                    "rgb(112,131,104)",
                ],
                borderColor: "rgb(98,130,159)",
                data: datapoint,
                tension: 0.1
            }, ],
        };


        const config = {
            type: "bar",
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
                },
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                    }
                }
            },
        };

        const myChart = new Chart(document.getElementById("myChart"), config);



        function filterData() {
            const dates1 = [...dates];

            const startdate = document.getElementById('startdate');
            const enddate = document.getElementById('enddate');

            const indexstartdate = dates1.indexOf(startdate.value);
            const indexenddate = dates1.indexOf(enddate.value);

            const filterDate = dates1.slice(indexstartdate, indexenddate + 1);

            myChart.config.data.labels = filterDate;

            const datapoint1 = [...datapoint];
            const filterDatapoint = datapoint1.slice(indexstartdate, indexenddate + 1);

            myChart.config.data.datasets[0].data = filterDatapoint;
            myChart.update();
        }
    </script>
    <script>
        const dates2 = day2pick;
        const datapoint2 = avgday2;

        const data2 = {
            labels: dates2,
            datasets: [{
                label: "Percentage of Nodes 2 ",
                backgroundColor: [
                    "rgb(77,99,96)",
                    "rgb(79,94,108)",
                ],
                borderColor: "rgb(77,99,96)",
                data: datapoint2,
                tension: 0.1
            }, ],
        };


        const config2 = {
            type: "bar",
            data: data2,
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
                },
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                    }
                }
            },
        };

        const myChart2 = new Chart(document.getElementById("myChart2"), config2);


        function filterData2() {
            const dates2a = [...dates2];

            const startdate2 = document.getElementById('startdate2');
            const enddate2 = document.getElementById('enddate2');

            const indexstartdate2 = dates2a.indexOf(startdate2.value);
            const indexenddate2 = dates2a.indexOf(enddate2.value);

            const filterDate2 = dates2a.slice(indexstartdate2, indexenddate2 + 1);

            myChart2.config2.data.labels = filterDate2;

            const datapoint2 = [...datapoint2];
            const filterDatapoint2 = datapoint2.slice(indexstartdate2, indexenddate2 + 1);

            myChart2.config2.data.datasets[0].data = filterDatapoint2;
            myChart2.update();
        }
    </script>
    {{-- <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                format: 'YYYY-MM-DD'
            }, cb);

            cb(start, end);

        });
    </script>
    <script>
        console.log(weekData2)
    </script> --}}
@endsection
