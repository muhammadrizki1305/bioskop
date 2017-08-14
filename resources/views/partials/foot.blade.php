      <!--footer start-->
      <footer class="site-footer">
        <div class="text-center">
          2014 - Alvarez.is
          <a href="#top" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
        </div>
      </footer>
      <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ url('assets/js/jquery.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ url('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ url('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ url('assets/js/common-scripts.js') }}"></script>
    <!--script for this page-->
    
    @yield('js')
    <script>
    // //custom select box
    // $(function(){
    //     $('select.styled').customSelect();
    // });
    </script>
  </body>
</html>