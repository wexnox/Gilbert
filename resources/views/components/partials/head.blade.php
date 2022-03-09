<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keyword')">

<title>{{ isset($title) ?  config('app.name') . ' | ' . $title : ' '}}</title>

<!-- Fonts -->
@stack('fonts')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
@stack('stylesheet')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>