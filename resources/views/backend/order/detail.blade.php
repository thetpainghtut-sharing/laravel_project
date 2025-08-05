@extends('backend.layout')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order Detail</h1>
    <h2>{{ $order->orderno }}</h2>
    <p>{{ $order->phone }}</p>
    <p>{{ $order->shipping_address }}</p>
    
    <table class="table table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Sub Total</th>
        </tr>
      </thead>
      <tbody>
        @php $total = 0; @endphp
        @foreach ($order->books as $item)
        @php 
          $sub_total = $item->price * $item->pivot->quantity;
          $total += $sub_total;
        @endphp
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{number_format($item->price)}}</td>
            <td>{{$item->pivot->quantity}}</td>
            <td>{{number_format($sub_total)}}</td>
          </tr>
        @endforeach
          <tr>
            <td colspan="4">Total</td>
            <td>{{number_format($total)}}</td>
          </tr>
      </tbody>
    </table>
  </div>
@endsection