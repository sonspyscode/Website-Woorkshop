<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        
        <div class="sidebar-brand-text mx-3">Govice</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Manajemen Service
    </div>
    
    <li class="nav-item <?= $data == 'cabang' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('cabang') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Cabang</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'service' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('service') ?>">
            <i class="fas fa-fw fa-car-alt"></i>
            <span>Data Service</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Manajemen Member & Metode
    </div>

    <li class="nav-item <?= $data == 'member' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('member') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Member</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'jenis_bayar' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('jenis_bayar') ?>">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Data Metode Pembayaran</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Manajemen Order
    </div>

    <li class="nav-item <?= $data == 'saran' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('saran') ?>">
            <i class="fas fa-fw fa-street-view"></i>
            <span>Saran & kritik</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'pesanan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pesanan') ?>">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Data Pesanan</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item <?= $data == 'akun' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('akun') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Admin</span>
        </a>
    </li>
</ul>