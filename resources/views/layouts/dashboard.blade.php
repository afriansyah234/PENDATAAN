<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - @yield('title')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            display: flex;
            font-family: "Segoe UI", sans-serif;
            background-color: #f3f4f6;
        }
        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            overflow-y: auto;
        }
        .sidebar h2 {
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.4em;
            border-bottom: 2px solid #334155;
            padding-bottom: 10px;
        }
        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 10px 15px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: 0.2s;
        }
        .sidebar a:hover {
            background-color: #334155;
            color: #fff;
            transform: translateX(4px);
        }
        .sidebar .active {
            background-color: #2563eb;
            color: #fff;
        }
        .sidebar .menu-section {
            margin-top: 15px;
        }
        .sidebar .menu-title {
            font-size: 0.9em;
            color: #94a3b8;
            margin: 10px 0 5px 5px;
            text-transform: uppercase;
        }
        .content {
            flex: 1;
            margin-left: 250px;
            padding: 25px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8em;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#" class="active">🏠 Dashboard</a>

        <div class="menu-section">
            <div class="menu-title">📚 Data Master</div>
            <a href="#">👨‍🎓 Data Siswa</a>
            <a href="#">🏫 Data Kelas</a>
            <a href="#">👩‍🏫 Data Guru</a>
            <a href="#">📖 Data Mapel</a>
        </div>

        <div class="menu-section">
            <div class="menu-title">🗓️ Akademik</div>
            <a href="#">📅 Jadwal Pelajaran</a>
            <a href="#">📊 Data Nilai</a>
        </div>

        <div class="menu-section">
            <div class="menu-title">⚙️ Pengaturan</div>
            <a href="#">👤 Kelola User</a>
            <a href="#">🔧 Pengaturan Sistem</a>
        </div>

        <footer>
            © {{ date('Y') }} Pendataan Siswa
        </footer>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
