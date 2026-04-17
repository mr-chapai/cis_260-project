@extends('layouts.applayout')

@section('title', 'User')

@section('content')

    <div class="bg-white pt-1">
        <!--ProductModel list heading row start -->
        <div class="row g-0 text-end  bg-white text-whitec">
            <div class="col-6 col-md-4  text-start">
                <h3 class="ms-2">Order List</h3>
            </div>

            @if($orders==null)
                <p class="col-sm-6 col-md-8 text-start">No order yet.</p>

            @else
            <div class="col-sm-6 col-md-8 text-start">
                <span class=""> Total orders: {{ $orders->count() ?? '0' }}</span>
                &emsp;
                <span class="">    Total Amount: ${{ $orders->sum('total_amount') ?? '0' }}</span>
                &emsp;
                <span class="">    Max order Amount: ${{ $orders->max('total_amount') ?? '0' }}</span>
                &emsp;
                <span class="">    Min order Amount: ${{ $orders->min('total_amount') ?? '0' }}</span>

            </div>

        </div>




            <table class="table table-bordered table-striped">
                <thead class="table-success">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col"> ID</th>
                    <th scope="col">User_id</th>

                    <th scope="col">Payment_id</th>
                    <th scope="col">Total_amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ ucfirst($order->id) }}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{ $order->payment_id }}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->status }}</td>

                    </tr>

                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection
