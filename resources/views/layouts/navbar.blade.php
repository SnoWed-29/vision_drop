<nav class="flex justify-between w-full bg-purple-500 text-[#fff] border-b-2 border-b-[#645394] z-10 lg:p-3" id="navbar">
    <div class="hidden w-10/12 mx-auto justify-between lg:flex">
        <div class="flex w-1/3">
            <a href="/" class="text-xl font-medium bg-black">
                <img src="{{asset("images/LOGO VISION.png")}}" alt="logo" class="w-[40px]">
           </a>
        </div>
        <div class="flex space-x-3 ">
            @foreach ($categories as $cat )
            <a href="/products/{{$cat->name}}" class="text-2xl md:text-red-400 font-medium hover:border-b-2 border-b-[#fff]"> {{$cat->name}} </a>
                
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function(){

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


            $('#navBtn').click(function(e){
                e.preventDefault();
                $('#navMenu').toggle();
            })
        // Close the dropdown if the user clicks outside of it
        $(document).click(function (event) {
            if (!moreDropdownBtn.is(event.target) && !moreDropdownContent.is(event.target) && moreDropdownContent.has(event.target).length === 0) {
                moreDropdownContent.addClass('hidden');
            }
        });

    $('#cartBtn').click(function(e){
                e.preventDefault();
                $('#cartMenu').toggle();
            })


            $('#navBtn').click(function(e){
                e.preventDefault();
                $('#navMenu').toggle();
            })

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
        $('.hover-trigger').hover(function () {
            $(this).find('.content-div').toggleClass('hidden');
        });
})
</script>