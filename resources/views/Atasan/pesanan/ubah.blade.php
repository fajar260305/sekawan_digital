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

      {{-- Form edit pesanan --}}
      <form class="row g-3" action="/dashboard/pesanan/{{ $pesanans->id }}" method="POST">
        @method('put')
        @csrf
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Driver</label>
          <input type="text" class="form-control @error('driver') is-invalid @enderror" value="{{ $pesanans->driver }}" name="driver" id="inputPassword4">
          @error('driver')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">No hp</label>
          <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ $pesanans->telp }}" name="telp" id="inputCity">
          @error('telp')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Mobil</label>
          <select class="form-select  @error('mobil_id') is-invalid @enderror" name="mobil_id">
            @foreach ($kendaraans as $Kendaraan)
              @if (old('mobil_id', $pesanans->mobil_id) == $Kendaraan->id)
                <option value="{{ $Kendaraan->id }}" selected>{{ $Kendaraan->mobil }}</option>
              @else
                <option value="{{ $Kendaraan->id }}">{{ $Kendaraan->mobil }}</option>
              @endif
            @endforeach
          </select>
          @error('mobil_id')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputAddress2" class="form-label">Atasan</label>
          <select class="form-select  @error('atasan_id') is-invalid @enderror" name="atasan_id">
            @foreach ($atasans as $atasan)
              @if (old('atasan_id', $pesanans->atasan_id) == $atasan->id)
                <option value="{{ $atasan->id }}" selected>{{ $atasan->name }}</option>
              @else
                <option value="{{ $atasan->id }}">{{ $atasan->name }}</option>
              @endif
            @endforeach
          </select>
          @error('atasan_id')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-12 mt-3">
          <label for="inputPassword4" class="form-label">Plat Mobil</label>
          <input type="text" class="form-control @error('plat_mobil') is-invalid @enderror" value="{{ $pesanans->plat_mobil }}" name="plat_mobil" id="inputPassword4">
          @error('plat_mobil')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class=" modal-footer mt-3">
          <button type="sumbit" class="btn btn-primary ms-2">Edit Pesanan</button>
        </div>
      </form>
</div>
</div>


@include('dashboard.layout.footer')