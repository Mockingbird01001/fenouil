 <?php 
  $title = "Fenouil" ;
  $function = "Login";

  require_once 'inc/header.php';
  require_once 'inc/navbar.php';

?>

  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>LOGIN</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
          Sed feugiat, tellus vel tristique posuere, diam</p>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">PAGES</a></li>
          <li class="active">LOGIN</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6>LOGIN YOUR ACCOUNT</h6>
                <form>
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label> USERNAME
                        <input type="text" name="first-name" value="" placeholder="">
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-12">
                      <label> PASSWORD
                        <input type="password" name="last-name" value="" placeholder="">
                      </label>
                    </li>
                    
                    <!-- LOGIN -->
                    <li class="col-md-4">
                      <button type="submit" class="btn">LOGIN</button>
                    </li>
                    
                    <!-- CREATE AN ACCOUNT -->
                    <li class="col-md-4">
                      <div class="checkbox margin-0 margin-top-20">
                        <input id="checkbox1" class="styled" type="checkbox">
                        <label for="checkbox1"> Stay me Login</label>
                      </div>
                    </li>
                    
                    <!-- FORGET PASS -->
                    <li class="col-md-4">
                      <div class="checkbox margin-0 margin-top-20 text-right">
                        <a href="#.">Forget Password</a>
                      </div>
                    </li>
                  </ul>
                </form>
                
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-5">
                <h6>LOGIN WITH</h6>
                
                <ul class="login-with">
                	<li>
                    	<a href="#."><i class="fa fa-facebook"></i>FACEBOOK</a>
                    
                    </li>
                    
                    <li>
                    	<a href="#."><i class="fa fa-google"></i>GOOGLE</a>
                    
                    </li>
                    
                    <li>
                    	<a href="#."><i class="fa fa-twitter"></i>TWITTER</a>
                    
                    </li>
                
                </ul>
                
                
              </div>
            </div>
          </div>
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