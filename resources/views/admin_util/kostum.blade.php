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

        .form-check-inline {
            display: flex;
            align-items: center;
        }

        .form-check-inline .form-check {
            margin-right: 10px; /* Adjust the spacing as needed */
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
                            <th class="status" id="status">Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
@endsection
@section('script')
    <script type="module" src="{{ asset('/js/admin_js/kostum_get.js') }}" ></script>
    <script type="text/javascript"> 
        var sizeLabels = {
            '3m': '3 - 6 bulan',
            '6m': '6 - 9 bulan',
            '9m': '9 - 12 bulan',
            '12m': '12 - 18 bulan',
            '18m': '18 - 24 bulan',
            '2t': '2 tahun',
            '3t': '3 tahun',
            '4t': '4 tahun',
            '5t': '5 tahun',
            'xs-a': 'Anak - XS',
            's-a': 'Anak - S',
            'm-a': 'Anak - M',
            'l-a': 'Anak - L',
            'xs-r': 'Remaja - XS',
            's-r': 'Remaja - S',
            'm-r': 'Remaja - M',
            'l-r': 'Remaja - L',
            'xs-w': 'Wanita - XS',
            's-w': 'Wanita - S',
            'm-w': 'Wanita - M',
            'l-w': 'Wanita - L',
            'xl-w': 'Wanita - XL',
            'xs-p': 'Pria - XS',
            's-p': 'Pria - S',
            'm-p': 'Pria - M',
            'l-p': 'Pria - L',
            'xl-p': 'Pria - XL',
        };

        function getSizeLabel(size) {
            return sizeLabels[size] || size;
        }
        
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
                            // Split the concatenated images string and get the first image
                            var firstImage = data ? data.split(',')[0] : '';
                            return '<img src="'+firstImage+'" style="max-width: 100px;">'; 
                        }
                    }, 
                    {data: 'name', name: 'nama'}, 
                    {data: 'size', name: 'ukuran',
                            render: function (data, type, row, meta) {
                            return getSizeLabel(data);
                        }
                    }, 
                    {data: 'description', name: 'deskripsi'}, 
                    {data: 'categories', name: 'categories'}, 
                    {data: 'price', name: 'harga',
                        render: function(data, type, row) {
                            return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                        }
                    },
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ],
                initComplete: function () {
                    var categoriesColumn = this.api().column('.categories');
                    var statusColumn = this.api().column('.status');

                    // Create a select element for categories
                    var categoriesSelect = $('<select><option value="">All</option></select>')
                        .appendTo($('#categories').empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            categoriesColumn.search(val ? `(^|,\\s*)${val}(,\\s*|$)` : '', true, false).draw();
                        });

                    // Create a set to store unique categories
                    var uniqueCategories = new Set();

                    // Iterate through each row's categories and split them by comma
                    categoriesColumn.data().each(function (d, j) {
                        var categories = d.split(', ');
                        categories.forEach(function (category) {
                            uniqueCategories.add(category);
                        });
                    });

                    // Add each unique category to the select dropdown
                    uniqueCategories.forEach(function (category) {
                        categoriesSelect.append('<option value="' + category + '">' + category + '</option>');
                    });

                    // Create a select element for status
                    var statusSelect = $('<select><option value="">All</option><option value="0">Ready</option><option value="1">Belum Ready</option><option value="2">Dipinjam</option><option value="3">Perbaikan / Cuci</option><option value="4">Tidak ada</option></select>')
                        .appendTo($('#status').empty())
                        .on('change', function () {
                            var val = $(this).val();
                            $.fn.dataTable.ext.search.push(
                                function(settings, data, dataIndex) {
                                    var status = $(table.row(dataIndex).node()).find('div[data-status]').data('status');
                                    if (val === "" || status == val) {
                                        return true;
                                    }
                                    return false;
                                }
                            );
                            table.draw();
                            $.fn.dataTable.ext.search.pop();
                        });
                }
            });

            $('#table').on('change', '.form-check-input', function () {
                var costumeId = $(this).attr('name').replace('status', '');
                console.log("costume id:", costumeId);
                var status = $(this).val();
                console.log("status:", status);

                $.ajax({
                    url: '{{ route("kostum.updateStatus", ":id_costume") }}'.replace(':id_costume', costumeId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Status updated successfully');
                            table.ajax.reload();
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });

            // Handle delete button click
            // $('#table').on('click', '.delete', function(event) {
            //     event.preventDefault();

            //     if (!confirm('Are you sure?')) {
            //         return;
            //     }

            //     var costumeId = $(this).data('id');

            //     $.ajax({
            //         url: '{{ route("kostum.deleteCostume", ":id_costume") }}'.replace(':id_costume', costumeId),
            //         method: 'DELETE',
            //         data: {
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 alert('Costume deleted successfully');
            //                 table.ajax.reload();
            //             } else {
            //                 alert('Failed to delete costume');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             alert('Error: ' + error);
            //         }
            //     });
            // });
        });
    </script>
@endsection