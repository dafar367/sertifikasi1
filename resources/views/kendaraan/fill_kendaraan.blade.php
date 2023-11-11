@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row">
                    <div class="col-9">
                        <h3 class="col p-md-0">Form input Mobil</h3>
                    </div>
                </div>


                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card p-4">
                            <form action="{{ route('store_kendaraan') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col">

                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Nama model kendaraan</label>
                                                    <input type="text" id="nama_model_kendaraan"
                                                        name="nama_model_kendaraan" required="required" class="form-control"
                                                        placeholder="nama model..">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>tahun</label>
                                                    <input type="number" id="tahun" name="tahun" required="required"
                                                        class="form-control" placeholder="tahun ..">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>jumlah penumpang</label>
                                                    <input type="number" id="jumlah_penumpang" name="jumlah_penumpang"
                                                        required="required" class="form-control"
                                                        placeholder="jumlah penumpang ..">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>manufaktur</label>
                                                    <input type="text" id="manufaktur" name="manufaktur"
                                                        required="required" class="form-control"
                                                        placeholder="manufakter ..">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>harga</label>
                                                    <input type="number" id="harga" name="harga" required="required"
                                                        class="form-control" placeholder="harga ..">
                                                </div>
                                            </div>
                                        </div>

                                        @if (session('data') == 'Mobil')
                                            <h4 class="mt-4 font-weight-bold">Form mobil yang perlu diisi</h4>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>bahan bakar</label>
                                                        <input type="text" id="bahan_bakar" name="bahan_bakar"
                                                            class="form-control"
                                                            placeholder="bahan bakar ..">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>luas bagasi</label>
                                                        <input type="number" id="luas_bagasi" name="luas_bagasi"
                                                            class="form-control"
                                                            placeholder="luas bagasi ..">
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(session('data') == 'Truck')
                                            <h4 class="mt-4 font-weight-bold">Form truck yang perlu diisi</h4>

                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jumlah roda</label>
                                                        <input type="number" id="jumlah_roda" name="jumlah_roda"
                                                            class="form-control"
                                                            placeholder="jumlah roda ..">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Luas area kargo</label>
                                                        <input type="number" id="luas_area_kargo" name="luas_area_kargo"
                                                            class="form-control"
                                                            placeholder="luas area kargo ..">
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(session('data') == 'Motor')
                                            <h4 class="mt-4 font-weight-bold">Form motor yang perlu diisi</h4>

                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>ukuran bagasi</label>
                                                        <input type="number" id="ukuran_bagasi" name="ukuran_bagasi"
                                                            class="form-control"
                                                            placeholder="ukuran bagasi ..">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>kapasitas bensin</label>
                                                        <input type="number" id="kapasitas_bensin" name="kapasitas_bensin"
                                                            class="form-control"
                                                            placeholder="kapasitas bensin ..">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row mt-4">
                                            <div class="col text-left">
                                                <input type="reset" class="btn btn-sm btn-danger" value="Reset">
                                            </div>
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
            </div>
        </div>
    </div>
@endsection
