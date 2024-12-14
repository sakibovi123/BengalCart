@extends('dashboard.layout.base')

{{-- @section('title', 'Dashboard Overview') --}}

@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-4 sm:p-6 overflow-auto">
        <div class="flex items-center justify-between my-3">
            @include('dashboard.layout.breadcrumb', [ 'breadcrumbs' => $breadcrumbs ])
            <h1 class="text-xl sm:text-2xl font-semibold mb-4 text-center">Create Category</h1>
        </div>

        <div class="w-full bg-white shadow-md rounded-lg p-4 sm:p-6 lg:p-8 mx-2 sm:mx-4 lg:mx-6 xl:mx-10">
            <!-- Responsive Form -->

            <form id="categoryForm" class="w-full" enctype="multipart/form-data">
                <!-- Category Name -->
                <div class="mb-5">
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Category Name
                    </label>
                    <input type="text" id="category_name" name="name"
                           class="w-full shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                           placeholder="Enter Category Name" required />
                </div>

                <!-- Category Thumbnail -->
                <div class="mb-5">
                    <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900">
                        Category Thumbnail
                    </label>
                    <input type="file" id="thumbnail" name="thumbnail"
                           class="w-full shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                           required />
                    <div id="imagePreview" class="mt-3">
                        <img id="previewImg" src="" alt="Thumbnail Preview" class="hidden w-32 h-32 object-cover rounded-lg">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row sm:justify-center gap-3">
                    <button type="button" id="saveCategory"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
                        Save
                    </button>
                    <a href="{{ route('category') }}"
                       class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
                        Back
                    </a>
                </div>
            </form>

        </div>
    </main>

    <script>
        $(document).ready(function () {
            // Preview the uploaded image
            $('#thumbnail').on('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#previewImg').attr('src', e.target.result).removeClass('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Save the category using Axios
            $('#saveCategory').on('click', function () {
                const formData = new FormData();
                formData.append('name', $('#category_name').val());
                formData.append('thumbnail', $('#thumbnail')[0].files[0]);

                axios.post('{{ route('categories.store') }}', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        alert(response.data.message);
                        window.location.href = '{{ route('category') }}';
                    })
                    .catch(error => {
                        if (error.response && error.response.data.errors) {
                            let errors = error.response.data.errors;
                            alert(Object.values(errors).join('\n'));
                        } else {
                            alert('Something went wrong.');
                        }
                    });
            });
        });
    </script>
@endsection
