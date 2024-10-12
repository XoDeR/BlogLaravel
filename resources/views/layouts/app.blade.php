<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
      <li>
        <a class="p-3" href="/">Home</a>
      </li>
      <li>
        <a class="p-3" href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li>
        <a class="p-3" href="{{ route('posts') }}">Posts</a>
      </li>
    </ul>
    <ul class="flex items-center">
      @auth
      <li>
        <a class="p-3" href="">{{ Auth::user()->name }}</a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li>
        <a class="p-3" href="{{ route('login') }}">Login</a>
      </li>
      <li>
        <a class="p-3" href="{{ route('register') }}">Register</a>
      </li>
      @endguest
    </ul>
  </nav>
  @yield('content')
</body>

</html>