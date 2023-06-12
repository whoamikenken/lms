<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.css') }}" rel="stylesheet">
   

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />


    
    
   
    @yield('styles')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partials.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('partials.admin.navbar')
               
                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                @include('partials.admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
    <script src="https://kit.fontawesome.com/2888840f77.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>



        
        

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

    <script>
    $(function() {
        let copyButtonTrans = 'COPY'
        let csvButtonTrans = 'CSV'
        let excelButtonTrans = 'EXCEL EXPORT'
        let pdfButtonTrans = 'PDF'
        let printButtonTrans = 'PRINT'
        let colvisButtonTrans = 'VIEW'

        let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn btn-sm mt-1 btn-default ' })
        $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: languages['{{ app()->getLocale() }}']
        },
       
        order: [],
        scrollX: true,
        pageLength: 100,
        dom: 'lBfrtip<"actions">',
        buttons: [
        
           
            {
            extend: 'csv',
            className: 'btn-primary btn-sm m-2 ml-3',
            text: excelButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
            },
        ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        });

    </script>

    <script>
        $(document).ready(function(){
            $('.select2').select2();
            $(document).on('click', '.menubtn', function(){
                window.location.href = "{{ route("admin.dashboard") }}";
            });
        });
    </script>
    @yield('scripts')

</body>

</html>