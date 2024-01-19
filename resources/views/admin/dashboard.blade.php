@extends('layouts.adminApp')
@section('content')
    <section class="w-full p-2">
        <div class="flex w-10/12 mx-auto">
            <div class="flex justify-center w-full my-4 p-3 border-b-2 border-b-[#645394]">
                <h2 class="text-3xl">Dashboard</h2>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-white h-24">
                <h1 class="text-black">Manage Orders</h1>
            </div>
            <div class="bg-white h-24">
                <h1 class="text-black">Manage Categories</h1>
            </div>
            <div class="bg-white h-24">
                <h1 class="text-black">Manage Users</h1>
            </div>
            <div class="bg-white h-24">
                <h1 class="text-black">Manage Products</h1>
            </div>
            <div class="bg-white h-24">
                <h1 class="text-black">Manage website</h1>
            </div>
        </div>
    </section>
@endsection