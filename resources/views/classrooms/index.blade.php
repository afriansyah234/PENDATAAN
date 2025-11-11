<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">📚 Manajemen Kelas</h1>
            <a href="{{ route('classrooms.create') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-semibold hover:bg-indigo-100 transition">
                + Tambah Kelas
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto mt-6 p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Semua Kelas</h2>

            @if ($classrooms->isEmpty())
                <p class="text-gray-500 italic">Belum ada data kelas 😅</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-indigo-50 border-b">
                                <th class="py-3 px-4 font-semibold text-gray-700">#</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Nama Kelas</th>
                                <th class="py-3 px-4 font-semibold text-gray-700">Kapasitas</th>
                                <th class="py-3 px-4 font-semibold text-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $i => $classroom)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $i + 1 }}</td>
                                    <td class="py-3 px-4 font-medium text-gray-800">{{ $classroom->nama_kelas }}</td>
                                    <td class="py-3 px-4">{{ $classroom->kapasitas }}</td>
                                    <td class="py-3 px-4 flex justify-center space-x-2">
                                        <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition">
                                           ✏️ Edit
                                        </a>
                                        <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">
                                                🗑 Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>

    <footer class="mt-10 py-4 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Sistem Pendataan Kelas. Dibuat dengan 💜 oleh Admin.
    </footer>
</body>
</html>
