@include ('layouts.header')


<section style="padding:80px 50px">
    <div class="xl:container mx-auto">
        <div class="mb-6">
            <h1 class="text-center mb-2 text-2xl font-bold leading-none tracking-tight text-slate-800 md:text-3xl lg:text-4xl">Create New Product</h1>
            <p class="text-center text-slate-700">Fill out the field.</p>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        </div>

        <div class="mb-6">
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

        <div class="max-w-5xl mx-auto px-8 md:px-8">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
                @csrf
                @include('partials.form')
                <button type="submit" id="submit-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create Product</button>
            </form>
       </div>
    </div>
</section>

@include('layouts.footer')