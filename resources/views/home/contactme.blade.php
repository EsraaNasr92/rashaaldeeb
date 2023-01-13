@extends('layouts.inner')

@section('title') {{ 'Contact Me' }} @endsection

@section('content')
    <!-- portfolio insted of gallery -->
    <section class="contact section-padding-buttom" id="contact">
        <div class="container">
            <div class="row">
                        
                <div class="col-lg-7 col-12 mx-auto">

                    <h2 class="mb-4 text-center" data-aos="fade-up">Write to Me</h2>

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                    <form action="{{ route('contact.me.store') }}" id="contactUSForm" method="post" class="contact-form" role="form">
                        {{ csrf_field() }}

                        <div class="row">
                                    
                            <div class="col-lg-6 col-6">
                                <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="col-lg-6 col-6">
                                <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="col-12 my-4">
                                <label for="message" class="form-label">How can we help?</label>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tell Me about the project" required>{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif      
                            </div>


                        <div class="col-lg-5 col-12 mx-auto mt-5">
                            <button type="submit" class="form-control" class="g-recaptcha" 
                            data-sitekey="reCAPTCHA_site_key" 
                            data-callback='onSubmit' 
                            data-action='submit'>Send Message</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section><!-- /End contact Me section-->
@endsection