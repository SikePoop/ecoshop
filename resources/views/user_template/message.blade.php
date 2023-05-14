@php
    $feedbacks = App\Models\Feedback::latest()->get();
@endphp
@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
Pending Orders
@if (session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif

<table class="table">
    <tr>
        <th>#</th>
        <th>Message</th>
        <th>Feedback</th>
    </tr>
    @foreach ($messages as $message)
        <tr>
            <td>
                {{ $message->id }}
            </td>
            <td>
                {{ $message->message }}
            </td>
            @foreach ($feedbacks as $feedback)
            @if ($message->id==$feedback->feedback_id)
            <td>
                {{ $feedback->message }}
            </td>
            @endif
            @endforeach      
        </tr>
    @endforeach
</table>
@endsection