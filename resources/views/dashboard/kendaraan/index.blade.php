@include('dashboard.layout.header')
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/homepage">Sewa Kendaraan</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-dark" style="">
          <i class="menu-icon tf-icons bx bx-log-out"></i>
          <div data-i18n="Analytics">Logout</div>
        </button>
      </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layout.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      {{-- Tabel Kendaraan --}}
      <div class="row">
        <div class="col">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kendaraan
          </button>

          <!-- form tambah kendaraan -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 500px;">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kendaraan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3" enctype="multipart/form-data" action="/dashboard/kendaraan" method="POST">
                    @method('POST')
                    @csrf
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Mobil</label>
                      <input type="text" class="form-control @error('mobil') is-invalid @enderror" name="mobil" id="inputEmail4">
                      @error('mobil')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Gambar</label>
                      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="inputPassword4">
                      @error('image')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Konsumsi BBM</label>
                      <input type="number" class="form-control @error('konsumsi_bbm') is-invalid @enderror" name="konsumsi_bbm" id="inputAddress" placeholder="Satuan liter">
                      @error('konsumsi_bbm')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-6">
                      <label for="inputAddress2" class="form-label">Jadwal Service</label>
                      <input type="date" class="form-control @error('jadwal_service') is-invalid @enderror" name="jadwal_service" id="inputAddress2" placeholder="Apartment, studio, or floor">
                      @error('jadwal_service')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Jumlah</label>
                      <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="inputCity">
                      @error('jumlah')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="sumbit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      {{-- Table Kendaraan --}}
      <div class="table-responsive">
        <table class="table table-white table-striped table-responsive">
          <thead class="table-dark">
            <tr>
              <th class="col">No</th>
              <th class="col">Gambar</th>
              <th class="col">Mobil</th>
              <th class="col">Konsumsi BBM</th>
              <th class="col">Jadwal Service</th>
              <th class="col">Jumlah</th>
              <th class="col" style="width: 130px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraans as $kendaraan)    
            <tr>
              <td class="col pt-3">{{ $loop->iteration }}</td>
              <td class="col">
                <img src="{{ asset('../../storage/'.$kendaraan->image) }}" width="80px" alt="">
              </td>
              <td class="col pt-3">{{ $kendaraan->mobil }}</td>
              <td class="col pt-3">{{ $kendaraan->konsumsi_bbm }} liter</td>
              <td class="col pt-3">{{ $kendaraan->jadwal_service }}</td>
              <td class="col pt-3">{{ $kendaraan->jumlah }} unit</td>
              <td class="col pt-3">
                <a href="/dashboard/kendaraan/{{ $kendaraan->id }}/edit" class="btn btn-outline-primary">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <form action="/dashboard/kendaraan/{{ $kendaraan->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-outline-primary mt-2 mb-2">
                    <i class="bi bi-trash3"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </main>
  </div>
</div>


@include('dashboard.layout.footer')
