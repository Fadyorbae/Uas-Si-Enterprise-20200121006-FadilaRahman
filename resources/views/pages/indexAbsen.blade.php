@extends('layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <form action="/absen" method="post">
                @csrf
                @method('post')
                <label class="mb-2" for="mahasiswa_id">Nama Mahasiswa :</label>
                <div class="row d-flex justify-content-between justify-items-center">
                    <div class="col">
                        <select name="mahasiswa_id">
                            <option disabled selected>Pilih Mahasiswa</option>
                            @foreach ($mahasiswa as $datamahasiswa)
                                <option value="{{ $datamahasiswa->id }}">{{ $datamahasiswa->nama_mahasiswa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="matakuliah_id">
                            <option disabled selected>Pilih matakuliah</option>
                            @foreach ($matkul as $datamatakuliah)
                                <option value="{{ $datamatakuliah->id }}">{{ $datamatakuliah->nama_matkul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col" hidden>
                        <input hidden type="datetime-local" class="form-control" name="waktu_absen" value="{{ now() }}">
                    </div>
                    <div class="col">
                        <select name="keterangan">
                            <option disabled selected>Keterangan</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                    {{-- Button --}}
                    <div class="col">
                        <button class="btn-success btn" label="Submit" theme="success"><i class="fas fa-lg fa-save"></i>Submit</button>
                    </div>
                </div>
            </form>
    
            <table class="mt-3 table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Waktu Absen</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="table-group-dividerr">
                    @foreach ($absen as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td scope="col">{{ $data->mahasiswa->nama_mahasiswa }}</td>
                            <td scope="col">{{ $data->waktu_absen }}</td>
                            <td scope="col">{{ $data->matakuliah->nama_matkul }}</td>
                            <td scope="col">{{ $data->keterangan }}</td>
    
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </main>
@endsection
