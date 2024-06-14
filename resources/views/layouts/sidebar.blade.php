  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item   {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid {{ Request::is('dashboard') ? 'text-white' : '' }}"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Pages</li>

      <li class="nav-item   {{ Request::is('categorie') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('categorie')}}">
          <i class="bx bxs-building {{ Request::is('categorie') ? 'text-white' : '' }}"></i>
          <span>Kategori</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item   {{ Request::is('subcategorie') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('subcategorie')}}">
          <i class="bx bxs-building {{ Request::is('subcategorie') ? 'text-white' : '' }}"></i>
          <span>Sub Kategori</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item   {{ Request::is('admin/product') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('product')}}">
          <i class="bx bxl-product-hunt {{ Request::is('admin/product') ? 'text-white' : '' }}"></i>
          <span>Produk</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item   {{ Request::is('admin/user') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('user')}}">
          <i class="bx bxs-user {{ Request::is('admin/user') ? 'text-white' : '' }}"></i>
          <span>Pengguna</span>
        </a>
      </li>

      <li class="nav-item   {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('admin')}}">
          <i class="ri-user-settings-fill {{ Request::is('admin') ? 'text-white' : '' }}"></i>
          <span>Admin</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->