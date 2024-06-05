@extends('admin_layouts.master')
@section('title')
    <style>
        .add-btn {
            background-color: var(--main);
            padding: 8px 16px 8px 16px;
            border-radius: 5px;
            border: 2px solid black;
            text-decoration: none;
            color: black;
            font-weight: 600;
        }

        .add-ctr a:hover {
            color: black;
        }

        .add-ctr i {
            margin-left: 8px;
        }

        .add-ctr {
            margin: 24px 0 16px 0;
        }

        h1 {
            margin: 16px 0 16px 0;
        }
    </style>
    <title>GK Tambah Kostum</title>
@endsection
@section('main')
        <h1>Daftar Kostum</h1>
            <div class="search-kostum" style="margin-top: 16px;">
                <div class="add-ctr">
                    <a class="add-btn" href="{{ Route('getAddCostume') }}" 
                        style="color: black; background-color: var(--main); padding: 8px 16px 8px 16px; border-radius: 5px; border: 2px solid black; 
                        text-decoration: none; font-weight: 600;">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="table-kostum" style="margin-top: 16px;">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>Image</th>
                            <th>Nama</th> 
                            <th>Size</th> 
                            <th>Description</th> 
                            <th class="categories" id="categories">Category</th> 
                            <th>Price</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
@endsection
@section('script')
    <script type="module" src="{{ asset('/js/admin_js/kostum_get.js') }}" ></script>
    <script type="text/javascript"> 
        $(function () { 
            var table = $('#table').DataTable({ 
                processing: true, 
                serverside: true, 
                ajax: { 
                    url: "{{ route('kostum.getCompleteCostume') }}"
                }, 
                columns: [ 
                    {data: 'id_costume', name: 'id'},
                    {data: 'images', name: 'image', 
                    render: function(data, type, row, meta) { 
                            console.log('Images data:', data); // Log the data to the console

                            // Split the concatenated images string and get the first image
                            var firstImage = data ? data.split(',')[0] : '';
                            return '<img src="'+firstImage+'" style="max-width: 100px;">'; 
                        }
                    }, 
                    {data: 'name', name: 'nama'}, 
                    {data: 'size', name: 'ukuran'}, 
                    {data: 'description', name: 'deskripsi'}, 
                    {data: 'categories', name: 'categories'}, 
                    {data: 'price', name: 'harga'},
                    {data: 'action', name: 'action'}
                ],
                initComplete: function () {
                    this.api().columns('.categories').every(function () {
                        var column = this;
                        var select = $('<select><option value="">All</option></select>')
                            .appendTo($('#categories').empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? `(^|,\\s*)${val}(,\\s*|$)` : '', true, false).draw();
                            });

                        // Create a set to store unique categories
                        var uniqueCategories = new Set();

                        // Iterate through each row's categories and split them by comma
                        column.data().each(function (d, j) {
                            var categories = d.split(', ');
                            categories.forEach(function (category) {
                                uniqueCategories.add(category);
                            });
                        });

                        // Add each unique category to the select dropdown
                        uniqueCategories.forEach(function (category) {
                            select.append('<option value="' + category + '">' + category + '</option>');
                        });
                    });
                }
            });

            // Handle delete button click
            $('#table').on('click', '.delete', function(event) {
                event.preventDefault();

                if (!confirm('Are you sure?')) {
                    return;
                }

                var costumeId = $(this).data('id');

                $.ajax({
                    url: '{{ route("kostum.deleteCostume", ":id_costume") }}'.replace(':id_costume', costumeId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Costume deleted successfully');
                            table.ajax.reload();
                        } else {
                            alert('Failed to delete costume');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });
        });
    </script>
@endsection