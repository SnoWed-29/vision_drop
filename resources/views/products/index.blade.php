@extends("layouts.secondApp")
@section('content')
    <section class="w-full">
        <div class="flex flex-col ">
            <div class="flex w-full justify-center mb-6">
                <h1 class="text-3xl border-b-2 border-b-[#645394] py-2">{{$cat->name}}</h1>
            </div>
            <div class="flex w-9/12 mx-auto flex-col space-y-4">
                <div class="grid grid-cols-4 gap-4 ">
                    @foreach ($products as $prod)
                    <div class="flex w-72 h-fit flex-col items-center border border-white">
                        <div class="flex justify-center">
                            @php
                                $images = json_decode($prod->images, true);
                                $imageUrl = Storage::url($images[0]) ; 
                            @endphp
                            @if (!empty($images))
                                <img src="{{ $imageUrl }}" alt="{{ $prod->name }}" class="w-full h-72">
                            @else
                                <span>No Image Available</span>
                            @endif
                        </div>
                        <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                            <div class="flex">
                                <h1 class="text-2xl">{{ $prod->name }}</h1>
                            </div>
                            <div class="flex">
                                <h4 class="text-xl"><span>{{ $prod->price }}</span> Dh</h4>
                            </div>
                            <div class="flex">
                                <a href="/product/{{$prod->slug}}" class="bg-white text-[#645394] rounded-md border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition">Buy</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                </div> 
            </div>
        </div>
    </section>
@endsection