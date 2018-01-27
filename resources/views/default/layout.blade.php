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
            background: #d8685e;
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
        .recipe-list-item {
            margin-bottom: 16px;
        }
        .title-image {

        }
        .title-image img{

        }
        .title-image h5{
            position: relative !important;
            display: inline !important;
            line-height: 1.2 !important;
            background: #fc0 !important;
            color: #000 !important;
        }
        .card {
            border: 1px solid #e1d1a1;
        }
        .menu-chessboard {
            text-align: center;
            font-size: 12px;
        }
        .menu-chessboard a{
            color: white;
            font-weight: bold;
            padding: 16px 0;
            line-height: 26px;
        }
        .menu-chessboard img{
            width: 40%;
        }
        .menu-chessboard a:nth-child(odd){
            background-color: #656d31;
        }
        .menu-chessboard a:nth-child(even){
            background-color: #ccba7e;
        }
        .menu-chessboard a:hover{
            text-decoration: none;
            opacity: 0.7;
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