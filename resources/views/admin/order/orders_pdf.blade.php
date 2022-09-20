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
        <th class="border-top-0">Id</th>
        <th class="border-top-0">User id</th>
        <th class="border-top-0">Order Date</th>
        <th class="border-top-0">Total</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders as $item)
        <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->user_id}}</td>
        <td>{{ $item->order_date }}</td>
        <td>{{ $item->total }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
    </body>
</html> 