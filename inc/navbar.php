<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-03-07 02:35:08
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-09 20:14:00
 */
	
	require_once './class/App.php';
	require_once './class/Auth.php';
	require_once './class/Database.php';
	require_once './class/Session.php';
	require_once './class/Str.php';

	$title = "Fenouil" ;
	$function = "Login";

	$errors = array();

    $auth = App::getAuth();
    $db = App::getDatabase();
    $auth->connectFromCookie($db);

?>

<!-- Logo -->
		<div class="logo"> <a href="index.php"><img class="img-responsive" src="images/logo.png" alt="" ></a> </div>
			<nav class="navbar ownmenu">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
				</div>
					
				 <!-- NAV -->
				<div class="collapse navbar-collapse" id="nav-open-btn">
					<ul class="nav">
						<li class="dropdown active"> <a href="index.php">Home</a></li>
						<li class="dropdown"> <a href="shop.php">Shop</a></li>
						<li> <a href="about-us.php">About </a> </li>
						
						<!-- Two Link Option -->
						<li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Designer</a>
							<div class="dropdown-menu two-option">
								<div class="row">
									<ul class="col-sm-6">
										<li> <a href="shop.php">summer store</a></li>
										<li> <a href="shop.php"> bra</a></li>
										<li> <a href="shop.php"> babydools</a> </li>
									</ul>
									<ul class="col-sm-6">
										<li> <a href="shop.php">deodornts</a></li>
										<li> <a href="shop.php"> skin care</a></li>
										<li> <a href="shop.php"> gold rings</a></li>
										<li> <a href="shop.php"> jewellery</a> </li>
									</ul>
								</div>
							</div>
						</li>
						
						<!-- MEGA MENU -->
						<li class="dropdown megamenu"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">store</a>
							<div class="dropdown-menu">
								<div class="row"> 
									
									<!-- Shop Pages -->
									<div class="col-md-3">
										<h6>Shop Pages</h6>
										<ul>
											<li> <a href="shop.php">Shop</a> </li>
											<li> <a href="product-detail.php">Product Detail</a> </li>
											<li> <a href="shopping-cart.php">Shopping Cart</a> </li>
											<li> <a href="checkout.php">Checkout</a> </li>
										</ul>
									</div>
									
									<!-- TOp Rate Products -->
									<div class="col-md-4">
										<h6>TOp Rate Products</h6>
										<div class="top-rated">
											<ul>
												<li>
													<div class="media-left">
														<div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-1.jpg" alt="..."> </a> </div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">WOOD CHAIR</h6>
														<div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span class="price">129.00 USD</span> </div>
												</li>
												<li>
													<div class="media-left">
														<div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-2.jpg" alt="..."> </a> </div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">STOOL</h6>
														<div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span class="price">129.00 USD</span> </div>
												</li>
												<li>
													<div class="media-left">
														<div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-3.jpg" alt="..."> </a> </div>
													</div>
													<div class="media-body">
														<h6 class="media-heading">WOOD SPOON</h6>
														<div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span class="price">129.00 USD</span> </div>
												</li>
											</ul>
										</div>
									</div>
										
									<!-- New Arrival -->
									<div class="col-md-5">
										<h5>NEW ARRIVAL 2016 <span>(Best Collection)</span></h5>
										<img class="nav-img" src="images/nav-img.png" alt="" >
										<p>Lorem ipsum dolor sit amet,<br>
												consectetur adipiscing elit. <br>
												Donec faucibus maximus<br>
												vehicula.</p>
										<a href="#." class="btn btn-small btn-round">SHOP NOW</a> </div>
								</div>
							</div>
							</li>
						<li> <a href="contact.php"> contact</a> </li>
					</ul>
				</div>
					
				<!-- Nav Right -->
				<div class="nav-right">
					<ul class="navbar-right">
						
						<!-- USER INFO -->
						<li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
							<ul class="dropdown-menu">
							<?php if($auth->user()): ?>
								<li><a><?= $auth->user()->firstName." ".$auth->user()->lastName; ?></a></li>
								<li><a href="profil.php">PROFIL</a></li>
								<li><a href="logout.php">LOGOUT</a></li>
							<?php else: ?>
								<li><a href="register.php">REGISTER</a></li>
								<li><a href="login.php">LOGIN</a></li>
							<?php endif; ?>
							</ul>
						</li>
							
						<!-- USER BASKET -->
						<li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i> </a>
							<ul class="dropdown-menu">
								<li>
									<div class="media-left">
										<div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-1.jpg" alt="..."> </a> </div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">WOOD CHAIR</h6>
										<span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> </div>
								</li>
								<li>
									<div class="media-left">
										<div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-2.jpg" alt="..."> </a> </div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">WOOD STOOL</h6>
										<span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> 
									</div>
								</li>
								<li>
									<h5 class="text-center">SUBTOTAL: 258.00 USD</h5>
								</li>
								<li class="margin-0">
									<div class="row">
										<div class="col-xs-6"> <a href="shopping-cart.php" class="btn">VIEW CART</a></div>
										<div class="col-xs-6 "> <a href="checkout.php" class="btn">CHECK OUT</a></div>
									</div>
								</li>
							</ul>
						</li>
							
						<!-- SEARCH BAR -->
						<li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" icon-magnifier"></i></a>
							<div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
								<div class="search-overlay"></div>
								<div class="position-center-center">
									<div class="search">
										<form>
											<input type="search" placeholder="Search Shop">
											<button type="submit"><i class="icon-check"></i></button>
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	</header>