<div class="grid grid-cols-1 gap-5 md:grid-cols-3">
    <div style="display: flex; gap:50px; width: 100%;">
    <div class="mb-5" style="width:70%">
        <label for="product-name" style="display:block; margin-bottom: 8px;" class=" text-sm font-medium text-gray-900">Title</label>
        <input type="product-name" name='name' value="{{ old('name', $product->name ?? '') }}" id="product-name" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product name" style="display:block; width:100%; padding:10px; border-radius: 5px;" />
        <p id="product-name-error" class="text-sm text-red-600 hidden"></p>
    </div>
    

    <div class="mb-5" style="width:10%">
        <label for="product-price" style="display:block; margin-bottom: 8px;" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
        <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" id="product-price" step="0.01" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter price" style="display:block; width:100%; padding:10px; border-radius: 5px;" />
        <p id="product-price-error" class="text-sm text-red-600 hidden"></p>
    </div>

    <div class="mb-5" style="width:15%">
        <label for="product-stock" style="display:block; margin-bottom: 8px;" class="block mb-2 text-sm font-medium text-gray-900">Stock Status</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}" id="product-stock" step="1" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Stock Amount" style="display:block; width:100%; padding:10px; border-radius: 5px;"/>
        <p id="product-stock-error" class="text-sm text-red-600 hidden"></p>
    </div>
    </div>

</div>

<div class="mb-5">
    <label for="product-description" style="display:block; margin-bottom: 8px;" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
    <textarea id="product-description" name="description" rows="4" style="display:block; width:100%; padding:10px; border-radius: 5px;" class="block p-2.5 w-full text-sm text-slate-900 bg-slate-100 rounded-lg border border-slate-400 focus:ring-blue-500 focus:border-blue-500" placeholder="Product Description....">{{ old('description', $product->description ?? '') }}</textarea>
    <p id="product-description-error" class="text-sm text-red-600 hidden"></p>
</div>

<!-- Drag and Drop File Upload -->
<div style="margin-bottom:20px">
    <div id="image-preview-container" style="margin-bottom:15px;" class="hidden">
        <h3 style="margin-bottom:10px;" class="text-sm text-gray-700">Preview:</h3>
        <img id="image-preview" src="#" alt="Image Preview" class="w-64 h-64 object-cover rounded-lg border border-gray-300" />
    </div>
    
    @if (!empty($product) && $product->image)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const previewContainer = $("#image-preview-container");
                const previewImage = $("#image-preview");
                previewImage.attr("src", "{{ asset('storage/products/' . basename($product->image)) }}");
                previewContainer.removeClass("hidden");
            });
        </script>
    @endif

    <!-- Drag and Drop Image Upload -->
    <div style="display:flex; flex-direction: column; width:100%; margin-bottom: 20px;" class="items-center justify-center">
        <div id="dropzone" style="display:flex; flex-direction: column; width:100%; border:2px dashed #afafaf; padding:10px; border-radius: 5px;" class="flex-col items-center justify-center h-64 border-2 border-slate-400 border-dashed rounded-lg cursor-pointer bg-slate-100 hover:bg-slate-200">
            <div style="margin:auto; display: flex; flex-direction: column;" class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg style="width:32px;height:32px; margin-bottom:16px; text-align: center; margin: auto;" class="text-slate-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p style="text-align:center; margin-bottom: 8px;" class="mb-2 text-sm text-slate-600">Drag and drop or click to Choose File</p>
                <p style="text-align:center;" class="text-xs text-slate-500">.JPG, .PNG, .JPEG</p>
            </div>
        </div>
        <input id="product-image" name="image" type="file" class="hidden" style="margin-top:10px"/>
    </div>

    <p id="product-image-name" class="text-sm text-green-600 hidden"></p>
    <p id="product-image-error" class="text-sm text-red-600 hidden"></p>
</div>
