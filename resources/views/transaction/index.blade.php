@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Riwayat Pembelanjaan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Pembelanjaan</th>
                            <th>Total</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{ $item->user->name }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td>
                                    Rp. {{format_uang($item->total)}}
                                </td>
                                <td>
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-outline-success">Detail</a>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection