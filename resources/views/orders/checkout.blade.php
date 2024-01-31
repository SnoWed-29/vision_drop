@extends('layouts.secondApp')
@section('content')

<section  class="w-2/3 mx-auto p-4  text-black" >
    
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-md shadow-md border-l-4 border-purple-500">
        <h2 class="text-2xl font-semibold text-purple-500 mb-4">Thank You</h2>
        <div class="grid grid-cols-2 gap-4 mb-4 ">
            <div>
                <p class="text-gray-600">Name:</p>
                <p class="font-semibold">{{$order->name}}</p>
            </div>
            <div>
                <p class="text-gray-600">Last Name:</p>
                <p class="font-semibold">{{$order->name}}</p>
            </div>
        </div>
        <div>
            <p class="text-gray-600">Address:</p>
            <p class="font-semibold">{{$order->address}}</p>
        </div>
        <div>
            <p class="text-gray-600">City:</p>
            <p class="font-semibold">{{$order->city}}</p>
        </div>
        <div>
            <p class="text-gray-600">Phone Number:</p>
            <p class="font-semibold">{{$order->phone_number}}</p>
        </div>
        <div>
            <p class="text-gray-600">Email:</p>
            <p class="font-semibold">{{$order->email}}</p>
        </div>
        <div class="mt-6 border-t pt-4">
            <h3 class="text-xl font-semibold mb-2">Your Products </h3>
            <table class="w-full">
                <thead>
                    <tr class="border-b text-left">
                        <th class="py-2 ">Name</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Replace the following rows with actual data -->
                    @foreach ($order->products as $prod)
                        <tr class="border-b">
                            <td class="py-2">{{ $prod->name }}</td>
                            <td class="py-2">${{ $prod->pivot->price }}</td>
                            <td class="py-2">{{ $prod->pivot->quantity }}</td>
                            <td class="py-2">{{ $prod->pivot->price * $prod->pivot->quantity }} Dh</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Total amount calculation -->
            <div class="mt-4">
                <p class="text-gray-600">Total Amount:</p>
                <p class="font-semibold text-xl text-purple-500">{{$order->total_amount}} Dh</p>
            </div>
        </div>
    </div>
    

</section>


  @endsection