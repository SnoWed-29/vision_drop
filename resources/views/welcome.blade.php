@extends("layouts.app")

@section("content")

<div class="flex w-full md:w-10/12 mx-auto my-2 py-4">
    <div class="owl-carousel owl-theme ">

        <div class="item relative hover-trigger flex items-end h-[50vh] hover:-translate-y-1 hover:scale-125 transition duration-300 ease-in-out delay-150"> 
            <img src="{{asset('images/1.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh] hover:-translate-y-1 hover:scale-125 transition duration-300 ease-in-out delay-150"> 
            <img src="{{asset('images/7.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh] hover:-translate-y-1 hover:scale-125 transition duration-300 ease-in-out delay-150"> 
            <img src="{{asset('images/2.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh] hover:-translate-y-1 hover:scale-125 transition duration-300 ease-in-out delay-150"> 
            <img src="{{asset('images/4.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh] hover:-translate-y-1 hover:scale-125 transition duration-300 ease-in-out delay-150"> 
            <img src="{{asset('images/5.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
    </div>
</div>

{{-- Nav Section  --}}
<nav class="flex justify-between w-full bg-purple-500 text-[#fff] border-b-2 border-b-[#645394] z-10 p-3" id="navbar">
    <div class="flex w-10/12 mx-auto justify-between">
        <div class="flex w-1/3">
            <a href="/" class="text-xl font-medium bg-black">
                <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[40px]">
           </a>
        </div>
        <div class="flex w-1/3 justify-around">
            <a href="/products" class="text-2xl font-medium hover:border-b-2 border-b-[#fff]"> Hoddies </a>
            <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#fff]"> Flags </a>
            <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#fff]"> Flashlights </a>
            <a href="#" class="text-2xl font-medium hover:border-b-2 border-b-[#fff]"> More </a>
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
</nav>
{{-- products Section --}}
<section class="w-10-12 mx-auto my-2"  id="scroll-section">
    <div class="flex w-full justify-center mb-12">
        <h1 class="text-3xl border-b-2 border-b-[#645394] py-2">Latest Flags</h1>
    </div>
    <div class="flex w-9/12 mx-auto flex-col space-y-4">
        <div class="flex  w-full justify-around">
            <div class="flex w-72 h-fit flex-col items-center ">
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
            <div class="flex w-72 h-fit flex-col items-center rounded-md">
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
            <div class="flex w-72 h-fit flex-col items-center rounded-md">
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
            <div class="flex w-72 h-fit flex-col items-center rounded-md">
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
    {{-- latest hoddies --}}
    <div class="flex w-full justify-center my-12">
        <h1 class="text-3xl border-b-2 border-b-[#645394] py-2">Latest hoddies</h1>
    </div>
    <div class="flex w-9/12 mx-auto flex-col space-y-4">
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true
        });

        $('.hover-trigger').hover(function () {
            $(this).find('.content-div').toggleClass('hidden');
        });

        // Function to handle the fixed navigation bar
        function fixNavbar() {
            var navbar = $("#navbar");
            var scrollSection = $("#scroll-section");
            var offset = scrollSection.offset().top;

            $(window).scroll(function () {
                if ($(window).scrollTop() >= offset) {
                    navbar.addClass("fixed animate__animated animate__slideInDown shadow-xl border-b-3 border-b-[#fff]");
                } else {
                    navbar.removeClass("fixed animate__animated animate__slideInDown  shadow-xl  border-b-3 border-b-[#fff]");
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
        $('#cartBtn').click(function(e){
                e.preventDefault();
                $('#cartMenu').toggle();
            })
        // Close the dropdown if the user clicks outside of it
        $(document).click(function (event) {
            if (!moreDropdownBtn.is(event.target) && !moreDropdownContent.is(event.target) && moreDropdownContent.has(event.target).length === 0) {
                moreDropdownContent.addClass('hidden');
            }
        });
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
<style>
    /* Add this style for the fixed navigation bar */
    #navbar.fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: top 0.3s; /* Add a smooth transition */
    }


   
</style>
@endsection
