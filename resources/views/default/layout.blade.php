<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            background: #f5ebc7;
        }
        nav.navbar {
            opacity: 0.95;
        }
        footer {
            background: #fdfaed;
            padding: 20px 0 10px;
        }
        footer .nav-link {
            font-weight: bold;
            color: black;
        }
        footer .nav-link:hover {
            color: black;
            text-decoration: underline;
        }
        .card-instruction .card-header {
            background: #f2695c;
            font-weight: bold;
            color: white;
        }
        .card-ingredients .card-header, .card-ingredients-header {
            background: #63a69a;
            font-weight: bold;
            color: white;
        }
        .content-container {
            background: #ebe1be;
            padding-top: 14px;
        }
    </style>
</head>
<body>
@include('default.navbar')
<div class="container content-container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('default.footer')
</body>
</html>