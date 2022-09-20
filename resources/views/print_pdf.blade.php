<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi PDF</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{font-size: 9pt;}
    </style>
    <center>
        <h5>Laporan Transaksi</h4>
        <p>Berikut ini merupakan list transaksi dari penjualan pada website alat musik</p>
    </center>

    <style>
        table{
            border-collapse: collapse;
        }
    </style>
    <table class='table table-bordered' border="1" style="width:95%;margin:0 auto;">
    <thead>
        <tr>
        <th class="border-top-0">Order ID</th>
        <th class="border-top-0">Produk</th>
        <th class="border-top-0">Harga</th>
        <th class="border-top-0">Jumlah</th>
        <th class="border-top-0">Sub Total</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders_detail as $item)
        <tr>
        <td>{{ $item->order_id }}</td>
        <td>{{ $item->product->name}}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->subtotal }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
    </body>
</html> 