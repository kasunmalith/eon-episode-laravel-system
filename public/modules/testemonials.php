<div class="container section-3-h">
	<div  class="row k-title   justify-content-md-center">
		<h4>Testemonials</h4>
	</div>
	<div  class="row  sub-title justify-content-md-center">
		<div>
			From our beloved clients
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div id="carouseltestemonials" class="carousel slide" data-ride="carousel">
			
			<?php 
			$testemonials = DB::table('testemonials')->orderBy('id', 'asc')->get();
$value=0;
?>
			 <ol class="carousel-indicators">
			 	<?php 	foreach ($testemonials as $testemonial) { ?>
    <li data-target="#carouseltestemonials" data-slide-to="<?php echo $value; ?>" class="<?php if($value==0){echo "active"; } ?>"></li>
   
    <?php 
    $value++; 
				} ?>
    
  </ol>
  
			<div class="carousel-inner">
			
				<?php
				

$value=1;
	foreach ($testemonials as $testemonial) {
		$id = $testemonial->id;
		$t_date = $testemonial->t_date;
		$t_img_url = $testemonial->t_img_url;
		$t_date = $testemonial->t_date;
		$t_para = $testemonial->t_para;
		$t_couple_name = $testemonial->t_couple_name;
		
		 ?>
				
				<div class="carousel-item <?php if($value==1){echo "active"; } ?> ">
					<img class="preview-img" src="testemonials/<?php echo $t_img_url;?>">  
					<div class="testimonial-text align-items-center">
						<div class="testimonial-text-inner">
							<div class="testimonial-date">
								<?php echo $t_date; ?>
							</div>
							<div class="testimonial-para">
								<?php echo $t_para;?>
							</div>
							<h6 class="testimonial-author"> <?php echo $t_couple_name;?> </h6>
						</div>
					</div>
				</div>
				<?php
				$value++;
				 } ?>
				

			</div>
			<a class="carousel-control-prev" href="#carouseltestemonials" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
			<a class="carousel-control-next" href="#carouseltestemonials" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
		</div>
	</div>
</div>
<style>
#carouseltestemonials .carousel-indicators{
	
	    position: absolute;
    right: 0;
    bottom: -40px;
    left: 0;
    z-index: 15;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none;
}
    
   #carouseltestemonials  .carousel-indicators li {
    box-sizing: content-box;
    -ms-flex: 0 1 auto;
    flex: 0 1 auto;
    width: 10px;
    height: 10px;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #666;
    background-clip: padding-box;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity .6s ease;
}
    
      #carouseltestemonials .carousel-indicators .active {
    opacity: 1;
}
    
</style>