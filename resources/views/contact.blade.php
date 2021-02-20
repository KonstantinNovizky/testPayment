@extends('layouts.main')

@section('title')
Contact Us
@endsection


@section('main')
<div class="container mt-5 pt-3">
    <div class="row mt-5 pt-5">
        {{-- align-items-baseline justify-content-center --}}
        {{-- style="min-height: 90vh" --}}
        <div class="col-10 mx-auto col-md-6">
            <h1 class="text-capitalize">contact form</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero
                excepturi, commodi eos sequi doloremque, veritatis ipsam dicta
                facere esse vero consequuntur voluptatem. Sint ut iure quibusdam
                unde eaque, delectus placeat?
            </p>
        </div>
        <div class="col-10 mx-auto col-md-6">
            <form
                action="{{ route('contact.us.action') }}"
                method="post"
            >
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                class="contact-input form-control form-control-lg rounded-0"
                                id="name"
                                name="name"
                            >
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="contact-input form-control form-control-lg rounded-0"
                                id="email"
                                name="email"
                            >
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input
                        type="text"
                        class="contact-input form-control form-control-lg rounded-0"
                        id="subject"
                        name="subject"
                    >
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea
                        type="email"
                        class="contact-input form-control form-control-lg rounded-0"
                        id="message"
                        name="message"
                    ></textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <button
                        class="contact-button btn btn-lg text-capitalize text-light"
                        style="
                            background-image: linear-gradient(45deg, #156073, #119ec1);
                            font-size: 1.2rem;
                            padding: 1rem 2.5rem;
                        "
                    >send
                        message</button>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
    </div>
</div>
@endsection