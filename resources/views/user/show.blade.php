@extends('user.layout')
@section('content')
<div class="card">
  <div class="card-header">User Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $user->name }}</h5>
		<p class="card-text">E-Mail : {{ $user->email }}</p>
  </div>
      
    </hr>
  
  </div>
</div>