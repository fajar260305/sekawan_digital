@include('dashboard.layout.header')
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layout.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kendaraan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

  <form class="row g-3" enctype="multipart/form-data" action="/dashboard/kendaraan/{{ $kendaraans->id }}" method="POST">
      @method('PUT')
      @csrf
      <div class="row mt-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Mobil</label>
          <input type="text" class="form-control @error('mobil') is-invalid @enderror" value="{{ $kendaraans->mobil }}" name="mobil" id="inputEmail4">
          @error('mobil')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Gambar</label>
          <input type="hidden" class="form-control @error('image') is-invalid @enderror" value="{{ $kendaraans->gambar }}" name="oldimage" id="inputPassword4">
          <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ $kendaraans->gambar }}" name="image" id="inputPassword4">
          @error('image')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-12 mb-4 mt-3">
          <label for="inputAddress" class="form-label">Konsumsi BBM</label>
          <input type="number" class="form-control @error('konsumsi_bbm') is-invalid @enderror" value="{{ $kendaraans->konsumsi_bbm }}" name="konsumsi_bbm" id="inputAddress" placeholder="Satuan liter">
          @error('konsumsi_bbm')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputAddress2" class="form-label">Jadwal Service</label>
          <input type="date" class="form-control @error('jadwal_service') is-invalid @enderror" value="{{ $kendaraans->jadwal_service }}" name="jadwal_service" id="inputAddress2" placeholder="Apartment, studio, or floor">
          @error('jadwal_service')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Jumlah</label>
          <input type="number" class="form-control @error('jumlah') is-invalid @enderror" value="{{ $kendaraans->jumlah }}" name="jumlah" id="inputCity">
          @error('jumlah')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="modal-footer mt-3">
          <button type="sumbit" class="btn btn-primary ms-2">Edit Kendaraan</button>
        </div>
      </div>
  </form>

      
</main>
</div>
</div>


@include('dashboard.layout.footer')