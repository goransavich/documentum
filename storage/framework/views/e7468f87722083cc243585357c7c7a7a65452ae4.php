<div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        

        <div class="carousel-inner">
          <div class="item active">
            <img src="img/slide.jpg" class="img-responsive" alt="">

            <div class="carousel-caption">
                            
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">

                <form method="POST" action="">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                    <input type="text" class="form-control home-insert" id="username" name="username" placeholder="Korisničko ime">
                    
                  </div>
                  
                  <div class="form-group">
                    <input type="password" class="form-control home-insert" id="password" name="password" placeholder="Lozinka">
                  
                   
                  </div>
                  <small class="text-danger error-message"><?php echo e($errors->first('message')); ?></small> 
                  <div class="form-group">
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Prijava</button>
                  </div>
                  
                </form>

              </div>
                  
              <div>
                  
              </div>
            </div>
          </div>

          
        </div>

        
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/#slider-->