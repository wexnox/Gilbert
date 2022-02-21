<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head :title="$title ?? '' " />
</head>

    <body>

    <x-partials.login />

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

    </body>

</html>