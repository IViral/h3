<script src="{{url('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{url('js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('js/buttons.flash.min.js')}}"></script>
<script src="{{url('js/jszip.min.js')}}"></script>
<script src="{{url('js/pdfmake.min.js')}}"></script>
<script src="{{url('js/vfs_fonts.js')}}"></script>
<script src="{{url('js/buttons.html5.min.js')}}"></script>
<script src="{{url('js/buttons.print.min.js')}}"></script>
<script src="{{url('js/buttons.colVis.min.js')}}"></script>
<script src="{{url('js/dataTables.select.min.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>



@yield('javascript')