@extends('layouts.admin')

@section('content')
  <div class="content-header">
    <span class="content-header-bar"></span>
    <div class="content-title">{{{ $title }}}</div>
  </div>
  <div class="content-body">
    <div class="inner">
      <div>
        <strong>From: </strong>{{ $message->name }}
      </div>
      <div>
        <strong>Email Address: </strong>{{ $message->email }}
      </div>
      <div>
        <strong>Website: </strong>{{ $message->url }}
      </div>
      <div>
        <strong>Date Sent: </strong>{{ $message->created_at }}
      </div>
      <div>
        <strong>Message: </strong>
        <div>
          {{ $message->message }}
        </div>
      </div>
    </div>
  </div>
@stop
