@extends('layouts.landingpage')

@section('content')
    <div class="container">
        <h2 class="my-3 fw-semibold text-center">Jadwal Pelatihan</h2>
        <div class="card shadow" style="border: 1px solid blue;border-radius: 16px">
            <div class="card-body">
                @if ($jadwalPelatihan->isEmpty())
                    <p>Tidak ada jadwal pelatihan yang tersedia.</p>
                @else
                    @foreach($jadwalPelatihan as $judulBimtek => $jadwal)
                        <h3>{{ $judulBimtek }}</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tahap</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Tanggal</th>
                                    <th>Ruangan</th>
                                    <th>Nama Instruktur</th>
                                    <th>File Pendukung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal as $jadwalItem)
                                    <tr>
                                        <td>{{ $jadwalItem->tahap }}</td>
                                        <td>{{ $jadwalItem->pendaftaran->user->name }}</td>
<<<<<<< HEAD
                                        <td>{{ \Carbon\Carbon::parse($jadwalItem->tanggal_pelaksanaan)->format('d-m-Y H:i:s') }}</td>
=======
                                        <td>{{ \Carbon\Carbon::parse($jadwalItem->tanggal_pelaksanaan )->translatedFormat('d F Y \j\a\m H.i') }}</td>
>>>>>>> 74e32d82247ca452eb3b0f839e6d0e926a181ff3

                                        <td>{{ $jadwalItem->ruangan }}</td>
                                        <td>{{ $jadwalItem->instruktur }}</td>
                                        <td>
                                            @if($jadwalItem->file_pendukung)
<<<<<<< HEAD
                                            <div class="d-flex flex-column">
                                                <embed src="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" type="application/pdf" width="200" height="100"></embed>
                                                <a href="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" download="SPK_{{ $jadwalItem->id }}">Unduh SPK</a>
                                            </div>
                                            
=======
                                                <div class="d-flex flex-column">
                                                    <embed src="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" type="application/pdf" width="200" height="100"></embed>
                                                    <a href="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" target="_blank">Unduh File pendukung</a>
                                                </div>
>>>>>>> 74e32d82247ca452eb3b0f839e6d0e926a181ff3
                                            @else
                                                Tidak ada file pendukung
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
