@extends('layouts.indexMaster')
@section('indexMaster.body')
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#google">Google Login</a></li>
        <li class="tab col s3"><a href="#ptc">PTC Login</a></li>
      </ul>
    </div>
    <div id="google" class="col s12">
      <div class="card-panel">
        <div class="row">
          <form class="col s12" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">Authentication Code</label>
              </div>
            </div>
            <input type="hidden" name="Factory" value="google" />
            <button class="waves-effect waves-light btn">Login</button>
          </form>
        </div>
      </div>
      <div class="card-panel">
        <div class="row">
          <form class="col s12" method="POST" id="G-Login">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" name="username" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <input type="hidden" name="Factory" value="google" />
            <button class="waves-effect waves-light btn">Login</button>
          </form>
        </div>
      </div>
    </div>
    <div id="ptc" class="col s12">
      <div class="card-panel">
        <div class="row">
          <form class="col s12" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" name="username" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <input type="hidden" name="Factory" value="ptc" />
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
