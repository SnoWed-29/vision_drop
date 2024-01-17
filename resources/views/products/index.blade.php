@extends("layouts.secondApp")
@section('content')
    <section class="w-full">
        <div class="flex flex-col ">
            <div class="flex w-full justify-center mb-6">
                <h1 class="text-3xl border-b-2 border-b-[#645394] py-2">hoddies</h1>
            </div>
            <div class="flex w-9/12 mx-auto flex-col space-y-4">
                <div class="flex  w-full justify-around">
                    <div class="flex w-72 h-fit flex-col items-center border border-white">
                        <div class="flex justify-center">
                            <img src="{{asset('images/1.jpg')}}" class="w-full h-72"> 
                        </div>
                        <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                            <div class="flex">
                                <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                            </div>
                            <div class="flex">
                                <h4 class="text-xl"><span>30</span> Dh</h4>
                            </div>
                            <div class="flex">
                                <a href="#" class="bg-white text-[#645394] rounded-md border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-72 h-fit flex-col items-center border border-white">
                        <div class="flex justify-center">
                            <img src="{{asset('images/3.jpg')}}" class="w-full h-72"> 
                        </div>
                        <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                            <div class="flex">
                                <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                            </div>
                            <div class="flex">
                                <h4 class="text-xl"><span>30</span> Dh</h4>
                            </div>
                            <div class="flex">
                                <a href="#" class="bg-white text-[#645394] rounded-md border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-72 h-fit flex-col items-center border border-white">
                        <div class="flex justify-center">
                            <img src="{{asset('images/4.jpg')}}" class="w-full h-72"> 
                        </div>
                        <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                            <div class="flex">
                                <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                            </div>
                            <div class="flex">
                                <h4 class="text-xl"><span>30</span> Dh</h4>
                            </div>
                            <div class="flex">
                                <a href="#" class="bg-white text-[#645394] rounded-md border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-72 h-fit flex-col items-center border border-white">
                        <div class="flex justify-center">
                            <img src="{{asset('images/7.jpg')}}" class="w-full h-72"> 
                        </div>
                        <div class="flex flex-col space-y-2 items-center bg-[#28213B] w-full justify-center p-2">
                            <div class="flex">
                                <h1 class="text-2xl">Lorem, ipsum dolor.</h1>
                            </div>
                            <div class="flex">
                                <h4 class="text-xl"><span>30</span> Dh</h4>
                            </div>
                            <div class="flex">
                                <a href="#" class="bg-white text-[#645394] rounded-md border border-[#645394] tex-lg px-4 font-medium py-2 hover:text-white hover:bg-[#645394] transition" >Buy</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
@endsection