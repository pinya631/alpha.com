    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item <?php if($this->uri->segment(1)==""){echo "active";}?>">
        <a class="nav-link" href="<?php echo site_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1)=="users"){echo "active";}?>">
        <a class="nav-link" href="<?php echo site_url('users'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item dropdown <?php if($this->uri->segment(1)=="dashboard"){echo "show";} ?>">
        <a class="nav-link dropdown-toggle " href="#" id="userPageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="<?php if($this->uri->segment(1)=="dashboard"){echo "true";}else{echo"false";} ?>">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Users</span>
        </a>
        <div class="dropdown-menu <?php if($this->uri->segment(1)=="users"){echo "show";} ?>" aria-labelledby="userPageDropdown">
          <a class="dropdown-item <?php if($this->uri->segment(1)=="dashboard"){echo "active";} ?>" href="<?php echo site_url(); ?>">View Users</a>
          <a class="dropdown-item" href="<?php echo site_url('users'); ?>">Add User</a>
        </div>
      </li>

      <li class="nav-item <?php if($this->uri->segment(1)=="company"){echo "active";}?>">
        <a class="nav-link" href="<?php echo site_url(); ?>">
          <i class="fas fa-fw fa-building"></i>
          <span>Companies</span></a>
      </li>
      <li class="nav-item dropdown <?php if($this->uri->segment(1)=="dashboard"){echo "show";} ?>">
        <a class="nav-link dropdown-toggle " href="#" id="userPageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="<?php if($this->uri->segment(1)=="dashboard"){echo "true";}else{echo"false";} ?>">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Profile</span>
        </a>
        <div class="dropdown-menu <?php if($this->uri->segment(1)=="dashboard"){echo "show";} ?>" aria-labelledby="userPageDropdown">
          <a class="dropdown-item <?php if($this->uri->segment(1)=="dashboard"){echo "active";} ?>" href="<?php echo site_url(); ?>">My Profile</a>
          <a class="dropdown-item" href="<?php echo site_url('dashboard'); ?>">Edit Account</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">Edit Personal</a>
          <a class="dropdown-item" href="<?php echo site_url(); ?>">My Reviews</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-cog"></i>
          <span>Developer Tools</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url(); ?>">API Integration</a>
        </div>
      </li>
    </ul>