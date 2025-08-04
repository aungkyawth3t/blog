<x-layout>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <!-- Sidebar -->
      <div class="col-md-2 col-sm-1 min-vh-100 bg-light text-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-4 text-white">
          <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="#" class="nav-link align-middle px-0 text-dark">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-0 align-middle text-dark">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-0 align-middle text-dark">
                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Blogs</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-0 align-middle text-dark">
                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-0 align-middle text-dark">
                <i class="fs-4 bi-gear"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="col-md-10 col-sm-11 py-4">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</x-layout>