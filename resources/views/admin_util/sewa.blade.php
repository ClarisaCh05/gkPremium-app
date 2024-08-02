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
                        <th>Pinjam</th>
                        <th>Pengembalian</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $rent)
                        <tr>
                            <td>{{ $rent->id_rent }}</td>
                            <td>{{ $rent->name }}</td>
                            <td>{{ $rent->description }}</td>
                            <td>{{ $rent->created_at }}</td>
                            <td>{{ $rent->ended_at }}</td>
                            {{-- <td>
                                <div class="d-flex">
                                    <a href="javascript:void(0)" data-id="{{ $rent->id_rent }}" class="delete btn btn-danger btn-sm btn-icon rounded-circle mr-1 mb-1">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td> --}}
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
                    <br>
                    <button id="last3months" class="btn btn-primary">Last 3 Months</button>
                    <button id="last6months" class="btn btn-primary">Last 6 Months</button>
                    <button id="lastyear" class="btn btn-primary">Last Year</button>
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
            <div class="col chart-container">
                <div class="divCharts">
                    <select id="viewLimitSelect" class="form-select" style="width: 150px;">
                        <option value="-1">All</option>
                        <option value="10">Top 10</option>
                        <option value="30">Top 30</option>
                        <option value="50">Top 50</option>
                        <option value="100">Top 100</option>
                    </select>
                    <canvas class="chart-2"></canvas>
                </div>
            </div>
        </div>
        <div class="row chart-container">
            <select id="viewIntervalSelect" class="form-select" style="width: 150px;">
                <option value="daily">Daily</option>
                <option value="monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
                <option value="yearly">Yearly</option>
            </select>
            <canvas class="chart-6"></canvas>
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
            <div class="row chart-interest">
                <div class="col-md-6 chart-fac">
                    <select id="askedIntervalSelect" class="form-select" style="width: 150px;">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="yearly">Yearly</option>
                    </select>                
                    <canvas class="chart-5"></canvas>
                </div>
                <div class="col-md-6 chart-interest">
                    <canvas class="chart-4"></canvas>
                </div>
            </div>
        </div>        
        <div class="row search-chart">
            <div class="detail-home">
                <h3>Most Search</h3>
            </div>
            <div class="row chart-search">
                <div class="col-md-2">
                    <select id="intervalSearchSelect" class="form-select" style="width: 150px;">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="typeSearchSelect" class="form-select" style="width: 150px;">
                        <option value="search">Search</option>
                        <option value="category">Category</option>
                        <option value="theme">Theme</option>
                        <option value="color">Color</option>
                    </select>
                </div>
                <canvas class="chart-7"></canvas>
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

        function getDateRange(monthsAgo) {
            let endDate = moment();
            let startDate = moment().subtract(monthsAgo, 'months');
            return { startDate: startDate.format('YYYY-MM-DD'), endDate: endDate.format('YYYY-MM-DD') };
        }

        $('#last3months').on('click', function() {
            let range = getDateRange(3);
            fetchRentalStats(range.startDate, range.endDate);
        });

        $('#last6months').on('click', function() {
            let range = getDateRange(6);
            fetchRentalStats(range.startDate, range.endDate);
        });

        $('#lastyear').on('click', function() {
            let range = getDateRange(12);
            fetchRentalStats(range.startDate, range.endDate);
        });

        //viewed costume
        var ctx2 = document.querySelector(".chart-2");
        const chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: [], // Initially empty, will be updated
                datasets: [
                    {
                        label: 'Views',
                        data: [], // Initially empty, will be updated
                        backgroundColor: [
                            'rgba(10, 15, 118, 0.4)',
                            'rgba(101, 215, 118, 0.4)',
                            'rgba(210, 10, 218, 0.4)',
                            'rgba(210, 215, 118, 0.4)',
                            'rgba(50, 10, 18, 0.4)'
                        ],
                        borderColor: [
                            'rgba(10, 15, 118, 1)',
                            'rgba(101, 215, 118, 1)',
                            'rgba(210, 10, 218, 1)',
                            'rgba(210, 215, 118, 1)',
                            'rgba(50, 10, 18, 1)'
                        ],
                        fill: false // Ensure the line is not filled
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        min: 0,
                        max: 6
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Views'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Views'
                    }
                }
            }
        });

        function scroller(scroll, chart) {
            console.log(scroll)
            //let min = chart2.config.options.scales.x.min;
            const dataLength = chart2.data.labels.length;
            if(scroll.deltaY > 0) {
                if(chart2.config.options.scales.x.max >= dataLength) {
                    chart2.config.options.scales.x.min = dataLength - 7;
                    chart2.config.options.scales.x.max = dataLength - 1;
                } else {
                    chart2.config.options.scales.x.min += 1;
                    chart2.config.options.scales.x.max += 1;
                }
            }else if(scroll.deltaY < 0) {
                if(chart2.config.options.scales.x.min <= 0) {
                    chart2.config.options.scales.x.min = 0;
                    chart2.config.options.scales.x.max = 6;
                } else {
                    chart2.config.options.scales.x.min -= 1;
                    chart2.config.options.scales.x.max -= 1;
                }
            } else {

            }

            chart2.update();
        }

        chart2.canvas.addEventListener('wheel', (e) => {
            scroller(e, chart2);
        });

        // Fetch top viewed costumes
        function fetchTopViewedCostumes(limit) {
            fetch(`{{ route('costumes.top-viewed') }}?limit=${limit}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched data:', data); // Log the fetched data

                    const labels = data.map(costume => costume.name);
                    const views = data.map(costume => costume.views);

                    console.log('Labels:', labels); // Log labels
                    console.log('Views:', views);   // Log views

                    chart2.data.labels = labels;
                    chart2.data.datasets[0].data = views;
                    chart2.update();
                })
                .catch(error => console.error('Error fetching top viewed costumes:', error));
        }
        
        // Initial fetch - default to all
        fetchTopViewedCostumes(-1);

        // Add event listener to select element for changing view limits
        document.getElementById('viewLimitSelect').addEventListener('change', function () {
            const selectedLimit = this.value;
            fetchTopViewedCostumes(selectedLimit);
        });

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
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Costumes',
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
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Interest'
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
                const filteredData = data.filter(costume => costume.interest > 0); // Filter out zero interest costumes
                const labels = filteredData.map(costume => costume.name);
                const interest = filteredData.map(costume => costume.interest);

                chartInterest.data.labels = labels;
                chartInterest.data.datasets[0].data = interest;
                chartInterest.update();
            })
            .catch(error => console.error('Error fetching top viewed costumes:', error));
    
        // Fetch Frequently Asked Question
        var ctx = document.querySelector(".chart-5");
        const chartFrequentlyAsked = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Views',
                    data: [],
                    backgroundColor: 'rgba(250, 150, 12, 0.2)',
                    borderColor: 'rgba(250, 150, 12, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Costume Name'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Views'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Interests'
                    }
                }
            }
        });

        // Fetch Frequently Asked Costumes
        function fetchFrequentlyAskedCostumes(interval) {
            fetch('{{ route('costumes.frequentlyAsked') }}?interval=' + interval)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched data asked:', data);

                    // Process data for Chart.js
                    const labels = data.map(item => item.costume_name);
                    const asked = data.map(item => item.total_asked);

                    chartFrequentlyAsked.data.labels = labels;
                    chartFrequentlyAsked.data.datasets[0].data = asked;
                    chartFrequentlyAsked.update();
                })
                .catch(error => console.error('Error fetching frequently asked costumes:', error));
        }

        // Initial fetch - default to monthly interval
        fetchFrequentlyAskedCostumes('monthly');

        // Add event listener to select element for changing intervals of frequently asked costumes
        document.getElementById('askedIntervalSelect').addEventListener('change', function () {
            const selectedInterval = this.value;
            fetchFrequentlyAskedCostumes(selectedInterval);
        });

        // Fetch Frequently Viewed Costumes
        var ctx = document.querySelector(".chart-6");
        const chartFrequentlyViewed = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Views',
                    data: [],
                    backgroundColor: 'rgba(150, 20, 19, 0.2)',
                    borderColor: 'rgba(150, 20, 19, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Costume Name'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Views'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Views'
                    }
                }
            }
        });

        function fetchFrequentlyViewedCostumes(interval) {
            fetch('{{ route('costumes.frequentlyViewed') }}?interval=' + interval)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched data viewed:', data);

                    // Process data for Chart.js
                    const labels = data.map(item => item.costume_name);
                    const viewed = data.map(item => item.total_views);

                    chartFrequentlyViewed.data.labels = labels;
                    chartFrequentlyViewed.data.datasets[0].data = viewed;
                    chartFrequentlyViewed.update();
                })
                .catch(error => console.error('Error fetching frequently viewed costumes:', error));
        }

        // Initial fetch - default to monthly interval
        fetchFrequentlyViewedCostumes('monthly');

        // Add event listener to select element for changing intervals of frequently viewed costumes
        document.getElementById('viewIntervalSelect').addEventListener('change', function () {
            const selectedInterval = this.value;
            fetchFrequentlyViewedCostumes(selectedInterval);
        });

        //fetch search history
        var ctx = document.querySelector(".chart-7");
        const searchHistory = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Search Count',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Searches'
                    }
                }
            }
        });

        function fetchSearchHistory(interval, type) {
            fetch(`{{ route('searchHistory.getSearchHistoryData') }}?interval=${interval}&type=${type}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched data searched:', data);

                    // Process data for Chart.js
                    let labels = [];
                    let counts = [];

                    data.forEach(item => {
                        labels.push(item.type);
                        counts.push(item.count);
                    });

                    searchHistory.data.labels = labels;
                    searchHistory.data.datasets[0].data = counts;
                    searchHistory.update();

                })
                .catch(error => console.error('Error fetching search history:', error));
        }

        // Initial fetch - default to monthly interval
        fetchSearchHistory('daily', 'search');

        // Add event listener to select elements for changing intervals and types
        document.getElementById('intervalSearchSelect').addEventListener('change', function () {
            const selectedInterval = this.value;
            const selectedType = document.getElementById('typeSearchSelect').value;
            fetchSearchHistory(selectedInterval, selectedType);
        });

        document.getElementById('typeSearchSelect').addEventListener('change', function () {
            const selectedType = this.value;
            const selectedInterval = document.getElementById('intervalSearchSelect').value;
            fetchSearchHistory(selectedInterval, selectedType);
        });

    });
            
    </script>
@endsection
