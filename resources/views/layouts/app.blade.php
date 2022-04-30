<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Salle de Sports</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('sweetalert2/sweetalert2.min.css')}}">
    <script src="{{asset('sweetalert2/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style-plannings.css')}}">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/planning.js')}}"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <x-sidebar/>
        
        <!-- ========================= Main ==================== -->
        <div class="main">
            <x-header/>
            @yield('content')
        </div>
    </div>
    
    <!-- =========== Scripts =========  -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
@yield('scripts')
</body>

</html>
