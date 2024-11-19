<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? "Mock-U-Pet" }}</title>
    
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), TRUE) ?? [];
        rsort($manifest);
    @endphp

    @production
        @foreach ($manifest as $item)
            @if (str($item["file"])->endsWith("css"))
        <link rel="stylesheet" href="/build/{{ $item["file"]  }}" />
            @elseif (str($item["file"])->endsWith("js"))    
        <script type="module" src="/build/{{ $item["file"] }}"></script>
            @endif
        @endforeach
    @else
        @vite([
            'resources/sass/app.scss',
            'resources/css/app.css',
            'resources/js/app.js'
        ])
    @endproduction
    


    <meta name="title" content="Mock-U-Pet" />
    <meta name="description" content="Mock-U-Pet" />
    <!-- <meta name="twitter:card" content="summary_large_image" />
    <meta name="og:title" content="" />
    <meta name="og:description" content="" />
    <meta name="og:image" content="/img/og_image.jpg" /> -->

    <link rel="icon" type="image/png" href="/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="TC" />
    <link rel="manifest" href="/img/favicon/site.webmanifest" />



</head>–
<body>

        <header>

                    <div class="nav-left">
                        <img src="/img/paw.png" alt="Mock-U-Pet Logo" width="40" height="40" /></div>
                         <div class="nav-center">
                       
            
                    </div>
 
 
        </header>
 