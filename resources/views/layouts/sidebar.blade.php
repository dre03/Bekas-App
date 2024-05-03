  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item   {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid {{ Request::is('/') ? 'text-white' : '' }}"></i>
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

      <li class="nav-item   {{ Request::is('product') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('product')}}">
          <i class="bx bxl-product-hunt {{ Request::is('product') ? 'text-white' : '' }}"></i>
          <span>Produk</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item   {{ Request::is('customer') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{route('customer')}}">
          <i class="bi bi-people {{ Request::is('customer') ? 'text-white' : '' }}"></i>
          <span>Pengguna</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->