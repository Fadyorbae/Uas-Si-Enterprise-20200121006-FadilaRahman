@extends('layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="container">
            <div class="pagetitle">
                <h1>Semester
                </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Semester</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i> Tambah Data Semester
            </button>
            <table class="mt-3 table table-hover table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Semester</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datasemester)
                        <tr class="table-hover">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $datasemester->semester }}</td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col d-flex">
                                        {{-- Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $datasemester->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete --}}
                                        <form action="semester/{{ $datasemester->id }}" method="post">
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

                        <div class="modal fade" id="staticBackdrop{{ $datasemester->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Semester</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form action="/semester/{{ $datasemester->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="col d-flex justify-between my-3 align-items-center">
                                                    <label for="semester">Semester :</label>
                                                    <input type="text" name="semester"
                                                        value="{{ $datasemester->semester }}" />
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
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Data Semester</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/semester" method="post">
                                @csrf
                                @method('post')
                                <div class="col d-flex justify-between my-3 align-items-center">

                                    <label for="semester">Semester :</label>
                                    <input name="semester" type="number" placeholder="Jumlah Semester" />
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
