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


        <div class="relative overflow-x-auto my-3 shadow-xl py-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
         $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection