<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


        {{-- owl --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        
        {{-- owl --}}
    </head>
    <body class="bg-black text-white ">
        <header>
            <div class="flex w-full justify-center my-1">
                <div class="flex border-b-2 px-2 border-b-[#645394]">
                    <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[50px] md:w-[70px] lg:w-[80px]">
                </div>
            </div>
            <div class="flex w-full justify-center my-4">
                <h3 class="text-xl ">Lorem ipsum dolor sit amet, consectetur adipisicing.</h3>
            </div>
            <div class="flex w-full justify-center my-1">
                <p class="w-3/5 text-center font-medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus magni quidem quo nobis. Voluptate repellendus necessitatibus esse incidunt fugit optio? Error, consequuntur quo.</p>
            </div>
        </header>
        <main class="mt-5 ">
            @yield('content')
        </main>
    </body>
    <script type="module">

    </script>
</html>
