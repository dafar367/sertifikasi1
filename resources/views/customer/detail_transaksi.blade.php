@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="col p-md-0">Detail Customer</h3>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-body">
                        <div class="card-header pt-4 text-center">
                            <h3>Nama : {{ $customer->nama }}</h3>
                            <h5>Id card : {{ $customer->id_card }}</h5>
                            <br><br>
                        </div>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tipe Mobil </th>
                                    <th scope="col">Manufaktur</th>
                                    <th scope="col">Harga</th>
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

                                        <td>{{ $transaksi->kendaraan->nama_model_kendaraan }}</td>

                                        <td>{{ $transaksi->kendaraan->manufaktur }}</td>

                                        <td>{{ $transaksi->kendaraan->harga }}</td>

                                        <td>

                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $transaksi->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $transaksi->id }}">
                                                Hapus
                                            </button>

                                            <form action="{{route('edit_transaksi', ['id' => $transaksi->id]) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="modal fade" id="edit{{ $transaksi->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">edit transaksi</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <label>Pilih Kendaraan yang ingin diganti</label><br />
                                                                        <select name="id_kendaraan" class="form-control p-3" required>
                                                                            @foreach ($kendaraan as $nt)
                                                                                <option value="{{ $nt->id }}" {{ $nt->id == $transaksi->kendaraan->id ? 'selected' : '' }}>
                                                                                    {{ $nt->nama_model_kendaraan }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
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

                                            <form action="{{route('delete_transaksi', ['id' => $transaksi->id]) }}" method="POST">
                                                @csrf
                                                <div class="modal fade" id="delete{{ $transaksi->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">delete transaksi</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mt-4">
                                                                    <div class="col">
                                                                        <div class="modal-body">

                                                                            <p>Yakin ingin menghapus data ini?</p>

                                                                            @csrf
                                                                            {{ method_field('DELETE') }}


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="fa fa-paper-plane m-r-5"></i> Hapus </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- modal edit --}}


                            </tbody>
                            </tbody>

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
