<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <base href="/">
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/libs/ijabo/ijabo.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/libs/ijaboCropTool/ijaboCropTool.min.css') }}" rel="stylesheet"/>
    @stack('styleSheets')
    @livewireStyles
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>
  </head>
  <body >
    <div class="wrapper">
        @include('layouts.inc.pages-header')
      
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                @yield('PageTitleHeader')
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            @include('layouts.inc.pages-footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('dist/libs/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dist/libs/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('dist/libs/ijabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
    <script>
      window.addEventListener('showToastr', function(event){
        toastr.remove();
        if(event.detail.type === 'info'){
          toastr.info(event.detail.message);
        }else if(event.detail.type === 'success'){
          toastr.success(event.detail.message);
        }else if(event.detail.type === 'error'){
          toastr.error();(event.detail.message);
        }else if(event.detail.type === 'warning'){
          toastr.warning(event.detail.message);
        }else{
          return false;
        }
      });
    </script>
    <script type="text/javascript">
			function showPass(id, svgTag){
				var inputBox = document.getElementById(id);
				if(inputBox.type === "password"){
					inputBox.type = "text";
					document.getElementById(svgTag).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>';
				}else{
					inputBox.type = "password";
					document.getElementById(svgTag).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="3" x2="21" y2="21"></line><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path></svg>';
				}
			}
    </script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
  </body>
</html>