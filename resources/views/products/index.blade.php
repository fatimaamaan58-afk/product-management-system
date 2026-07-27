<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Products List</h1>
            <div class="space-x-2">
                <a href="{{ route('categories.index') }}" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Manage Categories</a>
                <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Product</a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search & Filter Form (Bonus Included) -->
        <form method="GET" action="{{ route('products.index') }}" class="flex gap-4 mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name..." class="border p-2 rounded flex-1">
            <select name="category_id" class="border p-2 rounded">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Filter</button>
            <a href="{{ route('products.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded flex items-center">Reset</a>
        </form>

        <table class="w-full text-left border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="p-3 border">Image</th>
                    <th class="p-3 border">Name</th>
                    <th class="p-3 border">Category</th>
                    <th class="p-3 border">Price</th>
                    <th class="p-3 border">Quantity</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td class="p-3 border">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-xs text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="p-3 border font-semibold">{{ $product->name }}</td>
                        <td class="p-3 border">{{ $product->category->name ?? 'Uncategorized' }}</td>
                        <td class="p-3 border">${{ number_format($product->price, 2) }}</td>
                        <td class="p-3 border">{{ $product->quantity }}</td>
                        <td class="p-3 border space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center border text-gray-500">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>