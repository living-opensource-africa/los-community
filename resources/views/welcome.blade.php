@extends('layouts.static-app')
@section('content')
<body>
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="title m-b-md text-right">
                Living Open Source Commuity &nbsp;
            </div>
            <div class="col-md-12 row">
              <div class="col-md-3 card">
                <h3> Developers </h3>
                Working torwards building an open plaform where developers share
                ideas, plan out their journey and collaborate on open source
                projects.
                <br />
                <div class="text-center">
                  <i class="fa fa-code v-aid" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-md-3 card">
                <h3> Open Source Enthusiasts </h3>
                Building a place where Open Source Enthusiasts, and experts can
                come together to build game changing ideas into realities.
                <br />
                <div class="text-center">
                  <i class="fa fa-terminal v-aid" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-md-3 card">
                <h3> A Community of Tech Geeks </h3>
                Fostering the adoption of Open Source across the continent of
                Africa as a way of building sustainable economies in the
                information era.
                <br />
                <div class="text-center">
                  <i class="fa fa-users v-aid" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-md-3 card">
                <h3> Community Meetups </h3>
                Come build relationships with other tech nerds using our remote
                virtual meetup.
                We are closer by far, distance is only an illusion
                <br />
                <div class="text-center">
                  <i class="fa fa-globe v-aid" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <hr />
            <div class="col-md-12 row">
                <div class="col-md-12 row card">
                <div class="col-md-9">
                    <form action="{{ route('session.live') }}" method="POST">
                    <h3> Create/ Join a Quick Open Session </h3>
                    <div class="col">
                    @csrf()
                        <input type="text" name="name" class="form-control" placeholder="User Name" />
                        <br />
                        <input type="text" name="session" class="form-control" placeholder="Session (Meeting Name)" />
                        <br />
                        <input type="submit" class="btn btn primary">
                    </div>
                    </form>
                    <br />
                    <br />
                </div>
                <div class="col-md-3">
                    <h3> Made possible by INFRATEL </h3>
                    <p> (former, Zambia National Data Centre) </p>
                    <img src="{{ asset('images/LOS Powered by Infratel.PNG') }}" width="100%" />
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
