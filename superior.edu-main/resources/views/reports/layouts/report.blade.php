<head>
    <style>  

    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        @page {
            margin: 0cm 0cm;
            font-family: 'Open sans';
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
            background-color: #0059b2;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #0059b2;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
<header>
    <h5><b>UNIVERSIDAD POLITÉCNICA
DE AMOZOC<b> <br>
CLAVE: 21MSU1202E</h5>
</header>

<div class="container py-4">
  @yield('contentReport')
</div>


<footer>
    <h1>Footer</h1>
</footer>
</body>
