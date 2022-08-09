@extends('layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <div class="pagetitle">
                <h1>Jadwal</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i> Tambah Data Jadwal
            </button>
            <table class="mt-3 table table-striped table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td scope="col">Nama Mata Kuliah</td>
                        <td scope="col">Jadwal</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $datajadwal)
                        <tr class="table-hover">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td scope="col">{{ $datajadwal->matakuliah->nama_matkul }}</td>
                            <td scope="col">{{ $datajadwal->jadwal }}</td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col d-flex">
                                        {{-- Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $datajadwal->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete --}}
                                        <form action="/mahasiswa/{{ $datajadwal->id }}" method="post">
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

                        <div class="modal fade" id="staticBackdrop{{ $datajadwal->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Jadwal</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="/jadwal" method="post">
                                                @csrf
                                                @method('post')
                                                <div
                                                    class="col d-flex justify-content-between my-3 align-items-center input-group input-group-sm mb-3">
                                                    <label for="nama_matakuliah">Nama Mataliah :</label>
                                                    <select class="form-select form-select-sm" name="matakuliah_id"
                                                        id="matakuliah_id">
                                                        <option disabled selected value="{{ $datajadwal->matakuliah->id }}">{{ $datajadwal->matakuliah->nama_matkul }}</option>
                                                        @foreach ($matakuliah as $datamatkul)
                                                            <option value="{{ $datamatkul->id }}">
                                                                {{ $datamatkul->nama_matkul }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div
                                                    class="col d-flex justify-content-between my-3 align-items-center input-group input-group-sm mb-3">
                                                    <label for="jadwal">Jadwal :</label>
                                                    <input class="form-control-sm" name="jadwal" type="dateTime-local"
                                                        value="{{ $datajadwal->jadwal }}" />
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
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Data Jadwal</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/jadwal" method="post">
                                @csrf
                                @method('post')
                                <div
                                    class="col d-flex justify-content-between my-3 align-items-center input-group input-group-sm mb-3">
                                    <label for="nama_matakuliah">Nama Mataliah :</label>
                                    <select class="form-select form-select-sm" name="matakuliah_id" id="matakuliah_id">
                                        <option class="" disabled selected>Pilih Mata Kuliah</option>
                                        @foreach ($matakuliah as $datamatkul)
                                            <option value="{{ $datamatkul->id }}">{{ $datamatkul->nama_matkul }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div
                                    class="col d-flex justify-content-between my-3 align-items-center input-group input-group-sm mb-3">
                                    <label for="jadwal">Jadwal :</label>
                                    <input class="form-control-sm" name="jadwal" type="dateTime-local"
                                        placeholder="Masukkan Jadwal" />
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
