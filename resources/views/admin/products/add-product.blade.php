@extends('layouts.adminApp')

@section('content')
<section class="w-full p-2 text-black">
    <div class="flex w-10/12 mx-auto">
        <div class="flex justify-center w-full mb-4 p-3 border-b-2 border-b-[#645394]">
            <h2 class="text-3xl text-black">Manage Products </h2>
        </div>
    </div>
    <div class="flex w-full flex-col">
        <h2 class="text-xl font-medium py-2 w-fit border-b border-b-[#645394]">Add Product</h2>
        <div class="flex flex-col">
            <form action="" class="grid grid-cols-2 gap-4 mx-auto w-4/5 my-2">
                <div class="bg-white">
                    <label for="name" class="font-medium mb-2">Name</label>
                    <input type="text" name="name" class="border mb-4 w-full p-[2px]" placeholder="Your name here">

                    <label for="name" class="font-medium mb-2">Price</label>
                    <input type="text" name="price" class="border mb-4 w-full p-[2px]" placeholder="500, 600 .... ">

                    <label for="name" class="font-medium mb-2">Discount</label>
                    <input type="text" name="discount" class="border mb-4 w-full p-[2px]" placeholder="Discount in % exp: 30, 40, 50">

                    <label for="name" class="font-medium mb-2">Stock Quantity</label>
                    <input type="text" name="stockQuantity" class="border mb-4 w-full p-[2px]" placeholder="Discount in % exp: 30, 40, 50">

                    <label for="name" class="font-medium mb-2">Category</label>
                    <select name="category" class="w-full border">
                        <option value="1">Category1</option>
                        <option value="2">Category2</option>
                        <option value="3">Category3</option>
                    </select>
                </div>
                <div class="bg-white">
                    <label for="name" class="font-medium mb-2">Description</label>
                    <textarea name="" id="editor" class="w-full h-full"></textarea>
                </div>
                <div class="flex">
                    <input type="file" id="image-input" class="z-0" accept="image/*" multiple>
                    <button type="button" class="z-0" onclick="addImages()">Add Images</button>

                    <!-- Container for image previews with grid system -->
                    <div id="image-preview-container" class="mt-4 grid grid-cols-3 gap-4 z-1"></div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

        function addImages() {
        const inputElement = document.getElementById('image-input');
        const previewContainer = document.getElementById('image-preview-container');

        for (const file of inputElement.files) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const image = document.createElement('img');
                image.src = e.target.result;
                image.classList.add('preview-image');
                previewContainer.appendChild(image);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
