@extends('layout.main')
@section('content')
<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 my-4">Daftar Calon Mahasiswa</h1>
        

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Mahasiswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="row g-3 mt-1">
                        <div class="col">
                            <label>Email</label>
                            <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Email Mahasiswa" name="email">
                            </div>
                        </div>
                        <div class="col">
                            <label>Password</label>
                            <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mt-1">
                        <div class="col">
                            <label>Nama</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama">
                        </div>
                        </div>
                        <div class="col">
                            <label>Nomor Telepon</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="No Telepon" name="telepon">
                            </div>
                        </div>
                    </div>  
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label>Fakultas</label>
                            <select class="custom-select" name="fakultas">
                                <option value="Kedokteran">Kedokteran</option>
                                <option value="-" selected>-</option>
                                <option value="Informatika">Informatika</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Jurusan</label>
                            <select class="custom-select" name="jurusan">
                                  <option value="Dokter Gigi">Dokter Gigi</option>
                                  <option value="Dokter Umum">Dokter Umum</option>
                                  <option value="-" selected>-</option>
                                  <option value="Sistem Informasi">Sistem Informasi</option>
                                  <option value="Teknik Informatika">Teknik Informatika</option>
                                  <option value="Teknik Komputer">Teknik Komputer</option>
                            </select>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
              </div>
            </div>
          </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#addModal">+ Tambah Mahasiswa</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Status</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $mahasiswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->fakultas }}</td>
                                <td>{{ $mahasiswa->jurusan }}</td>
                                <td>{{ $mahasiswa->email }}</td>
                                <td>{{ $mahasiswa->telepon }}</td>
                                <td>{{ ($mahasiswa->status == 1) ? 'Aktif' : 'Non-Aktif' }}</td>
                                <td class="d-flex">
                                    <button class="btn btn-warning mx-1" data-toggle="modal" data-target="#exampleModal{{$mahasiswa->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </button>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                    
                                    <button class="btn btn-danger mx-1" onclick="return confirm('Delete Mahasiswa?')">
                                        <i class="fas fa-fw fa-ban"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            
                            
                            <!-- Modal Edit -->
                            <div class="modal fade" id="exampleModal{{$mahasiswa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label>Nama</label>
                                            <div class="input-group mb-3">
                                              <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama" value="{{ $mahasiswa->nama }}">
                                            </div>
                                        <div class="row g-3 mt-1">
                                            <div class="col">
                                                <label>Email</label>
                                                <div class="input-group mb-3">
                                                  <input type="email" class="form-control" placeholder="Email Mahasiswa" name="email" value="{{ $mahasiswa->email }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Nomor Telepon</label>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" placeholder="No Telepon" name="telepon" value="{{ $mahasiswa->telepon }}">
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="row g-3 mb-3">
                                            <div class="col">
                                                <label>Fakultas</label>
                                                <select class="custom-select" name="fakultas">
                                                    <option value="Kedokteran" {{ ($mahasiswa->fakultas == "Kedokteran") ? 'selected' : '' }}>Kedokteran</option>
                                                    <option value="-">-</option>
                                                    <option value="Informatika" {{ ($mahasiswa->fakultas == "Informatika") ? 'selected' : '' }}>Informatika</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Jurusan</label>
                                                <select class="custom-select" name="jurusan">
                                                      <option value="Dokter Gigi" {{ ($mahasiswa->jurusan == "Dokter Gigi") ? 'selected' : '' }}>Dokter Gigi</option>
                                                      <option value="Dokter Umum" {{ ($mahasiswa->jurusan == "Dokter Umum") ? 'selected' : '' }}>Dokter Umum</option>
                                                      <option value="-">-</option>
                                                      <option value="Sistem Informasi" {{ ($mahasiswa->jurusan == 'Sistem Informasi') ? 'selected' : '' }}>Sistem Informasi</option>
                                                      <option value="Teknik Informatika" {{ ($mahasiswa->jurusan == "Teknik Informatika") ? 'selected' : '' }}>Teknik Informatika</option>
                                                      <option value="Teknik Komputer" {{ ($mahasiswa->jurusan == "Teknik Komputer") ? 'selected' : '' }}>Teknik Komputer</option>
                                                </select>
                                            </div>
                                          </div>
                                          <label>Status</label>
                                                <select class="custom-select" name="status">
                                                  <option value="1" {{ ($mahasiswa->status == 1) ? 'selected' : '' }}>Aktif</option>
                                                  <option value="0" {{ ($mahasiswa->status == 0) ? 'selected' : '' }}>Non-Aktif</option>
                                                </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Simpan perubahan</button>
                                    </div>
                                </form>
                                  </div>
                                </div>
                              </div>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection