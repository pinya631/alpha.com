    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span><?php echo $dashboard; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span><?php echo $user; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>">
          <i class="fas fa-fw fa-building"></i>
          <span>Companies</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="userPageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Profile</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="userPageDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-cog"></i>
          <span>Developer Tools</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">Login</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">Register</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">404 Page</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">Blank Page</a>
        </div>
      </li>
    </ul>