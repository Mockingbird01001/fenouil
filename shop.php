<?php 
  require_once 'inc/auto_Include.php';
  require_once 'inc/functions.php';

  $title = "Fenouil" ;
  $function = "Store";

  $errors = array();

  $validator = new Validator($_POST);
  $auth = App::getAuth();
  $db = App::getDatabase();
  $auth->connectFromCookie($db);


  require_once 'inc/header.php';
  require_once 'inc/navbar.php';
  require_once 'inc/pop-up.php'; 

?>

  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
	<div class="position-center-center">
	  <div class="container">
		<h4>PAVSHOP PRODUCTS</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
		  Sed feugiat, tellus vel tristique posuere, diam</p>
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">Data</li>
		</ol>
	  </div>
	</div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
	
	<!-- Popular Products -->
	<section class="shop-page padding-top-100 padding-bottom-100">
	  <div class="container">
		<div class="item-display">
		  <div class="row">
			<div class="col-xs-6"> <span class="product-num">Showing 1 - 10 of 30 products</span> </div>
			
			<!-- Products Select -->
			<div class="col-xs-6">
			  <div class="pull-right"> 
				
				<!-- Short By -->
				<select class="selectpicker">
				  <option>Short By</option>
				  <option>Short By</option>
				  <option>Short By</option>
				</select>
				<!-- Filter By -->
				<select class="selectpicker">
				  <option>Filter By</option>
				  <option>Short By</option>
				  <option>Short By</option>
				</select>
				
				<!-- GRID & LIST --> 
				<a href="#." class="grid-style"><i class="icon-grid"></i></a> <a href="#." class="list-style"><i class="icon-list"></i></a> </div>
			</div>
		  </div>
		</div>
		
		<!-- Popular Item Slide -->
		<div class="papular-block row"> 
		  
		<?php for($i=0; $i<12; $i++): ?>

		  <!-- Item -->
		  <div class="col-md-3">
			<div class="item"> 
			<!-- Sale Tags -->
			<div class="on-sale">
			25%
			<span>OFF</span>
			</div>
			  <!-- Item img -->
			  <div class="item-img"> <img class="img-1" src="images/product-2-2.jpg" alt="" > <img class="img-2" src="images/product-2.jpg" alt="" > 
				<!-- Overlay -->
				<div class="overlay">
				  <div class="position-center-center">
					<div class="inn"><a href="images/product-2-2.jpg" data-lighter><i class="icon-magnifier"></i></a> <a href="#."><i class="icon-basket"></i></a> <a href="#." ><i class="icon-heart"></i></a></div>
				  </div>
				</div>
			  </div>
			  <!-- Item Name -->
			  <div class="item-name"> <a href="#.">gray bag</a>
				<p>Lorem ipsum dolor sit amet</p>
			  </div>
			  <!-- Price --> 
			  <span class="price"><small>$</small>299</span> </div>
		  </div>
		 <?php endfor; ?>
		  
		</div>
	  </div>
	</section>
	
	<!-- About -->
	<section class="small-about padding-top-150 padding-bottom-150">
	  <div class="container"> 
		
		<!-- Main Heading -->
		<div class="heading text-center">
		  <h4>about PAVSHOP</h4>
		  <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
			eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
		</div>
		
		<!-- Social Icons -->
		<ul class="social_icons">
		  <li><a href="#."><i class="icon-social-facebook"></i></a></li>
		  <li><a href="#."><i class="icon-social-twitter"></i></a></li>
		  <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
		  <li><a href="#."><i class="icon-social-youtube"></i></a></li>
		  <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
		</ul>
	  </div>
	</section>
	
	<?php require_once 'inc/newsletter.php'; ?>
  </div>
  
  <?php require_once 'inc/footer.php'; ?>
  
</body>
</html>