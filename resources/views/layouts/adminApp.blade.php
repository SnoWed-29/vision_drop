<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css'])
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- owl --}}
        
        {{-- owl --}}
    </head>
    <body class="h-[200vh] text-white" id="adminBody">
        <div class="flex justify-between space-x-3">
            <div class="w-1/6">
                <div class="fixed left-0 w-1/6  flex-col  h-screen space-y-3 linearBackground rounded-r-3xl"id="sideNav">
                    <div class="flex flex-col w-full justify-center space-y-3 items-center mt-4 h-1/4">
                        <img src="{{asset('images/LOGO VISION.png')}}" alt="logo" class="w-24 h-24">
                        <h1 class="text-xl border-b border-b-white pb-2">Vision Drop</h1>
                    </div>
                    <div class="flex flex-col space-y-3 justify-center h-1/3">
                        <a href="" class="text-default font-medium hover:bg-white hover:text-black p-3 text-white border-b-2 border-white"><i class="fa-solid fa-house"></i> Home</a>
                        <a href="" class="text-default font-medium hover:bg-white hover:text-black p-3 text-white border-b-2 border-white"><i class="fa-solid fa-bag-shopping"></i> Orders</a>
                        <a href="" class="text-default font-medium hover:bg-white hover:text-black p-3 text-white border-b-2 border-white"><i class="fa-solid fa-box-open"></i> Manage Products</a>
                        <a href="" class="text-default font-medium hover:bg-white hover:text-black p-3 text-white border-b-2 border-white"><i class="fa-solid fa-list"></i> Manage Categories</a>
                    </div>
                    <div class="flex w-full flex-col mt-4 h-2/6 justify-end">
                        <a href="/" class="text-default font-medium p-3"><i class="fa-solid fa-store"></i> Store Page</a>
                        <a href="#" class="text-default font-medium p-3"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>
            <div class="w-5/6 h-screen bg-[#ffffff75] ">
                @yield('content')
            </div>
        </div>
    </body>
    
    <script>
        $(document).ready(function () {
            
        });
    </script>
</html>
