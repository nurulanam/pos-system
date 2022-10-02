<!DOCTYPE html>
<html lang="en">
@include('backend.includes.head')
<body class="sb-nav-fixed">
{{--top nav --}}
@include('backend.includes.topnav')
<div id="layoutSidenav">
    @include('backend.includes.sidenav')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('backend.includes.footer')
    </div>
</div>
@include('backend.includes.scripts')
</body>
</html>
