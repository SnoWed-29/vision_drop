@extends("layouts.app")

@section("content")

<div class="flex w-full md:w-10/12 mx-auto my-2 py-4 border-b-2 border-white">
    <div class="owl-carousel owl-theme stop">
        <div class="item relative hover-trigger flex items-end h-[50vh]"> 
            <img src="{{asset('images/1.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh]"> 
            <img src="{{asset('images/7.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh]"> 
            <img src="{{asset('images/2.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh]"> 
            <img src="{{asset('images/4.jpg')}}" class="h-full absolute inset-0"> 

            <div class="content-div absolute inset-0 flex flex-col h-full items-center justify-center space-y-3 p-6 bg-[#6453944d] hidden">
                <h1 class="text-xl text-white">Lorem, ipsum.</h1>
                <p class="text-white text-default text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam eligendi cum mollitia, corrupti commodi vero.
                </p>
                <a href="#" class="bg-[#645394] px-4 py-2 rounded-sm">View More</a>
            </div>
        </div>
        <div class="item relative hover-trigger flex items-end h-[50vh]"> 
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
<section class="w-10-12 mx-auto h-[200vh]">
    <div class="flex w-full justify-center my-2">
        <h1 class="text-3xl border-b-2 border-b-[#645394] py-2">Our Categories</h1>
    </div>
    <div class="flex w-9/12 mx-auto flex-col space-y-2">
        <div class="flex w-full space-x-2">
            <div class="flex w-1/3 h-24 border"></div>
            <div class="flex w-1/3 h-24 border"></div>
            <div class="flex w-1/3 h-24 border"></div>
        </div> 
        <div class="flex w-full space-x-2">
            <div class="flex w-1/3 h-24 border"></div>
            <div class="flex w-1/3 h-24 border"></div>
            <div class="flex w-1/3 h-24 border"></div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    // Make sure Owl Carousel is loaded before calling its functions
    $(document).ready(function(){
        var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3500,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

$('.hover-trigger').hover(function(){
            $(this).find('.content-div').toggleClass('hidden');
        });
    });
</script>
@endsection
