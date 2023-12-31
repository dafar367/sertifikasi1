@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">

                    <div class="row">
                        <div class="col-9">
                            <h3 class="col p-md-0">Data Customer</h3>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#Modal_customer">
                                Tambahan Customer
                            </button>
                        </div>
                    </div>


                </div>




                <div class="card">
                    <div class="card-body">
                        {{-- modal add   --}}
                        <form action="{{ route('store_customer') }}" method="post">
                            @csrf
                            <div class="modal fade" id="Modal_customer" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>

                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mt-1">
                                                <label>Nama Customer</label>
                                                <input type="text" id="nama" name="nama" required="required"
                                                    class="form-control" placeholder="Nama customer ..">
                                            </div>

                                            <div class="form-group mt-1">
                                                <label>alamat</label>
                                                <input type="text" id="alamat" name="alamat" required="required"
                                                    class="form-control" placeholder="alamat ..">
                                            </div>

                                            <div class="form-group mt-1">
                                                <label>no telephone</label>
                                                <input type="number" id="no_telp" name="no_telp" required="required"
                                                    class="form-control" placeholder="no telephone ..">
                                            </div>


                                            <div class="form-group mt-1">
                                                <label>id card</label>
                                                <input type="number" id="id_card" name="id_card" required="required"
                                                    class="form-control" placeholder="id card ..">
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
                                    <th scope="col">Nama Transaksi</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">nomor telpon</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $sequence = 1;
                                @endphp
                                @foreach ($customer as $index => $cust)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $cust->nama }}</td>

                                        <td>{{ $cust->alamat }}</td>

                                        <td>{{ $cust->no_telp }}</td>


                                        <td>
                                            @if ($cust->id != 0)
                                                <div class="">
                                                    <a type="button" class="btn btn-outline-dark"
                                                        href="{{ route('detail_transaksi', ['id' => $cust->id]) }}">
                                                        lihat
                                                    </a>
                                                    <button type="button" class="btn btn-outline-dark"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $cust->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $cust->id }}">
                                                        Hapus
                                                    </button>
                                                </div>
                                            @endif

                                            <form action="{{ route('edit_customer', ['id' => $cust->id]) }}" method="post">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="modal fade" id="edit{{ $cust->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Customer
                                                                </h5>

                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group" style="width:100%">
                                                                    <label>Nama </label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cust->id }}">
                                                                    <input type="text" name="nama"
                                                                        class="form-control" placeholder="Nama .."
                                                                        value="{{ $cust->nama }}" style="width:100%">
                                                                </div>

                                                                <div class="form-group mt-1">
                                                                    <label>alamat</label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cust->id }}">
                                                                    <input type="text" name="alamat"
                                                                        class="form-control" placeholder="alamat .."
                                                                        value="{{ $cust->alamat }}" style="width:100%">
                                                                </div>

                                                                <div class="form-group mt-1">
                                                                    <label>no telephone</label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cust->id }}">
                                                                    <input type="text" name="no_telp"
                                                                        class="form-control" placeholder="no telp .."
                                                                        value="{{ $cust->no_telp }}" style="width:100%">
                                                                </div>


                                                                <div class="form-group mt-1">
                                                                    <label>id card</label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cust->id }}">
                                                                    <input type="text" name="id_card"
                                                                        class="form-control" placeholder="id card .."
                                                                        value="{{ $cust->id_card }}" style="width:100%">
                                                                </div>

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

                                            <form action="{{ route('delete_customer', ['id' => $cust->id]) }}"
                                                method="post">
                                                @csrf

                                                <div class="modal fade" id="delete{{ $cust->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Customer
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
