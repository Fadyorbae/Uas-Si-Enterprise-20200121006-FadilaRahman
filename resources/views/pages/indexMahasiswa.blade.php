@extends('layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <div class="pagetitle">
                <h1>Mahasiswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i> Tambah Data Mahasiswa
            </button>
            <table class="mt-3 table table-striped table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nama Mahasiswa</td>
                        <td>Alamat</td>
                        <td>No Telephone</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datamahasiswa)
                        <tr class="table-hover">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datamahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $datamahasiswa->alamat }}</td>
                            <td>{{ $datamahasiswa->no_tlp }}</td>
                            <td>{{ $datamahasiswa->email }}</td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col d-flex">
                                        {{-- Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $datamahasiswa->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete --}}
                                        <form action="/mahasiswa/{{ $datamahasiswa->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn btn-sm btn-danger ml-2" theme="danger"><i
                                                    class="bi bi-trash"></i></button>

                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>

                        {{-- Modal Edit --}}

                        <div class="modal fade" id="staticBackdrop{{ $datamahasiswa->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Mahasiswa</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="/mahasiswa/{{ $datamahasiswa->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="col d-flex justify-between my-3 align-items-center">
                                                    <label for="email">Email :</label>
                                                    <input name="email" required type="email"
                                                        value="{{ $datamahasiswa->email }}">
                                                </div>
                                                <div class="col d-flex justify-between my-3 align-items-center">

                                                    <label for="nama">Nama Mahasiswa :</label>
                                                    <input name="nama_mahasiswa" type="text"
                                                        value="{{ $datamahasiswa->nama_mahasiswa }}" />
                                                </div>

                                                <div class="col d-flex justify-between my-3 align-items-center">

                                                    <label for="alamat">Alamat :</label>
                                                    <input name="alamat" type="text"
                                                        value="{{ $datamahasiswa->alamat }}" />
                                                </div>
                                                <div class="col d-flex justify-between my-3 align-items-center">

                                                    <label for="no_tlp">Nomer Telepon :</label>
                                                    <input name="no_tlp" type="number"
                                                        value="{{ $datamahasiswa->no_tlp }}" />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                                class="bi bi-x-square-fill"></i></button>
                                        <button type="Submit" class="btn btn-success"><i
                                                class="bi bi-check-lg"></i></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    @endforeach
            </table>
        </div>

        {{-- Modal Tambah --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah data mahasiswa</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/mahasiswa" method="post">
                                @csrf
                                @method('post')
                                <div class="col d-flex justify-between my-3 align-items-center">
                                    <label for="email">Email :</label>
                                    <input name="email" required type="email" placeholder="Masukkan Email" />
                                </div>

                                <div class="col d-flex justify-between my-3 align-items-center">

                                    <label for="nama">Nama Mahasiswa :</label>
                                    <input name="nama_mahasiswa" type="text" placeholder="Masukkan Nama Mahasiswa" />
                                </div>

                                <div class="col d-flex justify-between my-3 align-items-center">

                                    <label for="alamat">Alamat :</label>
                                    <input name="alamat" type="text" placeholder="Masukkan Alamat Mahasiswa" />
                                </div>
                                <div class="col d-flex justify-between my-3 align-items-center">

                                    <label for="notlp">Nomer Telepon :</label>
                                    <input name="no_tlp" type="number"
                                        placeholder="Masukkan Nomer Telepon Mahasiswa" />
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-square-fill"></i></button>
                        <button type="Submit" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                    </div>
                    </form>
                </div>
            </div>
    </main>
@endsection
