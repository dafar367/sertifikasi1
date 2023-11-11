@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row">
                    <div class="col-9">
                        <h3 class="col p-md-0">Form Input Transaksi</h3>
                    </div>
                </div>


                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card p-4">
                            <form action="{{ route('store_transaksi') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">

                                        <div class="row mt-4">
                                            <div class="col">
                                                <label>Pilih nama customer</label><br />
                                                <select name="id_customer" class="livesearch form-control p-3"
                                                    name="livesearch" required>
                                                    @foreach ($customer as $nt)
                                                        <option value="{{ $nt->id }}">{{ $nt->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col">
                                                <label>Pilih Kendaraan yang ingin dibeli</label><br />
                                                <select name="id_kendaraan" class="livesearch form-control p-3"
                                                    name="livesearch" required>
                                                    @foreach ($kendaraan as $nt)
                                                        <option value="{{ $nt->id }}">{{ $nt->nama_model_kendaraan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>







                                        <div class="row mt-4">
                                            <div class="col text-right">
                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card p-4">
                            <h4 class="fw-bold ">
                                History transaksi
                            </h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nomor Transaksi</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Kendaran</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $sequence = 1;
                                    @endphp
                                    @foreach ($transaksi as $index => $transaksi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <td>{{ $transaksi->id }}</td>

                                            <td>{{ $transaksi->customer->nama }}</td>

                                            <td>
                                                @if ($transaksi->kendaraan)
                                                    {{ $transaksi->kendaraan->nama_model_kendaraan }}
                                                @else
                                                    Kendaraan sudah tdk tersedia
                                                @endif
                                            </td>


                                            <td>
                                                @if ($transaksi->id != 0)
                                                    <div class="">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete{{ $transaksi->id }}">
                                                            Hapus
                                                        </button>

                                                        <form action="{{ route('delete_history_transaksi', ['id' => $transaksi->id]) }}"
                                                            method="post">
                                                            @csrf

                                                            <div class="modal fade" id="delete{{ $transaksi->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                                History transaksi
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
                                                        
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
