@extends('layouts.adminApp')

@section('content')
<section class="w-full p-2 text-black">
    <div class="flex w-10/12 mx-auto">
        <div class="flex justify-center w-full mb-4 p-3 border-b-2 border-b-[#645394]">
            <h2 class="text-3xl text-black">Manage Products </h2>
        </div>
    </div>
    {{-- Add product Form --}}
    <div class="flex w-full flex-col">
        <h2 class="text-xl font-medium py-2 w-fit border-b border-b-[#645394]">Add Product</h2>
        <div class="flex flex-col">
            <form action="{{ route('addProduct')}}" method="POST" class="grid grid-cols-2 gap-4 mx-auto w-4/5 my-2" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="bg-white">
                    <div class="flex flex-col  mb-4">
                        <label for="name" class="font-medium mb-2">Name</label>
                        <input type="text" name="name" class="border w-full p-[2px]" placeholder="Your name here">
                        @error('name')
                            <p class="error-message text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="flex mt-6 w-full justify-end">
                    <button type="submit" class="bg-[#645394] w-fit h-fit px-4 py-2 font-medium text-white">Add</button>
                </div>
            </form>
        </div>
    </div>
   <div class="flex w-full flex-col">
        <div class="flex w-fit justify-center mb-4 p-3 border-b-2 border-b-[#645394]">
            <h2 class="text-2xl text-black">Manage Products </h2>
        </div>  
        
    <div class="relative overflow-x-auto w-10/12 mx-auto shadow-md sm:rounded-lg">
        <table id="OrdersTable" class="table table-striped p-1" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created at </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat )
                <tr>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td class="flex space-x-4">
                        <a href="" class="bg-[#645394] px-4 py-2 text-white font-medium">Edit</a>
                        <form action="">
                            <input type="hidden" value="{{$cat->id}}" name="id">
                            @csrf
                            <button type="submit" class="bg-red-400 px-4 py-2 font-medium text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Created at </th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
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
