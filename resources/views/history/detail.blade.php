
@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-12 mt-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
           </div>
           <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Sukses Check Out</h3>
                        <h5>Pesanan anda telah berhasil check out selanjutnya untuk proses pembayaran silakan transfer di rekening<strong>  Bank BRI Nomer Rekening : 324241-525251-1234</strong> dengan nominal <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal : {{ $pesanan->tanggal }}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($pesanan_details as $pesanan_detail) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }} Buah</td>
                                    <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong> Total Harga : </strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><strong> Kode Unik : </strong></td>
                                    <td><strong>{{ number_format($pesanan->kode) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><strong> Total Harga Pembayaran : </strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                        
           </div>
       </div>
    </div>
@endsection
