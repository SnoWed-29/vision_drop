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
        <nav class="flex justify-between w-full bg-purple-500 text-[#fff] border-b-2 border-b-[#645394] z-10 lg:p-3" id="navbar">
            <div class="hidden w-10/12 mx-auto justify-between lg:flex">
                <div class="flex w-1/3">
                    <a href="/" class="text-xl font-medium bg-black">
                        <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[40px]">
                   </a>
                </div>
                <div class="flex space-x-3 ">
                    @foreach ($categories as $cat )
                    <a href="/products/{{$cat->name}}" class="text-2xl  font-medium hover:border-b-2 border-b-[#fff]"> {{$cat->name}} </a>
                        
                    @endforeach
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
                    <a href="#" class="text-2xl font-medium " id="cartBtn"> <i class="fa-solid fa-cart-shopping "></i> </a>
                            <div class="hidden p-1 py-3 bg-white absolute w-1/5 border my-12 flex-col rounded-md divide-y text-black" id="cartMenu">
                                <div id="cartContainer">
                                    @foreach($productsInCart as $product)
                                    <div class="flex space-x-3 p-2" >
                                        <div class="flex">
                                            <img src="{{  asset(Storage::url($product['image'])) }}" alt="product" class="w-[64px] h-[64px] rounded-xl m-2">
                                        </div>
                                        <div class="flex flex-col space-y-2 justify-center">
                                            <h2 class="text-lg font-medium text-lg">{{ $product['name'] }}</h2>
                                            <span class="text-lg text-gray-500">{{ $product['category']->name }}</span>
                                        </div>
                                    </div>
                                @endforeach
        
                                @if(!$productsInCart)
                                <p class="py-4 text-center">Cart is empty</p>
                                @endif
                                </div>
                                
                                <div class="flex my-2 flex-col space-y-2">
                                    <a href="/cart" class="bg-[#645394] text-white rounded-lg text-center px-4 py-2 w-full">Checkout</a>
                                    <a href="" id="emptyCart" class="text-gray-400 underline">Empty Cart</a>
                                </div>
                            </div>
        
                   
                </div>
            </div>
            <div class="flex w-full mx-auto justify-between lg:hidden">
                <div class="flex">
                    <a href="#navbar" class="font-medium text-4xl px-2" id="navBtn"><i class="fa-solid fa-bars"></i></a>
                </div>        
                <div class="flex">
        
                    <a href="/" class="text-xl font-medium bg-black">
                        <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[45px]">
                   </a>
                </div>
                <a href="#" class="text-4xl font-medium px-2" > <i class="fa-solid fa-cart-shopping "></i> </a>
        
            </div>
            <div class="hidden  absolute h-screen my-12 w-full bg-purple-500 " id="navMenu">
                <div class="flex flex-col space-y-4">
                    @foreach ($categories as $cat )
                        <a href="/products/{{$cat->name}}" class="text-2xl p-2 border-b  font-medium border-b-[#fff]"> {{$cat->name}} </a> 
                    @endforeach
                </div>
            </div>
        </nav>
        <main class="mt-5" id="scroll-section">
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
                        navbar.addClass("fixed animate__animated animate__slideInDown top-0 shadow-xl text-white border-b-3 border-b-[##645394]");
                    } else {
                        navbar.removeClass("fixed animate__animated animate__slideInDown  top-0 shadow-xl text-white border-b-3 border-b-[#645394]");
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
            $(document).click(function (event) {
                if (!moreDropdownBtn.is(event.target) && !moreDropdownContent.is(event.target) && moreDropdownContent.has(event.target).length === 0) {
                    moreDropdownContent.addClass('hidden');
                }
            });

            $('#cartBtn').click(function(e){
                e.preventDefault();
                $('#cartMenu').toggle();
            })
        });

        document.getElementById('emptyCart').addEventListener('click', function (event) {
            event.preventDefault();

            // Make an AJAX request to empty the cart
            fetch('{{ route("empty.cart") }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the UI or show a success message (optional)
                    console.log('Cart emptied successfully');

                    // Clear the cart items in the UI
                    $('#cartContainer').empty();

                    // Optionally, show a message in the UI
                    $('#cartContainer').append('<p class="py-4 text-center">Cart is empty</p>');
                }
            })
            .catch(error => {
                console.error('Error emptying the cart', error);
            });
        });
    </script>
</html>
