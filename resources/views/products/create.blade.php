<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Add New Product</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Category</label>
                <select name="category_id" required class="w-full border p-2 rounded">
                    <option value="">Select Category</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" required class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block mb-1 font-medium">Product Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Product</button>
            </div>
        </form>
    </div>
</body>
</html>