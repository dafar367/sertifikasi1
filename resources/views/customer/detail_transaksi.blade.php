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
                                @foreach ($transaksi as $index => $cust)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $cust->kendaraan->nama_model_kendaraan }}</td>

                                        <td>{{ $cust->kendaraan->manufaktur }}</td>

                                        <td>{{ $cust->kendaraan->harga }}</td>

                                        <td>

                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $cust->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus_data_pembelian{{ $cust->id }}">
                                                Hapus
                                            </button>

                                            <form action="" method="POST">
                                                @csrf
                                                <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nama Akun</label>
                                                                    <input type="text" id="nama_akun" name="nama_akun"
                                                                        required="required" class="form-control" placeholder="Nama Akun">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nomor Akun</label>
                                                                    <input type="text" id="nomor_akun" name="nomor_akun" required="required"
                                                                        class="form-control" placeholder="Nomor akun ..">
                                                                </div>
                                                                {{-- <div class="form-group">
                                                                    <label>Pagu</label>
                                                                    <input type="number" id="pagu" name="pagu"
                                                                        class="form-control" placeholder="Rp. ">
                                                                </div> --}}

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                                                        class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-paper-plane m-r-5"></i> Simpan</button>
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
