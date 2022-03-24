<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <!-- ============================================================== -->
    <!-- LEFT PANEL -->
    <!-- ============================================================== -->
    @include('includes.leftpanel')
    <!-- ============================================================== -->
    <!-- END LEFT PANEL -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- RIGHT PANEL -->
    <!-- ============================================================== -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('includes.header')
        <!-- /#header -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show text-center">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dismissable fade show text-center">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('error')}}
            </div>
        @endif
        
        @yield('breadcrumbs')
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="modal fade" id="staticModal" tabindex="-5" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Keluar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                Anda yakin ingin keluar?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form method="get" action="logout">
                                    @csrf
                                    @method('delete')
                                    <a class="nav-link btn btn-primary" href="/admin/logout" >Confirm</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
                <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        
         <!-- /.content -->
         <div class="clearfix"></div>
         <!-- Footer -->
         @include('includes.footer')
         <!-- /.site-footer -->
    </div>
    <!-- ============================================================== -->
    <!-- END RIGHT PANEL -->
    <!-- ============================================================== -->
    @include('includes.script')
    @stack('script')
    
</body>
</html>