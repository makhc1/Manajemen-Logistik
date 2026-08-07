<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS - Warehouse Management System</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Chart.js for Arus Barang Mingguan -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- JsBarcode for barcode rendering -->
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

    <!-- FontAwesome icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="app-container">
    @include('components.sidebar')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('components.header')

        <!-- Content Area -->
        <main class="content-area">
            @yield('content')
        </main>
    </div>
</div>

@include('components.modals')

<!-- Custom Scripts -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
