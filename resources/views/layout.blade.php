@include('includes.head')

<body>
    @include('includes.nav')
<div class="container-fluid">
    <div class="row">
        @include('includes.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            @yield('content')
        </main>
    </div>
</div>
</body>
@include('includes.footer')

