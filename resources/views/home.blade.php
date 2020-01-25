@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/dataTables.semanticui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/buttons.dataTables.min.css') }}">
@endpush

@section('content')
<br><br><br><br>
<div class="ui one column grid centered">
    <div class="column">
        <div class="ui fluid card">
            <div class="content">
                <div class="header"><i class="fas fa-home"></i> Dashboard</div>
            </div>
            <div class="content">
                <br>
                <div class="ui fluid form">
                    <div class="ui two column grid centered">
                        <div class="column">
                            <div class="field">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ui two column grid centered">
                        <div class="column">
                            <button type="text" id="btnFilter" class="ui secondary right floated button"><i class="fas fa-filter"></i> Submit</button>
                        </div>
                        <div class="column">
                            <button type="reset" id="btnReset" class="ui left floated button"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </div>
                </div>
                <br>
                <table class="ui celled striped selectable black table" id="user_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    {{-- <script type="text/javascript" src="{{ asset('js/datatables/datatables.min.js') }}" defer></script> --}}
    <script type="text/javascript" src="{{ asset('js/datatables/jquery.dataTables.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/dataTables.semanticui.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/responsive.semanticui.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/dataTables.buttons.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/buttons.semanticui.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/buttons.html5.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/buttons.print.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/buttons.colVis.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/jszip.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/buttons.flash.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/pdfmake.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/datatables/vfs_fonts.js') }}" defer></script>
    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pageLength',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy"></i> Copy',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> Pdf',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        className: 'btn btn-dark'
                    },
                    {
                        extend: 'colvis',
                        className: 'btn btn-dark',
                        collectionLayout: 'fixed two-column'
                    }
                ],
                ajax: {
                    url: "{{ url('users-list') }}",
                    type: 'GET',
                    data: function (d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [
                         { data: 'id', name: 'id' },
                         { data: 'name', name: 'name' },
                         { data: 'email', name: 'email' },
                         { data: 'created_at', name: 'created_at' }
                ]
            });
        });
        
        $('#btnFilter').click(function(){
            $('#user_table').DataTable().draw(true);
        });

        $('#btnReset').click(function(){
            $('#start_date').val("");
            $('#end_date').val("");
            $('#user_table').DataTable().draw(true);
        });
    </script>
@endpush
