<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">✏️ Edit Kelas</h1>
            <a href="{{ route('classrooms.index') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-semibold hover:bg-indigo-100 transition">
                ← Kembali
            </a>
        </div>
    </header>

    <main class="max-w-lg mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Form Edit Kelas</h2>

        <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_kelas" class="block text-gray-700 font-medium mb-1">Nama Kelas</label>
                <input type="text" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', $classroom->nama_kelas) }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-indigo-200 focus:outline-none">
                @error('nama_kelas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kapasitas" class="block text-gray-700 font-medium mb-1">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $classroom->kapasitas) }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-indigo-200 focus:outline-none">
                @error('kapasitas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md font-semibold hover:bg-indigo-700 transition">
                💾 Perbarui
            </button>
        </form>
    </main>

    <footer class="mt-10 py-4 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Sistem Pendataan Kelas.
    </footer>
</body>
</html>
