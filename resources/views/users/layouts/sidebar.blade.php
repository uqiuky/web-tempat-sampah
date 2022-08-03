    {{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 pt-2 d-md-block sidebar collapse greenblue" style="background-color: #444e3f;">
        <div class="position-sticky">
            <a href="/" class="d-flex align-items-center px-3 mb-3 mb-md-0 me-md-auto text-decoration-none link-light">
              <img src="img/trash-bin.png"  width="50" height="50" alt="">
              <span class="fs-3 ps-3">SAMPAH PINTAR</span>
            </a>
            <div class="container-fluid mt-3 mb-3 px-3">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
            </form>
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard">
                <span data-feather="home"></span>
                    Dashboard
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pekerja">
                <span data-feather="shopping-cart"></span>
                    Data Pekerja
              </a>
            </li>     
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="text-light">Riwayat Data Sampah</span>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                      Bulanan
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Mingguan
                </a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                      Harian
                </a>
              </li>
            </ul>
            <div class="dropdown px-3 mt-4 mb-4 fixed-bottom">
              <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/syauqi_foto.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Halo, Syauqi!</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="../account">Profile</a></li>
                <li><a class="dropdown-item"href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="..">Sign out</a></li>
                </ul>
            </div>
          </ul>
        </div>
      </nav> --}}

    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">SAMPAH PINTAR</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            {{-- <li>
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search..." />
                <span class="tooltip">Search</span>
            </li> --}}
            <li>
                <a href="/dashboard">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="/data">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Riwayat Data</span>
                </a>
                <span class="tooltip">Riwayat Data</span>
            </li>
            {{-- @if ($user->is_admin === 1) --}}
            <li>
                <a href="/pekerja">
                    <i class="bx bx-folder"></i>
                    <span class="links_name">Data Pekerja</span>
                </a>
                <span class="tooltip">Data Pekerja</span>
            </li>
            {{-- @endif --}}
            {{-- <li>
                <a href="#">
                    <i class="bx bx-bell"></i>
                    <span class="links_name">Notifikasi</span>
                </a>
                <span class="tooltip">Notifikasi</span>
            </li> --}}
            <div class="position-absolute bottom-0 ">
                <li class="">
                    <a href="pekerja/show">
                        <i class="bx bx-cog"></i>
                        <span class="links_name">Settings</span>
                    </a>
                    <span class="tooltip">Settings</span>
                </li>
                <li class="">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="bx bx-log-out"></i>
                            <span class="links_name">Logout</span></button>
                        <span class="tooltip">Logout</span>
                        {{-- <a href="/login" role="button" type="submit">
                            <i class="bx bx-log-out"></i>
                            <span class="links_name">Logout</span>
                        </a> --}}
                        <span class="tooltip">Logout</span>
                    </form>
                </li>
            </div>
            {{-- <li class="profile">
                <div class="profile-details">
                    <img src="img/syauqi_foto.png" class="rounded" alt="profileImg" />
                    <div class="name_job">
                        <div class="name">Syauqi Mubarak</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
            </li> --}}
        </ul>
    </div>
