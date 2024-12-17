@extends('dashboard.layout.base')

{{-- @section('title', 'Dashboard Overview') --}}

@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
        <h1 class="text-2xl font-semibold mb-4 text-center">Hello Product</h1>
        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 lg:p-8 mx-2 sm:mx-6 lg:mx-10">
            <!-- Add Slider Button -->
            <a href="{{route('add.slider')}}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 sm:px-5 sm:py-2.5 mb-4 inline-block dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Add Product
            </a>

            <!-- Table Wrapper -->
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-xs sm:text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs sm:text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">NO.</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Product Name</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Description</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Features</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Specification</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Buying Price</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Selling Price</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Discount</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Image</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Multi Images</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Video Url</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Stock Amount</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Is Out Of Stock</th>
                            <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white sm:px-4 sm:py-3">
                                01.
                            </th>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, similique?</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">
                                <a href="{{route('edit.slider')}}"
                                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs sm:text-sm px-3 py-1 sm:px-4 sm:py-2 mb-2 inline-block dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Edit
                                </a>
                                <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs sm:text-sm px-3 py-1 sm:px-4 sm:py-2 mb-2 inline-block dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white sm:px-4 sm:py-3">
                                02.
                            </th>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, similique?</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">Lorem</td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3">
                                <a href="{{route('edit.slider')}}"
                                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs sm:text-sm px-3 py-1 sm:px-4 sm:py-2 mb-2 inline-block dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Edit
                                </a>
                                <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs sm:text-sm px-3 py-1 sm:px-4 sm:py-2 mb-2 inline-block dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
