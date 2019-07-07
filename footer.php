    <section id="bottom" style="background-color: #000000;">
        <div class="container wow fadeInDown"  data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><font color="white">CDC-Sistem</font></h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="#">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3><font color="white">Support</font></h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Documentation</a></li>
                          
                        </ul>
                    </div>          
                </div><!--/.col-md-3-->

               
                <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue" style="background-color: #c34600">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
<!--     <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
 -->

    <script src="admin/js/bootstrap-datepicker.js"></script>

     <script>
  $( function() {
    $( "#datetimepicker1" ).datepicker({
        format: "dd-mm-yyyy",
                    autoclose:true
    });

    $( ".bulantahun" ).datepicker({
        format: "yyyy",
        autoclose:true
    });

  } );


  function booking_konsul(id){
    $.ajax({
        url:"modul/simpan.php?mode=booking_konsul",
        method:"POST",
        data:{id:id},
        success:function(rest){
            alert(rest);    
            // console.log(rest);

        }
    });
  }
  </script>

</body>
</html>