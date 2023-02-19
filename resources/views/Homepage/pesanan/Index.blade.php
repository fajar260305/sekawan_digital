@extends('Homepage.layout.Header')

@section('container')

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid m-0">
        <a class="navbar-brand" href="#">Sewa Mobil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard/pesanan">List pesanan</a></li>
                <li><a class="dropdown-item" href="/dashboard/kendaraan">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="menu-link bg-white border-0 ms-2">
                      <i class="menu-icon tf-icons bx bx-log-out"></i>
                      <div data-i18n="Analytics">Logout</div>
                    </button>
                  </form>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
            </ul>
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>



{{-- carousel --}}
<div class="row border-bottom" style="padding-top: 70px; padding-bottom: 70px;">
    <div class="col-xl-6 col-xs-12 col-md-12">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../../storage/avanza.jpg" class="d-block w-100 rounded-pill" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../../storage/avanza.jpg" class="d-block w-100 rounded-pill" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../../storage/avanza.jpg" class="d-block w-100 rounded-pill" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div  class="col-xl-6 col-xs-12 col-md-12">
        <div class="w-100 h-100 d-flex align-items-center">
            <div class="p-5">
                <h3>Sewa Mobil</h3>
                <p>tempat penyewaan mobil termurah dan terlengkap, dijamin mobil dalam keadaan baik dan berfungsi</p>
                <button class="btn btn-dark">
                    <a href="#list_pesanan" class="text-decoration-none text-white">
                        Pesan <i class="bi bi-arrow-down-short"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- List Pesanan --}}
<div class="w-100 mb-5">
    <div class="pt-3 mb-5 mt-1">
        <h4 class="d-inline border-bottom">Daftar Mobil</h4>
    </div>
    <div class="row" id="list_pesanan">
        <div class="col-lg-3 col-6 col-sm-6 d-flex justify-content-center align-items-center pt-2 pb-2">
            <div class="card" style="width: 18rem;">
                <img src="../../storage/avanza.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Avanza Type G</h5>
                    <a href="/dashboard/pesanan" class="btn btn-dark">Pesan <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-sm-6 d-flex justify-content-center align-items-center pt-2 pb-2">
            <div class="card" style="width: 18rem;">
                <img src="../../storage/avanza.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pajero Sport Dakar</h5>
                    <a href="/dashboard/pesanan" class="btn btn-dark">Pesan <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-sm-6 d-flex justify-content-center align-items-center pt-2 pb-2">
            <div class="card" style="width: 18rem;">
                <img src="../../storage/avanza.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Honda CRV</h5>
                    <a href="/dashboard/pesanan" class="btn btn-dark">Pesan <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-sm-6 d-flex justify-content-center align-items-center pt-2 pb-2">
            <div class="card" style="width: 18rem;">
                <img src="../../storage/avanza.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Xpander Cross</h5>
                    <a href="/dashboard/pesanan" class="btn btn-dark">Pesan <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
<footer class="content-footer footer text-end bg-dark pt-3 pb-3">
    <div class="row container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="col-4 mb-2 mb-md-0 text-white p-4">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , made with ✨ by
        <a href="https://www.instagram.com/fjr_rshk"  class="text-decoration-none me-3 fw-bolder text-white">fajarusshodik</a>
      </div>
      {{-- <div>
        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

        <a
          href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
          target="_blank"
          class="footer-link me-4"
          >Documentation</a
        >

        <a
          href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
          target="_blank"
          class="footer-link me-4"
          >Support</a
        >
      </div> --}}
    </div>
  </footer>


@endsection

