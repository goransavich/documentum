<header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <div class="navbar-brand">
            <a href="/dashboard"><h1 class="navbar-title">Pisarnica</h1></a>
          </div>
        </div>
        <div class="navbar-collapse collapse">
          <div class="menu">
             
              <ul class="nav nav-tabs" role="tablist">
              
                <li><a href="/logout">{{Auth::user()->name}}</a></li>

              </ul>

          </div>
        </div>
      </div>
      <!--/.container-->
    </nav>
    <!--/nav-->
  </header>
<!--/header-->