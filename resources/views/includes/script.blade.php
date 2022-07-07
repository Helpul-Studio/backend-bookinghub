<script src="{{url('admin/assets/js/vendor-all.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('admin/assets/js/pcoded.min.js')}}"></script>

<!-- amchart js -->
<script src="{{url('admin/assets/plugins/amchart/js/amcharts.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/gauge.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/serial.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/light.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/pie.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/ammap.min.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/usaLow.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/radar.js')}}"></script>
<script src="{{url('admin/assets/plugins/amchart/js/worldLow.js')}}"></script>

<!-- Float Chart js -->
<script src="{{url('admin/assets/plugins/flot/js/jquery.flot.js')}}"></script>
<script src="{{url('admin/assets/plugins/flot/js/jquery.flot.categories.js')}}"></script>
<script src="{{url('admin/assets/plugins/flot/js/curvedLines.js')}}"></script>
<script src="{{url('admin/assets/plugins/flot/js/jquery.flot.tooltip.min.js')}}"></script>

<!-- dashboard-custom js -->
<script src="{{url('admin/assets/js/pages/dashboard-analytics.js')}}"></script>

<!-- SweetAlert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.all.min.js"></script> -->
<!-- <script src="{{ url('material-pro/src/assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('material-pro/src/assets/extra-libs/sweetalert2/sweet-alert.init.js') }}"></script><br> -->

@stack('outlet')
@stack('outlet-fasility')
@stack('outlet-room')
@stack('outlet-image')