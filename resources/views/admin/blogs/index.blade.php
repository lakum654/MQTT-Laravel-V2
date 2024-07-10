@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title float-left">{{ $moduleName }}</h4>
                <div class="card-tools">
                    <a href="{{ route('blog.create') }}">
                        <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
                    </a>
                </div>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Actions</th>
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
                "url": "{{ route('blog.data') }}",
                "dataType": "json",
                "type": "GET",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
