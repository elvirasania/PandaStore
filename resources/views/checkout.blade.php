@extends('layouts.masterLayouts')
@section('content')
<section class="container mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h3>Check Out</h3>
            <p>Tanggal Pesan : {{$order->$order_date}}</p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach ($order_details as $order_detail)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $order_detail->product->name }}</td>
                  <td>{{ $order_detail->qty }}</td>
                  <td>Rp. {{ number_format($order_detail->product->price) }}</td>
                  <td>Rp. {{ number_format($order_detail->subtotal) }}</td>
                  <td>
                    <form action="checkout/{{$order_detail->id}}" method="post" >
                      @csrf
                      {{ method_field('DELETE')}}
                      <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash" onclick="Apakah anda yakin akan menghapus" ></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4" ><strong> Total Harga : </strong></td>
                  <td><strong>Rp. {{number_format($order->total)}}</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</section>
@endsection