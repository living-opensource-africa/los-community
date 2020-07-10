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
    @php
    $now = \carbon\Carbon::now('Africa/Lusaka');
    $training_date_time = $training->date_time;
    $training_date = explode(' ', $training_date_time)[0];
    $training_time = explode(' ', $training_date_time)[1];
    $date_now = $now->format('Y-m-d');
    $time_now = $now->format('H:i');

    // Boolean to either allow or deny room entry
    $show_time = false;

    if ($training_date == $date_now &&
        $training_time <= $time_now) {
            $show_time = true;
    }
    else {
        $show_time = false;
    }
@endphp
<div id="meet">
  <div class="container">
    <!--// <div class="col-md-12 row" id="meet"> //-->
      @if (!$show_time)
        <div class="col-md-12 text-center">
          <h1> Meeting Not Yet Started </h1>
          <br />
          <h2>
          {{ $training->title }}
          </h2>
          <h4>
          Session scheduled for {{ $training_date }}
          at {{ $training_time }}
          </h4>
          <p>
          {{ $training->description }}
          </p>
        </div>
      @endif
      @if (!$isDesktop)
      <div class="col-md-12 text-center">
          <h4> Please use the mobile app to join this meeting (Android Only)</h4>
          <br />
          <a href="{{ env('ANDROID_APP') }}">
              <button class="btn btn-primary">Download App</button>
          </a>
          <br />
          <p>
          Open the mobile app, then use "{{ $training->title }}" as the room name.
          </p>
          <br />
        </div>
      @endif
    <!--// </div> //-->
</div>
@if ($isDesktop && $show_time)
<script src="{{ env('MEETAPP_URL') }}"></script>
<script>
  window.onload = (evt) => {
    const displaySize = document.querySelector("body")
    const domain = "{{ env('MEETAPP_DOMAIN') }}"
    const options = {
    roomName: "{{ $training->title }}",
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
    vidApi.executeCommand('displayName', '{{ Auth::user()->name }}')
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
