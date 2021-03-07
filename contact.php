<?php 
	$title = "Fenouil" ;
	$function = "Contact";

	require_once 'inc/header.php';
	require_once 'inc/navbar.php';

?>
			
		
	
	<!--======= SUB BANNER =========-->
	<section class="sub-bnr" data-stellar-background-ratio="0.5">
		<div class="position-center-center">
			<div class="container">
				<h4>contact us now</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
					Sed feugiat, tellus vel tristique posuere, diam</p>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">contact</li>
				</ol>
			</div>
		</div>
	</section>
	
	<!-- Content -->
	<div id="content"> 
		
		<!--======= CONATACT  =========-->
		<section class="contact padding-top-100 padding-bottom-100">
			<div class="container">
				<div class="contact-form">
					<h5>PLEASE fill-up FEW details</h5>
					<div class="row">
						<div class="col-md-8"> 
							
							<!--======= Success Msg =========-->
							<div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
							
							<!--======= FORM  =========-->
							<form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
								<ul class="row">
									<li class="col-sm-6">
										<label>full name *
											<input type="text" class="form-control" name="name" id="name" placeholder="">
										</label>
									</li>
									<li class="col-sm-6">
										<label>Email *
											<input type="text" class="form-control" name="email" id="email" placeholder="">
										</label>
									</li>
									<li class="col-sm-6">
										<label>Phone *
											<input type="text" class="form-control" name="company" id="company" placeholder="">
										</label>
									</li>
									<li class="col-sm-6">
										<label>SUBJECT
											<input type="text" class="form-control" name="website" id="website" placeholder="">
										</label>
									</li>
									<li class="col-sm-12">
										<label>Message
											<textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
										</label>
									</li>
									<li class="col-sm-12">
										<button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND MAIL</button>
									</li>
								</ul>
							</form>
						</div>
						
						<!--======= ADDRESS INFO  =========-->
						<div class="col-md-4">
							<div class="contact-info">
								<h6>OUR ADDRESS</h6>
								<ul>
									<li> <i class="icon-map-pin"></i> Street No. 12, Newyork 12,<br>
										MD - 123, USA.</li>
									<li> <i class="icon-call-end"></i> 1.800.123.456789</li>
									<li> <i class="icon-envelope"></i> <a href="mailto:someone@example.com" target="_top">info@PAVSHOP.com</a> </li>
									<li>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam erat turpis, pellentesque non leo eget.</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!--======= MAP =========-->
		<div id="map"></div>
		
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
	
	<?php 
		require_once 'inc/footer.php'; 
		require_once 'inc/mapper.php';
	?> 
