<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  @yield('css')
</head>

    
<body>
  <div class="app">
    <header class="header">
      <h1 class="header__heading"><a href="/products">mogitate</a></h1>
      @yield('link')
   
   
   
    </header>
    <main>

    <div class="content">
      @yield('content')


    </div>
    






    </main>
  </div>
</body>

</html>