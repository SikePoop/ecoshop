@extends('user_template.layouts.template')
@section('main-content')
<section style="background-color: white;">
    <div class="row" style="margin: 30px">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <a class="tag" href="{{ route('userprofile') }}">Dashboard</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                  <a class="tag" href="{{ route('pendingorders') }}">Pending Orders</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <a class="tag" href="{{ route('history') }}">History</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <a class="tag" href="{{ route('showmessage') }}">Message</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <a class="tag" href="{{ route('logout') }}">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    <div class="col-lg-8">
        @yield('profilecontent')
    </div>
    </div>
</section>
@endsection