@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-9">
                    <h3 class="col p-md-0">Data Kendaraan</h3>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#Modal_kendaraan">
                        Tambahan kendaraan
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    {{-- create modal for customer --}}
                    <form action="{{route('store_to_kendaraan_page')}}" method="post">
                        @csrf
                        <div class="modal fade" id="Modal_kendaraan" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kendaraan_page">Pilih jenis kendaraan</label>
                                            <select class="form-control" id="kendaraan_page" name="kendaraan_page">
                                              <option value="Mobil">Mobil</option>
                                              <option value="Truck">Truck</option>
                                              <option value="Motor">Motor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama model</th>
                                <th scope="col">tahun</th>
                                <th scope="col">manufaktur</th>
                                <th scope="col">harga</th>



                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                    $sequence = 1;
                                @endphp
                                @foreach ($kendaraan as $index => $kendaraan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $kendaraan->nama_model_kendaraan }}</td>

                                        <td>{{ $kendaraan->tahun }}</td>

                                        <td>{{ $kendaraan->manufaktur }}</td>

                                        <td>Rp. {{ number_format($kendaraan->harga, 0, ',', '.') }}</td>


                                        <td>
                                            @if ($kendaraan->id != 0)
                                                <div class="">
                                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#hapus_akun{{ $kendaraan->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus_akun{{ $kendaraan->id }}">
                                                        Hapus
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
