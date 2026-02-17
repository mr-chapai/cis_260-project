@php

    $isUserLogIn = true;

@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sticky Footer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Header -->
<header class="bg-dark text-white p-3">
    @include('partials.header')
</header>

<!-- Main Content -->
<main class="flex-fill container py-5">
    <!-- Content can be empty -->
    <p></p>
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center mt-auto">
    @include('partials.footer')
</footer>

</body>
</html>
