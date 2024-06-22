@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title float-left">{{$moduleName}}</h4>
                <div class="card-tools">
                   <a href="{{ route('device.create') }}">
                     <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
                   </a>
                </div>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Action </th>
                      </tr>
                    </thead>

                  </table>
                </div>
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
        ajax: {
        "url": "{{ route('device.data') }}",
        "dataType": "json",
        "type": "GET",
        },
        columns: [
            { data: 'DT_RowIndex',orderable:false,searchable:false},
            { data: 'name',name:'name'},
            { data: 'action',orderable:false,searchable:false},
        ],
    });
</script>

@endpush
