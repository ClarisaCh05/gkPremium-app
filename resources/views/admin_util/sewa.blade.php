@extends('admin_layouts.master')
@section('css')
    <style>
        .table-sewa h3{
            margin: 16px 0 16px 0;
        }

        .table-sewa {
            margin-bottom: 16px;
        }

        .add-btn {
            margin: 16px 0 24px 0;
            text-align: right;
        }

        .add-btn a {
            background-color: var(--main);
            border: 2px solid black;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            padding: 12px;
        }

        .date-picker input {
            padding: 5px 8px 7px 8px;
            border: 1px solid lightgrey;
            border-radius: 5px;
            width: 40%;
        }

        .chart {
            margin-top: 24px;
        }

        .category-chart {
            margin-top: 24px;
        }

        canvas {
            margin-bottom: 16px;
        }
    </style>
@endsection 
@section('main')
    <div class="container">
        <h1>Home</h1>
        <div class="table-sewa">
            <h3>Sewa Hari ini / <span class="tanggal"></span></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kostum</th>
                        <th>Tambahan</th>
                        <th>Creted Date</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $rent)
                        <tr>
                            <td>{{ $rent->id_rent }}</td>
                            <td>{{ $rent->name }}</td>
                            <td>{{ $rent->description }}</td>
                            <td>{{ $rent->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="javascript:void(0)" data-id="{{ $rent->id_rent }}" class="delete btn btn-danger btn-sm btn-icon rounded-circle mr-1 mb-1">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No rents found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="add-btn">
            <a href="{{ route('sewa') }}">Tambah<i class="fas fa-plus"></i></a>
        </div>
        <div class="chart">
            <div class="row detail-home">
                <div class="col date-picker">
                    <h3>Rekap Kostum Disewa Per Hari</h3>
                    <input type="text" class="form-control" id="daterange" />
                </div>
            </div>
            <div class="chart-container">
                <canvas class="chart-1"></canvas>
            </div>
        </div>
        <div class="row chart">
            <div class="detail-home">
                <h3>Kostum yang Sering Dilihat</h3>
            </div>
            <div class="chart-container">
                <canvas class="chart-2"></canvas>
            </div>
        </div>
        <div class="row category-chart">
            <div class="detail-home">
                <h3>Kategori yang Terpopuler</h3>
            </div>
            <div class="chart-category">
                <canvas class="chart-3"></canvas>
            </div>
        </div>
        <div class="row interest-chart">
            <div class="detail-home">
                <h3>Kostum yang Sering Ditanyakan</h3>
            </div>
            <div class="chart-category">
                <canvas class="chart-4"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var today = moment().format('DD-MM-YYYY');
        $('.tanggal').text(today);

        $('#daterange').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            fetchRentalStats(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        });

        var ctx1 = document.querySelector(".chart-1");
        const chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Rentals',
                        data: [],
                        backgroundColor: [
                            'rgba(240, 112, 134, 1)'
                        ]
                    }
                ]
            }, options: {
                responsive: true,
            }
        });

        function fetchRentalStats(startDate, endDate) {
            $.ajax({
            url: '{{ route('rentals.stats') }}',
            method: 'GET',
            data: {
                start_date: startDate, 
                end_date: endDate,
            },
            success: function(response) {
                updateChart(chart1, response);
            },
            error: function(error) {
                console.error("There was an error fetching rental stats: ", error);
            }
            });
        }

        function updateChart(chart, data) {
            console.log('Fetched data:', data);
            var labels = data.map(function(item) { return item.name; });
            var rentCounts = data.map(function(item) { return item.rent_count; });

            chart.data.labels = labels;
            chart.data.datasets[0].data = rentCounts;
            chart.update();
        }

        var ctx2 = document.querySelector(".chart-2");
        const chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Views',
                        data: [],
                        backgroundColor: [
                            'rgba(10, 15, 118, 1)'
                        ]
                    }
                ]
            }, options: {
                responsive: true,
            }
        });

        // Fetch top viewed costumes
        fetch('{{ route('costumes.top-viewed') }}')
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Fetched data:', data);
                const labels = data.map(costume => costume.name);
                const views = data.map(costume => costume.views);

                chart2.data.labels = labels;
                chart2.data.datasets[0].data = views;
                chart2.update();
            })
            .catch(error => console.error('Error fetching top viewed costumes:', error));


        //category
        var ctx = document.querySelector(".chart-3");
        const chartCategory = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Categories',
                        data: [],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fetch top categories
        fetch('{{ route('costumes.top-categories') }}')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data);
                const labels = data.map(category => category.category);
                const counts = data.map(category => category.category_count);

                chartCategory.data.labels = labels;
                chartCategory.data.datasets[0].data = counts;
                chartCategory.update();
            })
            .catch(error => console.error('Error fetching top categories:', error));
        
        // Interest
        var ctx = document.querySelector(".chart-4");
        const chartInterest = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Categories',
                        data: [],
                        backgroundColor: [
                            'rgba(100, 80, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(100, 80, 192, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fetch top interesting costumes
        fetch('{{ route('costumes.topInterest') }}')
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('Fetched data:', data);
                const labels = data.map(costume => costume.name);
                const interest = data.map(costume => costume.interest);

                chartInterest.data.labels = labels;
                chartInterest.data.datasets[0].data = interest;
                chartInterest.update();
            })
            .catch(error => console.error('Error fetching top viewed costumes:', error));

    });
            
    </script>
@endsection
