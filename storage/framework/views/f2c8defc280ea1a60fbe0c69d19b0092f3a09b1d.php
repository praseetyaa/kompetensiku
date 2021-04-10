
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/applicant">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/applicant">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php if($var_tw): ?>
        <?php if($var_tw->buka == 1): ?>
          <!-- Heading -->
          <div class="sidebar-heading">
            Test
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link" href="/applicant/tahap-wawancara">
              <i class="fas fa-fw fa-clipboard"></i>
              <span>Tahap Wawancara</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/applicant/disc">
              <i class="fas fa-fw fa-clipboard"></i>
              <span>DISC Test</span></a>
          </li>
        <?php endif; ?>
      <?php endif; ?>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" title="Show/Hide Sidebar"></button>
      </div>

    </ul>
    <!-- End of Sidebar --><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/template/applicant/_sidebar.blade.php ENDPATH**/ ?>