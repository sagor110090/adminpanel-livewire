<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}
</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">

<link rel="stylesheet" href="{{ asset('backend') }}/libs/prismjs/themes/prism.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/prismjs/plugins/line-numbers/prism-line-numbers.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/prismjs/plugins/toolbar/prism-toolbar.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/dropzone/dist/dropzone.css">
<link href="{{ asset('backend') }}/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">


<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/css/theme.min.css">
@livewireStyles
@stack('css')
</head>
<body>

<div id="db-wrapper">
    @if (!request()->is('admin*'))
    @yield('content')
    @else
    @include('layouts.parts.sidebar')
    <div id="page-content">
        @include('layouts.parts.nav')
        <!-- Container fluid -->
        <div class="bg-primary pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @endif
</div>
<script src="{{ asset('backend') }}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('backend') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ asset('backend') }}/libs/feather-icons/dist/feather.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/components/prism-core.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/components/prism-markup.min.js"></script>
<script src="{{ asset('backend') }}/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js"></script>
<script src="{{ asset('backend') }}/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset('backend') }}/libs/dropzone/dist/min/dropzone.min.js"></script>


<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>



<!-- Theme JS -->
<script src="{{ asset('backend') }}/js/theme.min.js"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"> </script>
<x-livewire-alert::scripts />
@include('sweetalert::alert')
@stack('js')
</body>

</html>
