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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- owl --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        
        {{-- owl --}}
    </head>
    <body class="h-[200vh] text-white">
        <header class="mb-12">
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
        <nav class="flex justify-between w-full bg-[#fff] text-[#000] border-b-2 border-b-[#645394] z-10 p-3" id="navbar">
            <div class="flex w-10/12 mx-auto justify-between">
                <div class="flex w-1/3">
                    <a href="/" class="text-xl font-medium bg-black">
                        <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[40px]">
                   </a>
                </div>
                <div class="flex w-1/3 justify-around">
                    <a href="/products" class="text-2xl font-medium hover:border-b-2 border-b-[#645394]"> Hoddies </a>
                    <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#645394]"> Flags </a>
                    <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#645394]"> Flashlights </a>
                    <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#645394]"> More </a>
                </div>
                <div class="flex w-1/3 justify-end space-x-4">
                    @if(auth()->check())
                   
                        <div class="relative group">
                            <a href="" class="text-2xl font-medium" id="moreDropdownBtn"> {{auth()->user()->name}} </a>
                            <ul class="absolute hidden bg-white text-[#000] text-lg border-[#645394] border-t-2  p-5 " id="moreDropdownContent">
                                @if(auth()->user()->idAdmin = true)
                                <li><a href="/admin/dashboard" class=""> Dashboard </a></li>
                    
                            @endif
                                <li><a href="{{ route('logout') }}" class="my-3"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                               
                                <!-- Add more dropdown items as needed -->
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                       
                    @else
                        <a href="/login" class="text-2xl font-medium "> Login </a>
                    @endif
                    <a href="#" class="text-2xl font-medium "> <i class="fa-solid fa-cart-shopping"></i> </a>
        
                   
                </div>
            </div>
        </nav>
        <main class="mt-5 " id="scroll-section">
            @yield('content')
        </main>
    </body>
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            function fixNavbar() {
                var navbar = $("#navbar");
                var scrollSection = $("#scroll-section");
                var offset = scrollSection.offset().top;
    
                $(window).scroll(function () {
                    if ($(window).scrollTop() >= offset) {
                        navbar.addClass("fixed animate__animated animate__slideInDown top-0 shadow-xl text-black border-b-3 border-b-[##645394]");
                    } else {
                        navbar.removeClass("fixed animate__animated animate__slideInDown  top-0 shadow-xl text-black border-b-3 border-b-[#645394]");
                    }
                });
            }
    
            fixNavbar();

            var moreDropdownBtn = $('#moreDropdownBtn');
        var moreDropdownContent = $('#moreDropdownContent');

        // Add a click event listener to the More link
        moreDropdownBtn.click(function (event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Toggle the visibility of the dropdown content
            moreDropdownContent.toggleClass('hidden');
        });

        // Close the dropdown if the user clicks outside of it
        $(document).click(function (event) {
            if (!moreDropdownBtn.is(event.target) && !moreDropdownContent.is(event.target) && moreDropdownContent.has(event.target).length === 0) {
                moreDropdownContent.addClass('hidden');
            }
        });
        });
    </script>
</html>
