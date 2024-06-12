@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow border-o">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pelatihan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 ">
                    <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul_bimtek">Judul Bimtek:</label>
                            <input type="text" class="form-control" id="judul_bimtek" name="judul_bimtek" value="{{ $pelatihan->judul_bimtek }}">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu:</label>
                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="{{ $pelatihan->waktu }}">
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya:</label>
                            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $pelatihan->biaya }}">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak:</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $pelatihan->kontak }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

   
</div>
@endsection
