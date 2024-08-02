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
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rentedData as $rent)
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
            <div class="col col-input">
                <div class="input-form">
                    <form id="tambah-sewa-form" method="POST" action="{{ route('sewa.addRent') }}">
                        @csrf
                        <h3>Tambah Sewa</h3>
                        <p>Tanggal Sewa</p>
                        <input type="date" name="created_at" value="{{ now()->format('Y-m-d') }}">
                        <p>Tanggal Kembali</p>
                        <input type="date" name="ended_at" value="{{ now()->format('Y-m-d') }}">
                        <p>Kostum</p>
                        <input type="text" name="id_costume" id="autocomplete" placeholder="Type costumes here"/>
                        <input type="hidden" name="id_costume" id="costume-id" />
                        {{-- <select name="id_costume" id="costume-dropdown" class="form-control">
                            <option value="" default></option>
                            @foreach ($costumeData as $costume)
                                <option value="{{ $costume->id_costume }}">{{ $costume->name }}</option>
                            @endforeach
                        </select> --}}
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

            var selectedCostume = $('#costume-id').val();
            console.log(selectedCostume);

            // Check if the description field is empty
            var descInput = $('#desc-input').val();
            if (!descInput.trim()) {
                $('#desc-input').val('-');
            }

            var formData = $(this).serialize();
        
            $.ajax({
                url: '{{ route('sewa.addRent') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contenType: false,
                success: function(response) {
                    if (response.success) {
                        console.log('Data added to database:', response);
                        // Get the costume ID from the form or response
                        var costumeId = $('#costume-id').val();
                        updateCostumeStatus(costumeId, 2);
                    } else {
                        alert('Failed to add data');
                    }
                }
            })
        })

        function updateCostumeStatus(costumeId, status) {
            $.ajax({
                url: '{{ route("katalog.updateStatus", ":id_costume") }}'.replace(':id_costume', costumeId),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include the CSRF token
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Status updated successfully:', response);
                        window.location.reload(); // Reload the page
                    } else {
                        alert('Failed to update status: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error updating status:', xhr.responseText);
                    alert('An error occurred while updating the status');
                }
            });
        }

        // $('#table').on('click', '.delete', function(e) {
        //     e.preventDefault();

        //     if (!confirm('Are you sure?')) {
        //         return;
        //     }

        //     var rent_id = $(this).data('id');

        //     $.ajax({
        //         url: '{{ route("sewa.deleteRent", ":id_rent") }}'.replace(':id_rent', rent_id),
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
        //     })
        // })

        $('#autocomplete').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('autocomplete.costumes') }}",
                        dataType: "json",
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id_costume
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#autocomplete').val(ui.item.label);
                    $('#costume-id').val(ui.item.value);
                    return false;
                    // Optionally, set a hidden input to the selected value
                    // $('<input>').attr({
                    //     type: 'hidden',
                    //     name: 'id_costume',
                    //     value: ui.item.value
                    // }).appendTo('form');
                    return false;
                }
            });

    </script>
@endsection