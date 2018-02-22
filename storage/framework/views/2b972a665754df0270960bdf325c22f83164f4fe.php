<div class="services">
    <div class="container">
      <div class="text-center">
        
      </div>
      <?php if(Auth::user()->hasRole(['administrator', 'pisarnica'])): ?>
      <a href="dashboard/create" class="services-outer">
      <div class="col-md-3 wow fadeInDown avesome-pic" data-wow-duration="1000ms" data-wow-delay="300ms">
        <i class="fa fa-plus-square-o"></i>
        <h3>Dodaj novi dokument</h3>
        <p>Otvaranje novog predmeta, rezervisanje brojeva.</p>
      </div>
      </a>
      <?php endif; ?>
      <?php if(Auth::user()->hasRole(['inspektor', 'nacelnik', 'pisarnica', 'administrator'])): ?>
      <a href="dashboard/search" class="services-outer">
      <div class="col-md-3 wow fadeInDown avesome-pic" data-wow-duration="1000ms" data-wow-delay="600ms">
        <i class="fa fa-search"></i>
        <h3>Pretraga</h3>
        <p>Pretraga predmeta i dodavanje novih dokumenata u traženi predmet.</p>
      </div>
      </a>
      <?php endif; ?>
      <?php if(Auth::user()->hasRole(['inspektor', 'nacelnik', 'pisarnica', 'administrator'])): ?>
      <a href="/reports" class="services-outer">
      <div class="col-md-3 wow fadeInDown avesome-pic" data-wow-duration="1000ms" data-wow-delay="900ms">
        <i class="fa fa-file-text-o"></i>
        <h3>Izveštaji</h3>
        <p>Izveštaji - arhivirani i nearhivirani predmeti, pretraga po inspektorima, po inspekcijama.</p>
      </div>
      </a>
      <?php endif; ?>
      <?php if(Auth::user()->hasRole(['administrator'])): ?>
      <a href="controlpanel/department" class="services-outer">
      <div class="col-md-3 wow fadeInDown avesome-pic" data-wow-duration="1000ms" data-wow-delay="1200ms">
        <i class="fa fa-gear"></i>
        <h3>Šifarnici</h3>
        <p>Unos novih korisnika, organa, opština, jedinica, klasa.</p>
      </div>
      </a>
      <?php endif; ?>
    </div>
  </div>