<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7dc068aa29.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <title>Gestão Comercial</title>

</head>
<body>
<div class="principal">
    <div class="class-sidebar">
        @component('components.sidebar')

        @endcomponent
    </div>
    <div class="class-content">
        <main class="main-content" role="main">

            @component('components.navbar')

            @endcomponent

            @hasSection ('body')
                @yield('body')

            @endif
        </main>
    </div>
</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>




@hasSection ('javascriptPagination')
    @yield('javascriptPagination')
@endif
@hasSection ('javascript')
    @yield('javascript')
@endif

@hasSection ('javascript1')
    @yield('javascript1')
@endif
@hasSection ('javascript2')
    @yield('javascript2')
@endif
@hasSection ('javascript3')
    @yield('javascript3')
@endif
@hasSection ('sweetalert')
    @yield('sweetalert')
@endif
</body>
</html>
