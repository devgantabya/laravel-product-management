@include('layouts.header')

<section style="padding-top:80px;padding-bottom:50px">
    <div style="display:flex;gap:10px; align-items:baseline">
        <div style="width:80%">
        <h1>Products</h1>
        </div>
        <div style="text-align:right;width:20%">
        <a href="{{ route('products.create') }}" style="padding:10px 20px;vertical-align:baseline;text-decoration:none;background-color:#000000;color:#ffffff;border-radius:5px">
          
            <strong><span style="font-size:20px;font-weight:700">+</span></strong> Create
        </a>
        </div>
    </div>
</section>



<main>
    <div class=" mx-auto">

        <div class="mb-6 text-center" style="margin-bottom:20px;">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
            @endif
        
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <span class="font-medium">Danger alert!</span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Your content here -->
        </div>

        <div style="display:relative; overflow-x: auto; padding:24px; background-color:#ffffff; border-radius: 5px;">

            <div style="display:flex; flex-direction: column; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-top: 16px; margin-bottom: 24px; " >

                <label for="table-search" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;">Search</label>
                <div style="display:relative">
                    <div style="display:absolute; display: flex; align-items:center; inset-inline-start: 0px; top: 0px; bottom: 0px; scroll-padding-inline-start:12px; pointer-events: none;">
                        <svg style="width:16px; height:16px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-product" style="display:block; border: 1px solid #dddddd; border-radius: 5px; min-height:44px; scroll-padding-inline-start:40px; width:320px" placeholder="Search">
                </div>
            </div>

            <table style="width:100%;">
                <thead style="padding:10px 0px; text-align:left; text-transform:uppercase;" class="text-xs text-gray-700  bg-gray-50">
                    <tr style="padding:10px 0px">
                        <th scope="col" style="padding: 12px 64px; text-align:center">
                            ID
                        </th>

                        <th scope="col" style="padding: 12px 64px; text-align:center">
                            <span style="overflow: hidden;">Image</span>
                        </th>
                        
                        <th style="padding: 12px 24px; text-align:center">
                            <a href="{{ route('products.index', ['sortBy' => 'name', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Name
                                @if ($sortBy == 'name' && $sortOrder == 'asc')
                                    &uarr;
                                @else
                                    &darr;
                                @endif
                            </a>
                        </th>
                        <th style="padding: 12px 24px; text-align:center">
                            <a href="{{ route('products.index', ['sortBy' => 'description', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Description
                                @if ($sortBy == 'description' && $sortOrder == 'asc')
                                    &uarr;
                                @else
                                    &darr;
                                @endif
                            </a>
                        </th>
                        <th style="padding: 12px 24px; text-align:center">
                            <a href="{{ route('products.index', ['sortBy' => 'price', 'sortOrder' => $sortOrder == 'asc' ? 'desc' : 'asc']) }}">
                                Price
                                @if ($sortBy == 'price' && $sortOrder == 'asc')
                                    &uarr;
                                @else
                                    &darr;
                                @endif
                            </a>
                        </th>
                       
                        <th scope="col" style="padding: 12px 24px; text-align:center">
                            Stock
                        </th>

                        <th scope="col" style="padding: 12px 24px; text-align:center">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody style="text-align:center" class="divide-y divide-gray-100" id="product-list">
                    @include('partials.product_rows', ['products' => $products])
                </tbody>

            </table>

            <div class="mt-4"> {{ $products->appends(request()->input())->links('vendor.pagination.tailwind') }} </div>

            <!-- Edit user modal -->
            <!--<div id="deleteModal" tabindex="-1" aria-hidden="true" class="bg-slate-300 bg-opacity-85 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">-->
                    <!-- Modal content -->
                    <!--<div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                        <button type="button" class="text-slate-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <svg class="text-slate-500"style="color: rgb(100 116 139);margin:auto;margin-bottom:14px;width:44px;height:44px" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <p class="mb-4 text-slate-500">Are you want to delete this item?</p>
                        <div class="justify-center items-center space-x-4"style="display:flex; gap:10px;">
                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-slate-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">
                                No, Cancel
                            </button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" role="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                                    Yes, confirm
                                </button>
                            </form>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

    </div>
</main>


<script>
    document.addEventListener("DOMContentLoaded", function () {
            $("#table-search-product").on("input", function () {
            // debugger;
            let query = $(this).val();
            console.log(query);

            $.ajax({
                url: '{{ route("products.search") }}',
                method: "GET",
                data: { query: query },
                success: function (response) {
                    $('#product-list').html(response);
                },
                error: function () {
                    console.log("Error! Please try again.");
                },
            });
        });
    });
</script>

@include('layouts.footer')
   

