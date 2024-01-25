@extends("layouts.secondApp")
@section('content')

    <section class="w-full mt-2">
        <div class="flex w-10/12 mx-auto my-2 flex-col">
            <div class="flex justify-around">
                {{-- Left div (product Image) --}}
                <div class="flex w-2/5 flex-col">
                    <div class="flex w-full">
                        <img src="{{asset($product->images[1])}}" alt="" width="" class="">
                    </div>

                    <div class="grid grid-cols-4 gap-4 my-2">
                        <div class="flex h-24 border border-red-400"></div>
                        <div class="flex h-24 border border-red-400"></div>
                        <div class="flex h-24 border border-red-400"></div>
                        <div class="flex h-24 border border-red-400"></div>
                    </div>
                </div>
                {{-- Right div (product Info) --}}

                <div class="flex w-2/5 flex-col ">
                    <div class="flex w-full h-fit justify-center border-b-2 mb-6 py-3 border-b-white">
                        <h1 class="text-3xl w-fit">{{ $product->name }}</h1>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <div class="flex">
                            <h2 class="text-xl font-medium">Price : <span class="px-4 ">{{ $product->price }} Dh</span></h2>
                        </div>
                        <div class="flex">
                            <h2 class="text-xl font-medium">Stock : <span class="px-4 ">{{$product->stock_quantity}}</span></h2>
                        </div>
                        <div class="flex">
                            <h2 class="text-xl font-medium">Category : <a href="#" class="px-4  hover:underline">{{$product->category()->first()->name}}</a></h2>
                        </div>
                        <div class="flex">
                            <h2 class="text-xl font-medium">Discount : <a href="#" class="px-4  hover:underline">{{$product->discount }} %</a></h2>
                        </div>
                        <div class="flex flex-col">
                            <h2 class="text-xl font-medium">Description :</h2>
                            <p class="text-default tracking-widest">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="flex justify-end"> 
                            <a href="#" class="bg-[#645394] text-white px-4 py-2 border border-white text-center font-medium hover:bg-white hover:text-[#645394]  hover:border-[#645394]">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-9/12 mx-auto flex-col space-y-4">
            <div class="flex w-full h-fit justify-center border-b-2 mb-6 py-3 border-b-white">
                <h1 class="text-3xl w-fit">Related Products</h1>
            </div>
            <div class="flex  w-full justify-around">
                <div class="flex w-72 h-fit flex-col items-center border border-white">
                    <div class="flex justify-center">
                        <img src="{{asset('images/5.jpg')}}" class="w-full h-72"> 
                    </div>
                    <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                        <div class="flex">
                            <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                        </div>
                        <div class="flex">
                            <h4 class="text-xl"><span>30</span> Dh</h4>
                        </div>
                        <div class="flex">
                            <a href="#" class="bg-white text-[#645394] border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                        </div>
                    </div>
                </div>
                <div class="flex w-72 h-fit flex-col items-center border border-white">
                    <div class="flex justify-center">
                        <img src="{{asset('images/5.jpg')}}" class="w-full h-72"> 
                    </div>
                    <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                        <div class="flex">
                            <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                        </div>
                        <div class="flex">
                            <h4 class="text-xl"><span>30</span> Dh</h4>
                        </div>
                        <div class="flex">
                            <a href="#" class="bg-white text-[#645394] border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                        </div>
                    </div>
                </div>
                <div class="flex w-72 h-fit flex-col items-center border border-white">
                    <div class="flex justify-center">
                        <img src="{{asset('images/5.jpg')}}" class="w-full h-72"> 
                    </div>
                    <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                        <div class="flex">
                            <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                        </div>
                        <div class="flex">
                            <h4 class="text-xl"><span>30</span> Dh</h4>
                        </div>
                        <div class="flex">
                            <a href="#" class="bg-white text-[#645394] border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                        </div>
                    </div>
                </div>
                <div class="flex w-72 h-fit flex-col items-center border border-white">
                    <div class="flex justify-center">
                        <img src="{{asset('images/5.jpg')}}" class="w-full h-72"> 
                    </div>
                    <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                        <div class="flex">
                            <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                        </div>
                        <div class="flex">
                            <h4 class="text-xl"><span>30</span> Dh</h4>
                        </div>
                        <div class="flex">
                            <a href="#" class="bg-white text-[#645394] border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
@endsection