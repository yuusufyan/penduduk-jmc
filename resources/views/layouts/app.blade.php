<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Aplikasi Penduduk JMC</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f7fa;
    }

    .wrapper {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 220px;
      background-color: #1e3a8a;
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar h1 {
      font-size: 20px;
      margin-bottom: 30px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      margin: 10px 0;
      font-weight: bold;
      display: block;
      padding: 8px 12px;
      border-radius: 6px;
    }

    .sidebar a:hover {
      background-color: #3749ba;
    }

    .main-content {
      flex-grow: 1;
      padding: 30px;
      background: #fff;
      overflow-y: auto;
    }

    h2 {
      margin-top: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    input[type="text"],
    select {
      padding: 8px;
      width: 100%;
      margin-bottom: 10px;
    }

    button,
    input[type="submit"] {
      background-color: #1e3a8a;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover,
    input[type="submit"]:hover {
      background-color: #3749ba;
    }

    .btn-secondary {
      background: #ccc;
      color: black;
    }

    .alert {
      margin-top: 15px;
      padding: 10px;
      background: #d1e7dd;
      color: #0f5132;
      border-left: 4px solid #0f5132;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar">
      <h1>JMC Dashboard</h1>
      <a href="{{ route('provinces.index') }}">📍 Provinsi</a>
      <a href="{{ route('regencies.index') }}">🏙️ Kabupaten</a>
      <a href="{{ route('regencies.index') }}">🤵 Populations</a>
      <a href="{{ route('report.province') }}">📊 Laporan Provinsi</a>
      <a href="{{ route('report.regency') }}">📈 Laporan Kabupaten</a>
    </div>

    <div class="main-content">
      @yield('content')
    </div>
  </div>
</body>

</html>