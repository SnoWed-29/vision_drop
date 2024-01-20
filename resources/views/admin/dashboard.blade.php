@extends('layouts.adminApp')
@section('content')
    <section class="w-full p-2">
        <div class="flex w-10/12 mx-auto">
            <div class="flex justify-center w-full my-4 p-3 border-b-2 border-b-[#645394]">
                <h2 class="text-3xl text-[#645394] font-medium">Dashboard</h2>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 ">
            <div class="p-4 h-full linearBackground rounded-lg shadow-xl" style="position: relative;">
                <h1 class="text-white text-2xl mb-3"><i class="fa-solid fa-x text-red-400"></i> Total Unconfirmed Orders</h1>
                <span class="text-xl font-medium">13</span>
                
            </div>
            
            
            <div class="bg-white p-4 h-full linearBackground rounded-lg shadow-xl">
                <h1 class="text-white text-2xl mb-3"><i class="fa-solid fa-check text-green-400"></i> Total Confirmed Orders</h1>
                <span class="text-xl font-medium ">20</span>
            </div>
            <div class="bg-white p-4 h-full linearBackground rounded-lg shadow-xl">
                <h1 class="text-white text-2xl mb-3"><i class="fa-solid fa-box-open"></i> Total Products</h1>
                <span class="text-xl font-medium ">20</span>
            </div>
            <div class="bg-white p-4 h-full linearBackground rounded-lg shadow-xl">
                <h1 class="text-white text-2xl mb-3"><i class="fa-solid fa-cash-register"></i> Total Gain</h1>
                <span class="text-xl font-medium ">2000 Dh</span>
            </div>
        </div>

        <div class="flex text-black">
            <table id="myDataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>25</td>
                        <td>New York</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
        </div>
    </section>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
         $(document).ready(function () {
            $('#myDataTable').DataTable();
        });
    </script>
@endsection