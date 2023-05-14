@php
    $feedbacks = App\Models\feedback::latest()->get();
@endphp
@extends('admin.layouts.template')
@section('pagetitle')
Messages
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Feedback</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Message</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->user_id }}</td>
                            <td>{{ $message->message }}</td>
                            @foreach ($feedbacks as $feedback)
                            @if ($message->id == $feedback->feedback_id)
                            <td>{{ $feedback->message }}</td>
                            @if ($feedback->message != NULL)
                            {{-- <td><a class="btn btn-secondary" @disabled(true)>Answered</a></td> --}}
                            <td><a class="btn btn-primary" href="{{ route('editfeedback',$message->id) }}">edit</a></td>
                            @else
                            <td><a class="btn btn-primary" href="{{ route('getfeedback',$message->id) }}">Answer</a></td>
                            @endif                
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection