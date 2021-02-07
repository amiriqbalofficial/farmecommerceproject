{{-- navbar start --}}
@include('include.navbar')
{{-- navbar ended here --}}

{{-- Content started --}}
@yield('content')
{{-- Content ended --}}

@include('include.footer')

  {{-- script start --}}
   @yield('script')
  {{-- Script end --}}