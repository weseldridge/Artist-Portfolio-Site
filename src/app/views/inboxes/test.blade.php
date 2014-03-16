@extends('layouts.admin')

@section('content')
  <div class="content-header">
    <span class="content-header-bar"></span>
    <div class="content-title">{{{ $title }}}</div>
  </div>
  <div class="content-body">
    <div class="inner">
      {{ Form::open(array('url'=>'email/add', 'class'=>'pure-form pure-form-aligned', 'role'=>'form')) }}

      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      {{ Form::token() }}
      <div class="pure-group">
        {{ Form::text('name', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Your Name')) }}
        {{ Form::text('email', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Email')) }}
        {{ Form::text('url', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Web Site')) }}
        {{ Form::text('topic', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Subject')) }}
        <textarea name="message" class="pure-input-1-2">Your Message</textarea>
      </div>

      <span class="room">
        <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Send Test Message</button>
      </span>
      {{ Form::close() }}
    </div>
  </div>
@stop
