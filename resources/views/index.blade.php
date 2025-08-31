<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">

<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">My To-Do List</h1>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Task Form -->
    <form action="{{ route('tasks.store') }}" method="POST" class="flex mb-6">
        @csrf
        <input type="text" name="title" placeholder="Enter new task"
               class="flex-grow border border-gray-300 rounded-l px-3 py-2 focus:outline-none">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Add</button>
    </form>

    <!-- Task List -->
    <ul class="space-y-3">
        @foreach($tasks as $task)
            <li class="flex items-center justify-between bg-white p-3 rounded shadow">
                <div class="flex items-center space-x-2">
                    <!-- Checkbox form -->
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                    </form>
                    <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                        {{ $task->title }}
                    </span>
                </div>

                <div class="flex space-x-2">
                    <!-- Edit Button -->
                    <a href="{{ route('tasks.edit', $task->id) }}" 
                       class="text-blue-500 hover:underline">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<!-- Footer -->
<footer class="text-center py-4 mt-6 bg-gray-200">
    <p class="text-sm text-gray-600">Powered by <span class="font-bold text-blue-700">zmsalis</span></p>
</footer>

</body>
</html>