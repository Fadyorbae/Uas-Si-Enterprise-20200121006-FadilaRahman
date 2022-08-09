@extends('layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <div class="pagetitle">
                <h1>Kontrak Matakuliah</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Kontrak Matakuliah</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i> Tambah Kontrak Matakuliah
            </button>
            <table class="mt-3 table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kontrak as $datakontrak)
                        <tr class="table-hover">
                            <th scope="row">{{ $loop->iteration }}</th> 
                            <td scope="col">{{ $datakontrak->mahasiswa->nama_mahasiswa }}</td>
                            <td scope="col">{{ $datakontrak->semester->semester }}</td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col d-flex">
                                        {{-- Edit --}}  
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $datakontrak->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete --}}
                                        <form action="/mahasiswa/{{ $datakontrak->id }}" method="post">
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

                        <div class="modal fade" id="staticBackdrop{{ $datakontrak->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Kontrak Matakuliah</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="/kontrak/{{ $datakontrak->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="mahasiswa_id">Nama Mahasiswa :</label>
                                                        <select name="mahasiswa_id">
                                                            <option disabled selected>Pilih Mahasiswa</option>
                                                            @foreach ($mahasiswa as $datamahasiswa)
                                                                <option value="{{ $datamahasiswa->id }}">
                                                                    {{ $datamahasiswa->nama_mahasiswa }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="semester_id">Semester :</label>
                                                        <select name="semester_id">
                                                            <option disabled selected>Pilih Semester</option>
                                                            @foreach ($semester as $datasemester)
                                                                <option value="{{ $datasemester->id }}">
                                                                    {{ $datasemester->semester }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Kontrak Matakuliah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/kontrak" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col">
                                        <label for="mahasiswa_id">Nama Mahasiswa :</label>
                                        <select name="mahasiswa_id">
                                            <option disabled selected>Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $datamahasiswa)
                                                <option value="{{ $datamahasiswa->id }}">
                                                    {{ $datamahasiswa->nama_mahasiswa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="semester_id">Semester :</label>
                                        <select name="semester_id">
                                            <option disabled selected>Pilih Semester</option>
                                            @foreach ($semester as $datasemester)
                                                <option value="{{ $datasemester->id }}">
                                                    {{ $datasemester->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
