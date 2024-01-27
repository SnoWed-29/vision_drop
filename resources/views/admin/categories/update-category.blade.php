@extends('layouts.adminApp')

@section('content')
<section class="w-full p-2 text-black">
    <div class="flex w-10/12 mx-auto">
        <div class="flex justify-center w-full mb-4 p-3 border-b-2 border-b-[#645394]">
            <h2 class="text-3xl text-black">Updating Category with id  <span class="text-red-400">{{$category->id}} </span> </h2>
        </div>
    </div>
    {{-- Add product Form --}}
    <div class="flex w-full flex-col">
        <h2 class="text-xl font-medium py-2 w-fit border-b border-b-[#645394]">Add Product</h2>
        <div class="flex flex-col">
            <form action="{{ route('updateCategory', ['id'=> $category->id])}}" method="POST" class="grid grid-cols-2 gap-4 mx-auto w-4/5 my-2" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="bg-white">
                    <div class="flex flex-col  mb-4">
                        <label for="name" class="font-medium mb-2">Name</label>
                        <input type="text" name="name" class="border w-full p-[2px]" placeholder="Your name here" value="{{$category->name}}">
                        @error('name')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="flex mt-6 w-full justify-end">
                    <button type="submit" class="bg-[#645394] w-fit h-fit px-4 py-2 font-medium text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    
    new DataTable('#OrdersTable');
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
        

</script>
@endsection
