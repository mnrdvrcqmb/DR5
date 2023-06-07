<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}



.header a {
  float: left;
  color: black;
  text-align: center;
  
}

.header img {
  width: 100px;
  height: 110px;
  position: absolute;
  top: -10px; 
   left: 5vw;
   padding-bottom: 9px;


}

.header a.logo {
  font-size: 15px;
  font-weight: bold;


}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>

            <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
              <div class="header">
  <img src="includes\DR5Logow.png" alt="logo" />
        <div class="container">
      <div class="row align-items-center position-relative">
  <div class="header-right">
  </div>
            </div>
           <body>
</div>
            <div class="col-12" style="flex: 1; text-align: right;">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="#home-section" class="nav-link">Home</a></li>
                 <li><a href="#about-section" class="nav-link">About Us</a></li>
<li><a href="#branch-section" class="nav-link">Branch</a></li>
 <li><a href="#contact-section" class="nav-link">Contact</a></li>
 <li class="has-children">
                    <a href="#about-section" class="nav-link">Complaint</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="raise-complaint.php" class="nav-link">Raise Complaint</a></li>
                      <li><a href="track-complain.php" class="nav-link">Track Complaint</a></li>
                    </ul>
                  </li>
<li><a href="staff/index.php" class="nav-link">Employee</a></li>
<li><a href="admin/index.php" class="nav-link">Admin</a></li>
                </ul>
              </nav>
            </div>
            </div>
            </div>
            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </header>
