@extends('layouts.static-app')
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
@section('content')
<div class="container">
    <div class="col-md-12 row" id="meet">
      @if (!$show_time)
        <div class="col-md-12 not-available text-center">
          <h4>
            This Meet Up was scheduled for: <br />
             {{ $training_date }} at {{ $training_time }}
          </h4>
        </div>
      @endif
      @if (!$isDesktop)
        <div class="col-md-12 no-support text-center">
          <h4> Sorry, mobile devices not yet supported </h4>
        </div>
      @endif
    </div>
</div>
@endsection
@section('script')
@if ($isDesktop && $show_time)
<script src="{{ env('MEETAPP_URL') }}"></script>
<script>

window.onload = (evt) => {
  const domain = "{{ env('MEETAPP_DOMAIN') }}"
  const options = {
  roomName: "{{ $training->title }}",
  width: 1024,
  height: 590,
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
@endsection
