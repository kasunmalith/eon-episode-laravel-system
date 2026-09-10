<div class="row main-header ">
	<div class="col-sm">
		<div class="row justify-content-between">
			<div class="col-4">
				<div id="main-logo">
					<a class="eon-logo " href="<?php echo Request::root();?>"></a>
				</div>
			</div>
			<div class="col-4 align-items-center menu-btn-parent">
				<div class="menu-btn">
					<span class="eltdf-mobile-menu-icon"> <span class="eltdf-hm-label">Menu</span><span class="eltdf-hm-lines"><span class="eltdf-hm-line eltdf-line-1"></span><span class="eltdf-hm-line eltdf-line-2"></span></span> </span>
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-between control-menu1">
		<nav id="menu-main" class=" navbar navbar-expand-lg ">
			<div class="collapse  navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php
					
					$items = Array(
					array(
					"title"=>"home",
					"link"=>Request::root(),
					"is-menu"=>0
					),
					array(
					"title"=>"portfolio",
					"link"=>"#",
					"is-menu"=>1,
					"sub-menu"=>array(
											array(
											"title"=>"photography",
											"link"=>Request::root()."/portfolio/photography",
											"is-menu"=>0
												),
											array(
											"title"=>"cinematography",
											"link"=>Request::root()."/portfolio/cinematography",
											"is-menu"=>0
												)
									)
						 
					),
					array(
					"title"=>"proofing gallery",
					"link"=>Request::root()."/proofing-gallery",
					"is-menu"=>0
					),
				/*	array(
					"title"=>"wedding vendors",
					"link"=>Request::root()."/wedding-vendors",
					"is-menu"=>0
					), */
					array(
					"title"=>"about EON",
					"link"=>Request::root()."/about-eon",
					"is-menu"=>0
					),
					array(
					"title"=>"contact EON",
					"link"=>Request::root()."/contact-eon",
					"is-menu"=>0
					)
					
				);
					
					
					foreach ($items as  $value) {
					
					$title = $value["title"];
					$link = $value["link"];
					$is_menu = $value["is-menu"];
						
						 if(!$is_menu){

					?>
					<li class="nav-item ">
						<a class="nav-link" href="<?php  echo $link;?>"><?php  echo $title;?>
						<div class="animation-line"></div> </a>
					</li>
					<?php
					}else{
					$sub_menu = $value['sub-menu'];
					?>
					<li class="nav-item collapse-toggle">
						<a class="nav-link" href="<?php echo $link;?>" id="<?php echo $title;?>-nav-link" > <?php  echo $title;?> <div class="dropdown-toggle_km"></div> <div class="animation-line"></div> </a>
						<div class="collapse-menu collapse " id="<?php echo $title;?>-dropdown">
							<?php
							foreach ( $sub_menu as  $sub_value) {
							$title = $sub_value["title"];
							$link = $sub_value["link"];
							$is_menu = $sub_value["is-menu"];
							?>
							<a class="dropdown-item" href="<?php  echo $link;?>"><?php  echo $title;?></a>
							<?php
							}
							?>
						</div>
					</li>
					<?php
					}

					}
					?>
					
				</ul>
			</div>
		</nav>
	</div>
	<div class="col-sm"></div>
</div>
