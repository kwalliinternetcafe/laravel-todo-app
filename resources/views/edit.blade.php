<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">

<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-6 text-blue-700">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $task->title }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save Changes</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="block mt-4 text-blue-500 hover:underline">← Back to List</a>
</div>

<!-- Footer -->
<footer class="text-center py-4 mt-6 bg-gray-200">
    <p class="text-sm text-gray-600">Powered by <span class="font-bold text-blue-700">zmsalis</span></p>
</footer>

</body>
</html>