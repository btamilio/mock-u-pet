<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? "Mock-u-Pet" }}</title>
    
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
    


    <meta name="title" content="Mock-u-Pet" />
    <meta name="description" content="Mock-u-Pet" />
    <!-- <meta name="twitter:card" content="summary_large_image" />
    <meta name="og:title" content="" />
    <meta name="og:description" content="" />
    <meta name="og:image" content="/img/og_image.jpg" /> -->

    <link rel="icon" type="image/png" href="/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Mock--U-Pet" />
    <link rel="manifest" href="/img/favicon/site.webmanifest" />

@livewireStyles

</head>
<body>

<!-- outer container -->
<div class="container"> 

<header>
    <div class="position-relative">
        <div class="position-absolute top-0 start-50 translate-middle">
            <div class="row">
                <div class="col col-md-auto">
                    <img src="/img/paw.png" width="50" height="50" />
                </div>
                <div class="col col-md-auto text-nowrap">
                    <h1>Mock-u-Pet&trade;</h1>
                </div>
            </div>
  <!--          <div class="row">
                    <div class="col col-md-auto">logged in as {{ request()->user()->email }}</div>
            </div>
        -->
        </div>
</header>
 