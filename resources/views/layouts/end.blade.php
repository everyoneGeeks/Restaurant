<!-- ================== BEGIN BASE JS ================== -->
<script src="/public/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="/public/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="/public/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="/public/assets/crossbrowserjs/html5shiv.js"></script>
  <script src="/public/assets/crossbrowserjs/respond.min.js"></script>
  <script src="/public/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="/public/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/public/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="/public/assets/plugins/gritter/js/jquery.gritter.js"></script>
  <script src="/public/assets/plugins/flot/jquery.flot.min.js"></script>
  <script src="/public/assets/plugins/flot/jquery.flot.time.min.js"></script>
  <script src="/public/assets/plugins/flot/jquery.flot.resize.min.js"></script>
  <script src="/public/assets/plugins/flot/jquery.flot.pie.min.js"></script>
  <script src="/public/assets/plugins/sparkline/jquery.sparkline.js"></script>
  <!-- <script src="/public/assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script> -->
  <!-- <script src="/public/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
  <script src="/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <!-- ================== BEGIN Data TAbles JS ================== -->
  <script src="/public/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
  <script src="/public/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
  <script src="/public/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
  <script src="/public/assets/js/table-manage-responsive.demo.min.js"></script>
  <!-- ================== END Data Tables JS ================== -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script src="/public/assets/plugins/select2/dist/js/select2.min.js"></script>
  <script src="/public/assets/js/dashboard.min.js"></script>
  <script src="/public/assets/js/apps.min.js"></script>


  <script>
    $(document).ready(function() {
      App.init();
      Dashboard.init();
      TableManageResponsive.init();
    });
  </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
})

// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });
</script>


</body>
</html>
