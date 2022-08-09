@extends('layouts.app')

@section('content')
    <main id="main" class="main">


        <div class="container">
            <div class="pagetitle">
                <h1>Matakuliah</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Matakuliah</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i> Tambah Data Matakuliah
            </button>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nama Matakuliah</td>
                        <td>SKS</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datamatakuliah)
                        <tr class="table-hover">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datamatakuliah->nama_matkul }}</td>
                            <td>{{ $datamatakuliah->sks }}</td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col d-flex">
                                        {{-- Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $datamatakuliah->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete --}}
                                        <form action="matakuliah/{{ $datamatakuliah->id }}" method="post">
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

                        <div class="modal fade" id="staticBackdrop{{ $datamatakuliah->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Matakuliah</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="/mahasiswa/{{ $datamatakuliah->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="col d-flex justify-between my-3 align-items-center">
                                                    <label for="nama_matkul">Nama Matakuliah :</label>
                                                    <input name="nama_matkul" required type="text"
                                                        value="{{ $datamatakuliah->nama_matkul }}" />
                                                </div>
                                                <div class="col d-flex justify-between my-3 align-items-center">

                                                    <label for="sks">sks :</label>
                                                    <input name="sks" type="number" value="{{ $datamatakuliah->sks }}" />
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
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Data Matakuliah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/matakuliah" method="post">
                                @csrf
                                @method('post')
                                <div class="col d-flex justify-between my-3 align-items-center">
                                    <label for="nama_matkul">Nama Matakuliah :</label>
                                    <input name="nama_matkul" required type="text"
                                        placeholder="Nama Matakuliah" />
                                </div>
                                <div class="col d-flex justify-between my-3 align-items-center">

                                    <label for="sks">sks :</label>
                                    <input name="sks" type="number" placeholder="Total SKS" />
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
