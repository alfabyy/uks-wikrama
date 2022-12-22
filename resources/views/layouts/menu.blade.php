
 {{-- Admin --}}
 @if (Auth::user()->role == 'admin')
     <hr class="my-0 sidebar-divider">
     <li class="nav-item active">
         <a class="nav-link" href="/home">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Rekam Medis
     </div>
     <li class="nav-item">
         <a class="nav-link" href="#">
             <i class="fas fa-book-medical"></i>
             <span>Rekam Medis</span>
         </a>
         <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Rekam Medis</h6>
                 <a class="collapse-item" href="/rekam-medis">Rekam Medis</a>
                 <h6 class="collapse-header">Pasien</h6>
                 <a class="collapse-item" href="/rawat">Rawat</a>
                 <a class="collapse-item" href="/rawat-jalan">Rawat Jalan</a>
                 <a class="collapse-item" href="/dirujuk">Dirujuk</a>
                 <a class="collapse-item" href="/sembuh">Sembuh</a>
             </div>
         </div>
     </li>
     <br>
     <div class="sidebar-heading">
         Menu
     </div>
     <li class="nav-item">
         <a class="nav-link" href="/data-sakit">
             <i class="fas fa-notes-medical"></i>
             <span>Data Pasien</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/pasien">
             <i class="fas fa-user"></i>
             <span>Data Siswa</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/obat">
             <i class="fas fa-pills"></i>
             <span>Data Obat</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/medical-check-up">
             <i class="fas fa-file-medical-alt"></i>
             <span>Medical Check Up</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/riwayat-penyakit">
             <i class="fas fa-history"></i>
             <span>Riwayat Penyakit</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/petugas">
             <i class="fas fa-user-md"></i>
             <span>Petugas UKS</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/rayon">
             <i class="fas fa-fw fa-users"></i>
             <span>Rayon</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/rombel">
             <i class="fas fa-id-card"></i>
             <span>Rombel</span>
         </a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link">
             <i class="fas fa-info"></i>
             <span>1.1.0 version</span>
         </a>
     </li>

{{-- Admin --}}
{{-- @if (Auth::user()->role == 'admin') --}}
    <hr class="my-0 sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Rekam Medis
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fas fa-book-medical"></i>
            <span>Rekam Medis</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Rekam Medis</h6>
                <a class="collapse-item" href="/rekam-medis">Rekam Medis</a>
                <h6 class="collapse-header">Pasien</h6>
                <a class="collapse-item" href="/rawat-sementara">Rawat Sementara</a>
                <a class="collapse-item" href="/rawat">Rawat</a>
                <a class="collapse-item" href="/dirujuk">Dirujuk</a>
                <a class="collapse-item" href="/sembuh">Sembuh</a>
            </div>
        </div>
    </li>
    <br>
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/pasien">
            <i class="fas fa-notes-medical"></i>
            <span>Data Pasien</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/siswa">
            <i class="fas fa-user"></i>
            <span>Data Siswa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/obat">
            <i class="fas fa-pills"></i>
            <span>Data Obat</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="/medical-check-up">
            <i class="fas fa-file-medical-alt"></i>
            <span>Medical Check Up</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/riwayat-penyakit">
            <i class="fas fa-history"></i>
            <span>Riwayat Penyakit</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-user-md"></i>
            <span>Petugas UKS</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/rayon">
            <i class="fas fa-fw fa-users"></i>
            <span>Rayon</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/rombel">
            <i class="fas fa-id-card"></i>
            <span>Rombel</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-info"></i>
            <span>1.1.0 version</span>
        </a>
    </li>


     {{-- Petugas --}}
 @elseif(Auth::user()->role == 'petugas')
     <hr class="my-0 sidebar-divider">
     <li class="nav-item active">
         <a class="nav-link" href="/home">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Rekam Medis
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
             aria-expanded="true" aria-controls="collapseBootstrap">
             <i class="fas fa-book-medical"></i>
             <span>Rekam Medis</span>
         </a>
         <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Rekam Medis</h6>
                 <a class="collapse-item" href="/rekam-medis">Rekam Medis</a>
                 <h6 class="collapse-header">Pasien</h6>
                 <a class="collapse-item" href="/rawat">Rawat</a>
                 <a class="collapse-item" href="/rawat-jalan">Rawat Jalan</a>
             </div>
         </div>
     </li>
     <br>
     <div class="sidebar-heading">
         Menu
     </div>
     <li class="nav-item">
         <a class="nav-link" href="/data-sakit">
             <i class="fas fa-fw fa-medkit"></i>
             <span>Riwayat Penyakit</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/pasien">
             <i class="fas fa-fw fa-users"></i>
             <span>Data Pasien</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/obat">
             <i class="fas fa-pills"></i>
             <span>Data Obat</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/jabatan">
             <i class="fas fa-id-card"></i>
             <span>Jabatan</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/info">
             <i class="far fa-newspaper"></i>
             <span>Info UKS</span>
         </a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link">
             <i class="fas fa-info"></i>
             <span>1.1.0 version</span>
         </a </li>

         {{-- Else / Visitor --}}
     @else
         <hr class="my-0 sidebar-divider">
     <li class="nav-item active">
         <a class="nav-link" href="/home">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Menu
     </div>
     <li class="nav-item">
         <a class="nav-link" href="/obat">
             <i class="fas fa-pills"></i>
             <span>Data Obat</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/info">
             <i class="far fa-newspaper"></i>
             <span>Info UKS</span>
         </a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link">
             <i class="fas fa-info"></i>
             <span>1.1.0 version</span>
         </a>
     </li>
 @endif
