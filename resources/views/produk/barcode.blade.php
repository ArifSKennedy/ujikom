<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cetak Barcode</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            @foreach ($dataproduk as $produk)
                <td class="text-center" style="border: 1px solid #333;">
                    <p>{{ $produk->nama_produk }} - Rp. {{ format_uang($produk->harga_jual) }}</p>
              {{-- <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($produk->kode_produk,'C39') }}" alt="{{ $produk->kode_produk }}" width="180" height="60"> --}}
                     {{-- <img src="data:image/png;base64,{{ base64_encode(DNS1D::getBarcodePNG($produk->kode_produk, 'C39'))}}" class="" height="60" width="180" /> --}}
                     {{-- <img src="data:image/png;base64,{{!! DNS1D::getBarcodeHTML($produk->kode_produk,'UPCA') !!}}" width="180" height="60"> --}}
                     <div>{!! DNS1D::getBarcodeHTML($produk->kode_produk,'C39') !!}</div>

                    <br>
                    {{ $produk->kode_produk }}
                </td>
                @if ($no++ % 3 == 0)
                    </tr><tr>
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>