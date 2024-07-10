@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title float-left">{{ $moduleName }}</h4>
                <div class="card-tools">
                    <a href="{{ route('gallery.create') }}">
                        <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
                    </a>
                </div>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> Image </th>
                                {{-- <th> Desc </th> --}}
                                <th width="100px"> Action </th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('JS')
    <script>
        // @if (Session::has('message'))
        //   Swal.fire(
        //       '{{ $moduleName }}',
        //       '{!! session('message') !!}',
        //       'success'
        //     )
        // @endif

        $('.table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [{
                extend: 'csv',
                text: 'Export'
            }, ],
            ajax: {
                "url": "{{ route('gallery.data') }}",
                "dataType": "json",
                "type": "GET",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });
    </script>
@endpush
