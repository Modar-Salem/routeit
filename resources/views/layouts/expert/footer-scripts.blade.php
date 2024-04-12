<!-- Vendor JS -->
<script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/vendors.min.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/pages/chat-popup.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>

<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/date-paginator/moment.min.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/vendor_components/date-paginator/bootstrap-datepaginator.min.js')}}"></script>

<!-- Rhythm Admin App -->
<script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/template.js')}}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('dashboard/js/pages/dashboard.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor_components/dropzone/dropzone.js')}}"></script>
@yield('scripts')
