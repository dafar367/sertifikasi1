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
                        <form action="{{ route('store_to_kendaraan_page') }}" method="post">
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
                                                    <button type="button" class="btn btn-outline-dark"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $kendaraan->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $kendaraan->id }}">
                                                        Hapus
                                                    </button>
                                                </div>
                                            @endif

                                            <form action="{{ route('edit_kendaraan', ['id' => $kendaraan->id]) }}"
                                                method="post">
                                                @csrf
                                                {{ method_field('PUT') }}

                                                <div class="modal fade" id="edit{{ $kendaraan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah
                                                                    Kategori</h5>

                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group" style="width:100%">
                                                                    <label>Nama </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kendaraan->id }}">
                                                                    <input type="text" name="nama_model_kendaraan"
                                                                        class="form-control" placeholder="Nama .."
                                                                        value="{{ $kendaraan->nama_model_kendaraan }}"
                                                                        style="width:100%">
                                                                </div>

                                                                <div class="form-group mt-2" style="width:100%">
                                                                    <label>Tahun </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kendaraan->id }}">
                                                                    <input type="text" name="tahun"
                                                                        class="form-control" placeholder="Tahun .."
                                                                        value="{{ $kendaraan->tahun }}" style="width:100%">
                                                                </div>

                                                                <div class="form-group mt-2" style="width:100%">
                                                                    <label>Jumlah penumpang </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kendaraan->id }}">
                                                                    <input type="text" name="jumlah_penumpang"
                                                                        class="form-control" placeholder="jumlah penumpang .."
                                                                        value="{{ $kendaraan->jumlah_penumpang }}" style="width:100%">
                                                                </div>


                                                                <div class="form-group mt-2" style="width:100%">
                                                                    <label>Manufaktur </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kendaraan->id }}">
                                                                    <input type="text" name="manufaktur"
                                                                        class="form-control" placeholder="Manufaktur .."
                                                                        value="{{ $kendaraan->manufaktur }}"
                                                                        style="width:100%">
                                                                </div>

                                                                <div class="form-group mt-2" style="width:100%">
                                                                    <label>Harga </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kendaraan->id }}">
                                                                    <input type="text" name="harga"
                                                                        class="form-control" placeholder="Harga .."
                                                                        value="{{ $kendaraan->harga }}"
                                                                        style="width:100%">
                                                                </div>



                                                                @if ($kendaraan->bahan_bakar != null)
                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>bahan bakar </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="bahan_bakar"
                                                                            class="form-control" placeholder="Nama .."
                                                                            value="{{ $kendaraan->bahan_bakar }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>luas bagasi </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="luas_bagasi"
                                                                            class="form-control" placeholder="Nama .."
                                                                            value="{{ $kendaraan->luas_bagasi }}"
                                                                            style="width:100%">
                                                                    </div>
                                                                @endif

                                                                @if ($kendaraan->jumlah_roda != null)
                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>Jumlah roda </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="jumlah_roda"
                                                                            class="form-control" placeholder="jumlah roda .."
                                                                            value="{{ $kendaraan->jumlah_roda }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>luas area kargo </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="luas_area_kargo"
                                                                            class="form-control" placeholder="luas area kargo .."
                                                                            value="{{ $kendaraan->luas_area_kargo }}"
                                                                            style="width:100%">
                                                                    </div>
                                                                @endif

                                                                @if ($kendaraan->ukuran_bagasi != null)
                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>Ukuran bagasi </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="ukuran_bagasi"
                                                                            class="form-control" placeholder="jumlah roda .."
                                                                            value="{{ $kendaraan->ukuran_bagasi }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group mt-2" style="width:100%">
                                                                        <label>Kapasitas Bensin </label>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $kendaraan->id }}">
                                                                        <input type="text" name="kapasitas_bensin"
                                                                            class="form-control" placeholder="kapasitas bensin .."
                                                                            value="{{ $kendaraan->kapasitas_bensin }}"
                                                                            style="width:100%">
                                                                    </div>
                                                                @endif



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-paper-plane m-r-5"></i>
                                                                    Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                            <form action="{{ route('delete_kendaraan', ['id' => $kendaraan->id]) }}"
                                                method="post">
                                                @csrf

                                                <div class="modal fade" id="delete{{ $kendaraan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    kendaraan
                                                                </h5>

                                                            </div>
                                                            <div class="modal-body">

                                                                <p>Yakin ingin menghapus data ini?</p>

                                                                @csrf
                                                                {{ method_field('DELETE') }}


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-paper-plane m-r-5"></i>
                                                                    Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


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
