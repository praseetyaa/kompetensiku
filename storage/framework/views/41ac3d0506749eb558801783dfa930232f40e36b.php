
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/admin/posisi">
          <i class="fas fa-fw fa-route"></i>
          <span>Posisi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/lowongan">
          <i class="fas fa-fw fa-bolt"></i>
          <span>Lowongan</span></a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link" href="/admin/keahlian">
          <i class="fas fa-fw fa-user-ninja"></i>
          <span>Keahlian</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="/admin/agama">
          <i class="fas fa-fw fa-mosque"></i>
          <span>Agama</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/seleksi">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Seleksi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/tes">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Tes</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/hasil">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Hasil Tes</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/admin/list">
          <i class="fas fa-fw fa-user-secret"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/hrd">
          <i class="fas fa-fw fa-user-shield"></i>
          <span>HRD</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/pelamar">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Pelamar</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/role">
          <i class="fas fa-fw fa-chair"></i>
          <span>Role</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Test
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php $__currentLoopData = $global_tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="nav-item">
        <a class="nav-link" href="/admin/tes/tipe/<?php echo e($data->id_tes); ?>">
          <i class="fas fa-fw fa-clipboard"></i>
          <span><?php echo e($data->nama_tes); ?></span></a>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>DISC</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom DISC:</h6>
            <a class="collapse-item" href="/admin/disc">List Soal</a>
            <a class="collapse-item" href="/admin/disc/create">Tambah Soal</a>
            <a class="collapse-item" href="/admin/disc/tutorial">Tutorial</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" title="Show/Hide Sidebar"></button>
      </div>

    </ul>
    <!-- End of Sidebar --><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/template/admin/_sidebar.blade.php ENDPATH**/ ?>