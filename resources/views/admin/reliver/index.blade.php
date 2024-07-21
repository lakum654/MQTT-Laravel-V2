@extends('layouts.app')

@push('CSS')
<style>
    .table-wrap {
        table-layout: fixed;
        word-wrap: break-word;
    }
    .table-wrap th, .table-wrap td {
        white-space: normal;
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="card p-0">
            <div class="card-body">
              <h4 class="card-title float-left">{{ $moduleName }}</h4>
              <div class="card-tools">
                 {{-- <a href="{{ route('reliver.create') }}">
                   <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
                 </a> --}}
              </div>
              {{-- <p class="card-description">
              </p> --}}
              <div class="table-responsive table-wrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th> # </th>
                      <th> Device Name </th>
                      <th width="130px"> Junction House No </th>
                      <th width="120px"> Air Blaster Count </th>
                      <th width="120px"> Compressor </th>
                      @if(auth()->user()->isSuperAdmin())
                      <th> QR Code </th>
                      @endif
                      <th width="120px"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- Data will be populated by DataTables --}}
                  </tbody>
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

    $(document).ready(function() {
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
    	buttons: [
        {
            extend: 'csv',
            text: 'Export'
        },
       ],
            ajax: {
                url: "{{ route('reliver.data') }}",
                dataType: "json",
                type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'device.name', name: 'device_id' },
                { data: 'junction_house_no', name: 'junction_house_no' },
                { data: 'air_blaster_count', name: 'air_blaster_count' },
                { data: 'compressor', name: 'compressor' },
                @if(auth()->user()->isSuperAdmin())
                { data: 'qrcode', name: 'qrcode' },
                @endif
                { data: 'action', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endpush
