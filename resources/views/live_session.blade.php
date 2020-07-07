<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/LOSAfrica.png') }}" />

    <title>{{ config('app.name', 'Living Open Source Community') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/los.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-5.13.0-web/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
<div id="meet">
  <div class="container">
    <!--// <div class="col-md-12 row" id="meet"> //-->
      @if (!$isDesktop)
        <div class="col-md-12 text-center">
          <h4> Please use the mobile app to join this meeting (Android Only)</h4>
          <br />
          <a href="{{ env('ANDROID_APP') }}">
              <button class="btn btn-primary">Download App</button>
          </a>
          <br />
          <br />
          <h4> Enter "{{ $session }}" in the room section to join this session</h4>
        </div>
      @endif
    <!--// </div> //-->
</div>
@if ($isDesktop)
<script src="{{ env('MEETAPP_URL') }}"></script>
<script>
  window.onload = (evt) => {
    const displaySize = document.querySelector("body")
    const domain = "{{ env('MEETAPP_DOMAIN') }}"
    const options = {
    roomName: "{{ $session }}",
    width: displaySize.clientWidth - 15,
    height: window.innerHeight,
    parentNode: document.querySelector('#meet'),
    interfaceConfigOverwrite: {
        SHOW_JITSI_WATERMARK: false,
        APP_NAME: "{{ env('APP_NAME') }}",
        NATIVE_APP_NAME: "{{ env('APP_NAME') }}",
        PROVIDER_NAME: "{{ env('APP_PROVIDER') }}"
        }
    }

    const vidApi = new JitsiMeetExternalAPI(domain, options)
    vidApi.executeCommand('toggleAudio', [])
    vidApi.executeCommand('toggleVideo', [])
    vidApi.executeCommand('displayName', '{{ $username }}')
    vidApi.on('readyToClose', (evt) => {
      window.history.back()
      })
    }
    </script>
    @endif
    </div>
    <script src="{{ asset('fontawesome-5.13.0-web/js/all.min.js') }}" defer></script>
  </body>
</html>
