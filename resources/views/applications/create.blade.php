@extends('layouts.application.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="login-wrap">
                    <h1 class="display-4">Job offer</h1>

                    <div class="ui divider"></div>

                    <form class="ui large {{ $errors->any() ? 'error' : ''  }} form" action="{{ url('application') }}" method="POST" enctype="multipart/form-data">

                        <!-- name -->
                        <div class="{{ $errors->has('name') ? 'error' : '' }} field">
                            <label>Your Name</label>
                            <div class="ui left icon input">
                                <input type="text" name="name" placeholder="example: John Doe">
                                <i class="user icon"></i>
                            </div>
                        </div>

                        <!-- file -->
                        <div class="{{ $errors->has('file') ? 'error' : '' }} field">
                            <label>Your CV</label>
                            <div class="ui left icon input">
                                <input type="file" name="file">
                                <i class="file icon"></i>
                            </div>
                        </div>

                        <!-- email -->
                        <div class="{{ $errors->has('email') ? 'error' : '' }} field">
                            <label>Your Email Address</label>
                            <div class="ui left icon input">
                                <input type="text" name="email" placeholder="example: example@office.com">
                                <i class="envelope icon"></i>
                            </div>
                        </div>

                        <!-- message -->
                        <div class="field">
                            <label>Your Message</label>
                            <div class="ui left icon input">
                                <textarea name="message" rows="6" placeholder="example: I'd like to say &quot;Hello World&quot;"></textarea>
                                <i class="comment alternate icon"></i>
                            </div>
                        </div>

                        <!-- csrf -->
                        @csrf

                        <!-- submit -->
                        <div class="field">
                            <button class="ui fluid large primary button" type="submit">Submit your CV</button>
                        </div>

                        @if($errors->any())
                            <div class="ui error message">
                                <div class="header">
                                    There were some errors with your submission
                                </div>
                                <ul class="list">
                                    @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
