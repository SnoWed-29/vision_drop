@extends('layouts.adminApp')
@section('content')
    <section class="w-full p-2">
        <div class="flex w-10/12 mx-auto">
            <div class="flex justify-center w-full mb-4 p-3 border-b-2 border-b-[#645394]">
                <h2 class="text-3xl text-black">Dashboard </h2>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mx-auto w-3/4">
            <div class="bg-white h-24">
                <h3 class="text-gray-500 text-2xl font-bold ">Total Orders</h3>
                <h1 class="text-[#645394] text-4xl font-medium mx-2">{{$totalOrders}} Order</h1>
                <div class="h-[2px] bg-[#645394] w-2/3 my-3"></div>
            </div>
            <div class="bg-white h-24">
                <h3 class="text-gray-500 text-xl font-bold">Orders Confirmed</h3>
                <h1 class="text-[#645394] text-4xl font-medium mx-2">34 Order</h1>
                <div class="h-[2px] bg-[#645394] w-2/3 my-3"></div>
            </div>
            <div class="bg-white h-24">
                <h3 class="text-gray-500 text-xl font-bold">Orders Unconfirmed</h3>
                <h1 class="text-[#645394] text-4xl font-medium mx-2">20 Orders</h1>
                <div class="h-[2px] bg-[#645394] w-2/3 my-3"></div>
            </div>
            <div class="bg-white h-24">
                <h3 class="text-gray-500 text-xl font-bold">Total Products</h3>
                <h1 class="text-[#645394] text-4xl font-medium mx-2">{{$totalProuducts}} Product</h1>
                <div class="h-[2px] bg-[#645394] w-2/3 my-3"></div>
            </div>
            <div class="bg-white h-24">
                <h3 class="text-gray-500 text-xl font-bold">Deliverd Orders</h3>
                <h1 class="text-[#645394] text-4xl font-medium mx-2">10 Orders</h1>
                <div class="h-[2px] bg-[#645394] w-2/3 my-3"></div>
            </div>
        </div>
        <div class="w-11/12 mx-auto  text-black flex flex-col">
            <div class="flex my-3 border-b p-2">
                <h1 class="text-black text-3xl font-medium" >Last Orders </h1>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="OrdersTable" class="table table-striped p-1" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last name</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->last_name}}</td>
                            <td>{{$order->city}}</td>
                            <td>{{Illuminate\Support\Str::limit($order->address, 20)}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->total_amount}}</td>
                            <td>action here</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Last name</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
   
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script> 
    new DataTable('#OrdersTable');
    </script>
@endsection