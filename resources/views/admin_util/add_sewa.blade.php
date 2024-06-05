@extends('admin_layouts.master')
@section('css')
    <style>
        .input-form {
            border: 1px solid black;
            padding: 8px 0 8px 16px;
        }

        .add-sewa input {
            padding: 8px;
        }

        .add-sewa p {
            margin: 16px 0 8px 0 !important;
        }

        .add-sewa select {
            padding: 8px;
        }

        .add-sewa textarea {
            padding: 8px;
        }
    </style>
@endsection
@section('main')
    <div class="container add-sewa">
        <div class="col title">
            <a href="{{ route('homeAdmin') }}">
                <i class="fas fa-angle-left"></i>
                <h1>Tambah Data Sewa</h1>
            </a>
        </div>
        <div class="row">
            <div class="col table-sewa">
                <table class="table table-bordered" id="table">
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
                        @forelse ($rentedData as $rent)
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
            <div class="col col-input">
                <div class="input-form">
                    <form id="tambah-sewa-form" method="POST" action="{{ route('sewa.addRent') }}">
                        @csrf
                        <h3>Tambah Sewa</h3>
                        <p>Tanggal</p>
                        <input type="date" value="{{ now()->format('Y-m-d') }}" disabled>
                        <p>Kostum</p>
                        <select name="id_costume" id="costume-dropdown">
                            <option value="" default></option>
                            @foreach ($costumeData as $costume)
                                <option value="{{ $costume->id_costume }}">{{ $costume->name }}</option>
                            @endforeach
                        </select>
                        <p>Tambahan/Aksesoris</p>
                        <textarea name="description" id="desc-input" cols="30" rows="10"></textarea>
                        <div class="button-add">
                            <button type="submit" class="btn btn-primary" id="tambah-sewa">Tambah Sewa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#tambah-sewa-form').on('submit', function(e) {
            e.preventDefault();

            var selectedCostume = $('#costume-dropdown').val();
            console.log(selectedCostume);

            var formData = $(this).serialize();
        
            $.ajax({
                url: '{{ route('sewa.addRent') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contenType: false,
                success: function(response) {
                    if (response.success) {
                        console.log('data added to database:', response);
                        window.location.reload(); // Reload the page
                    } else {
                        alert('Failed to add data');
                    }
                }
            })
        })

        $('#table').on('click', '.delete', function(e) {
            e.preventDefault();

            if (!confirm('Are you sure?')) {
                return;
            }

            var rent_id = $(this).data('id');

            $.ajax({
                url: '{{ route("sewa.deleteRent", ":id_rent") }}'.replace(':id_rent', rent_id),
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
            })
        })
    </script>
@endsection