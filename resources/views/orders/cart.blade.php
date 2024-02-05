@extends('layouts.secondApp')
@section('content')
<section class="w-2/3 mx-auto p-4">
    <div class=" h-screen py-8 text-black rounded-md">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4 bg-white py-3 rounded-md px-2">Shopping Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left font-semibold">Product</th>
                                    <th class="text-left font-semibold">Price</th>
                                    <th class="text-left font-semibold">Quantity</th>
                                    <th class="text-left font-semibold">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cart)
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4" src="{{asset('images/2.jpg')}}" alt="Product image">
                                                <span class="font-semibold">{{$item['product_name']}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{$item['price']}} Dh</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <input type="number" name="quantity" id="" value="{{$item['quantity']}}" class="text-center text-lg w-12 border">
                                            </div>
                                        </td>
                                        <td class="py-4">{{$item['total_price']}} Dh</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="py-4 text-center">No Product in your cart</td>
                                </tr>
                            @endif
                                
                                
                                <!-- More product rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Shipping</span>
                            <span>0 Dh</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            
                            @if (!$totalAmount)
                            <span class="font-semibold">0Dh</span>
                            @else
                            <span class="font-semibold">{{$totalAmount}} Dh</span>
                            @endif
                        </div>
                            
                            <button type="submit" id="externalSubmitButton" class="bg-purple-500 text-white py-2 px-4 rounded-lg my-4 w-full">Checkout</button>
                       
                        <a href="#" class="font-semibold underline">Empty The Cart</a>

                    </div>
                </div>
            </div>
            <form class="w-full mx-auto bg-white my-4 p-4" id="myForm" action="{{route('createOrder')}}" method="POST">
                @csrf
            <h1 class="text-2xl font-semibold mb-4 bg-white p-2 text-purple-500 rounded-md ">Delivery Inforamtion</h1>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        @error('name')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        @error('last_name')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                        <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                    </div>
                  </div>
                  <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" name="phone_number" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        @error('tel')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                        <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (063-233-1234)</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="city" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        @error('city')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                        <label for="city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">City (Ex. Casablanca)</label>
                    </div>
                  </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    @error('email')
                        <p class="error-message text-red-400">{{ $message }}</p>
                    @enderror
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="address" id="floating_textarea" rows="4" class="resize-none border-x-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""></textarea>
                    @error('address')
                    <p class="error-message text-red-400">{{ $message }}</p>
                @enderror
                    <label for="address" class=" peer-focus:font-medium absolute px-2 text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Address</label>
                </div>

              </form> 
        </div>
    </div>
    {{-- --}}

      
</section>

<script>
    document.getElementById('externalSubmitButton').addEventListener('click', function() {
      // Trigger the form submission when the external button is clicked
      document.getElementById('myForm').submit();
    });
</script>


@endsection