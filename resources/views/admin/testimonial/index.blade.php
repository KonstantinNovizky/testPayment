@extends('admin.layouts.admin')

@section('title')
    Testimonial
@endsection

@section('underhead')

@endsection

@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if (Session::has('success'))
            <x-alert needDismiss>
                @slot('title')
                    Action performed:
                @endslot
                {{ session('success') }}
            </x-alert>
        @elseif(Session::has("failure"))
            <x-alert
                    type="danger"
                    needDismiss
            >
                @slot('title')
                    Failed Action!
                @endslot
                {{ session('failure') }}
            </x-alert>
        @endif
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Testimonial</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('sendMsg') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <textarea class="form-control py-4" id="messageContent" type="text" name="messageContent" placeholder="Enter message" rows="8" cols="80"></textarea>
                                @if ($errors->has('messageContent'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('messageContent') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group right">
                                <label for="fileAttachment">File</label>
                                <input type="file" id="fileAttachment" name="fileAttachment" required style="margin: 20px 0 20px 0">
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">
                                Send Message
                            </button>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('customjs')

@endsection
