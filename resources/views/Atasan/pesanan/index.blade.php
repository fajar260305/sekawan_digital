@include('Atasan.layout.header')
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Halaman Atasan</a>
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
    @include('Atasan.layout.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      {{-- Tabel Kendaraan --}}
      <div class="row">
        <div class="col">

          <!-- form tambah kendaraan -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 500px;">
              <div class="modal-content">    
                <div class="modal-body">
                  <form class="row g-3" action="/dashboard/pesanan" method="POST">
                    @method('POST')
                    @csrf
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Driver</label>
                      <input type="text" class="form-control @error('driver') is-invalid @enderror" name="driver" id="inputPassword4">
                      @error('driver')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">No hp</label>
                      <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" id="inputCity">
                      @error('telp')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Mobil</label>
                      <select class="form-select  @error('mobil_id') is-invalid @enderror" name="mobil_id">
                        @foreach ($kendaraans as $Kendaraan)
                          @if (old('mobil_id') == $Kendaraan->id)
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
                          @if (old('atasan_id') == $atasan->id)
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
                      <input type="text" class="form-control @error('plat_mobil') is-invalid @enderror" name="plat_mobil" id="inputPassword4">
                      @error('plat_mobil')
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
      <div class="table-responsive">
        <table class="table table-white table-striped table-responsive">
          <thead class="table-dark">
            <tr>
              <th class="col">No</th>
              <th class="col">Gambar</th>
              <th class="col">Mobil</th>
              <th class="col">Driver</th>
              <th class="col">Telp</th>
              <th class="col">Plat Mobil</th>
              <th class="col">Atasan</th>
              <th class="col">Status</th>
              <th class="col" style="width: 130px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pesanans as $pesanan)    
            <tr>
              <td class="col pt-3">No</td>
              <td class="col">
                <img src="{{ asset('../../storage/'. $pesanan->mobil->image) }}" width="80px" alt="">
              </td>
              <td class="col pt-3">{{ $pesanan->mobil->mobil }}</td>
              <td class="col pt-3">{{ $pesanan->driver }}</td>
              <td class="col pt-3">{{ $pesanan->telp }}</td>
              <td class="col pt-3">{{ $pesanan->plat_mobil }}</td>
              <td class="col pt-3">{{ $pesanan->atasan->name }}</td>
              <td class="col pt-3">{{ $pesanan->izin == 0 ? 'Tidak setuju' : 'Setuju' }}</td>
              <td class="col">
                  <button type="submit"{{ $pesanan->izin == 1 ? 'disabled' : '' }} class="btn btn-outline-{{ $pesanan->izin == 1 ? 'secondary' : 'primary' }}" data-bs-toggle="modal" data-bs-target="#example">
                    Setuju <i class="bi bi-check2-square"></i>
                  </button>
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Persetujuan Atasan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yankin menyetujuinya?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="/atasan/{{ $pesanan->id }}/izin" method="post">
                          @csrf
                          <input type="hidden" name="izin" value="1">
                          <button type="submit" class="btn btn-outline-primary">Setujui</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </main>
  </div>
</div>


@include('Atasan.layout.footer')
