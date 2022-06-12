<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAravel</title>
</head>

<body>
    <div id="header">Laravel dersi</div>
    @include('layouts.sidebar')
    @yield('content')
    <!--  sürekli kullanacagımız alan her sayfada  -->

    <!-- <h1>orhan</h1> -->



</body>

</html>