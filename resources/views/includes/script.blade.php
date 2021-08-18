 <!-- jQuery -->
 <script src="{{ asset('Front/plugins/jquery/jquery.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('Front/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('Front/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- ChartJS -->
 <script src="{{ asset('Front/plugins/chart.js/Chart.min.js') }}"></script>
 <!-- Sparkline -->
 <script src="{{ asset('Front/plugins/sparklines/sparkline.js') }}"></script>
 <!-- JQVMap -->
 <script src="{{ asset('Front/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('Front/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('Front/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('Front/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('Front/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('Front/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
 <!-- Summernote -->
 <script src="{{ asset('Front/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('Front/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('Front/dist/js/adminlte.min.js') }}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('Front/dist/js/demo.js') }}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('Front/dist/js/pages/dashboard.js') }}"></script>
 <!-- bs-custom-file-input -->
 <script src="{{ asset('Front/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

 <!-- BS-Stepper -->
 <script src="{{ asset('Front/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

 <script>
   // BS-Stepper Init
   document.addEventListener('DOMContentLoaded', function() {
     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
   })
 </script>


 <!-- Page specific script -->
 <script>
   $(function() {
     bsCustomFileInput.init();
   });
 </script>
