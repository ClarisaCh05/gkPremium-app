@extends('admin_layouts.master')
@section('css')
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
    </style>
@endsection
@section('main')
    <div class="container">
        <div class="row search-bar">
            <h1>Daftar Testimoni</h1>
            <div class="col">
                <div class="add-ctr">
                    <a class="add-btn" href="{{ route('testimoni.tambahTestimoni') }}">
                        Tambah
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row table-testimoni">
            <div class="table-kostum">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Keterangan</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            var table = $('#table').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{ route('testimoni.testimoni') }}",
                },
                columns: [
                    { data: 'imageUrl', name: 'Foto',
                        render: function (data, type, row, meta) {
                            return '<img src="'+data+'" style="max-width: 100px;">'
                        }
                    },
                    { data: 'name', name: 'Judul'},
                    { data: 'description', name: 'Keterangan' },
                    { data:'action', name:'action'}
                ],
            })
        })

        $('#table').on('click', '.delete', function(e) {
            e.preventDefault();

            if (!confirm('Are you sure?')) {
                return;
            }

            var testimoni_id = $(this).data('id');

            $.ajax({
                url: '{{ route("testimoni.deleteTestimoni", ":id_testimoni") }}'.replace(':id_testimoni', testimoni_id),
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        alert('Testimoni deleted successfully');
                        table.ajax.reload();
                    } else {
                        alert('Failed to delete testimoni');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            })
        })
    </script>
@endsection