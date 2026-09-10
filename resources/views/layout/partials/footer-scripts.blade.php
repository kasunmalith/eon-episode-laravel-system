<!-- Bootstrap core JavaScript -->


 <script src="{{ asset('js/jquery.slim.js') }}" ></script>
 <script src="{{ asset('js/pooper.js') }}" ></script>
 
 <script src="{{ asset('js/app.js') }}" ></script>
   <script src="{{ asset('js/kobe.js') }}" ></script>
     <script src="{{ asset('js/masonry.js') }}" ></script>
          <script src="{{ asset('js/mouse.js') }}" ></script>
      <script src="{{ asset('js/lg.js') }}" ></script>
            <script src="{{ asset('js/lg-video.js') }}" ></script>
            
       <script type="text/javascript" src="{{ asset('js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.lazy.plugins.min.js') }}"></script>
      <script src="{{ asset('js/jquery.form.min.js') }}" ></script>
     <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" ></script>
    
     
      <script src="{{ asset('js/cj.js') }}" ></script>
<!-- Latest compiled and minified JavaScript -->
<script src='{{ asset('js/select2.min.js') }}' type='text/javascript'></script>


  <div id="temp-div"></div>
  <?php $REQUEST_URI= $_SERVER['REQUEST_URI'];
  
  if($REQUEST_URI=="/"){
  	$REQUEST_URI="home";
  }
   ?>
<script>

		$(document).ready(
		function(){
			
			$(".navbar-nav a").each(
				function(){
					var link = $(this).attr("href");
					if (link.indexOf("<?php echo $REQUEST_URI;?>")>=0){
						$(this).addClass("activez");
					}
				}
			);
				
		}
	);



$(window).on('load', function () {
	
	setTimeout(function(){
	 $("body").removeClass("bodyloading");
   $("#loading-content").hide();
    }, 1000);
	

});



</script>