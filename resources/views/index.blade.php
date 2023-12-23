<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Project Test Suitmedia Frontend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    {{-- Navbar Header --}}
    @include('partials.navbar')

    {{-- Section Hero --}}
    <section class="hero">
        <div class="hero-text">
            <h1>Ideas</h2>
            <h4>Where all our great things begin</h4>
        </div>
        <div class="hero-image">
            <img src="{{asset('asset/bg.jpg')}}" alt="" style="width: 100%; height: 400px;">
        </div>
    </section>

    {{-- Card Contents --}}
    @include('partials.card-contents')

    {{-- Javascript --}}
    @include('partials.script')

</body>
</html>