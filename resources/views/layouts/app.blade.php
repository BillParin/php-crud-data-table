<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Catalog ITSM</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>

    <script type="text/javascript" src="/jqx/jqxcore.js"></script>
    <script type="text/javascript" src="/jqx/jqxdata.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="/jqx/jqxmenu.js"></script>
    <script type="text/javascript" src="/jqx/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="/jqx/jqxcalendar.js"></script>
    <script type="text/javascript" src="/jqx/jqxtooltip.js"></script>
    <script type="text/javascript" src="/jqx/jqxbuttons.js"></script>
    <script type="text/javascript" src="/jqx/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/jqx/jqxlistbox.js"></script>
    <script type="text/javascript" src="/jqx/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/jqx/jqxcheckbox.js"></script>
    <script type="text/javascript" src="/jqx/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="/jqx/globalization/globalize.js"></script>
    <script type="text/javascript" src="/jqx/globalization/globalize.culture.th-TH.js"></script>
    <script type="text/javascript" src="/js/countdown.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

      <!-- DataTables -->


    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-select/css/select.bootstrap4.min.css') }}">


     <!-- sweetAlert -->
     <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/well.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/jqx/styles/jqx.base.css" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">


    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-select/js/dataTables.select.min.js') }}"></script>



    <!-- sweetAlert -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <style type="text/css">
        @font-face {
          font-family: title;
          src: url("{{ asset('adminlte/plugins/fontawesome-free/webfonts/PK Ang Thong Medium.ttf') }}");

        }
        .table thead th{
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

            /* background-color: #d6d3d3;
            vertical-align: middle;
            border-bottom: 1px solid #c7c7c7;
            border-top: 1px solid #c7c7c7;
            border-right: 1px solid #c7c7c7;
            border-left: 1px solid #c7c7c7;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);    */
        }.table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .table th,
        .table td {
            padding: 12px 15px;            
        }
        .table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }        
        /* .table tbody tr td:first-of-type {
            color: red;
        }        */
        /* .table tbody td{ */
            /* background-color: #ff0707; */
        /* } */
        body{
            font-family: title;
            /* font-size:14px; */
        }
      </style>
    <script>
        //setup ajax when method Post
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>
    <body>
        @include('inc.navbar')
        <main class="py-4">
            <div class="container-fluid">

                @if(session()->has('status_warning'))
                <div class="alert alert-danger text-center" role="alert">
                    {{session()->get('status_warning')}}
                </div>
                @endif

                @yield('content')
                {{-- @include('inc.footer') --}}
            </div>
        </main>
    </body>

</html>
