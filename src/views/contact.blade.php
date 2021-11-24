@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success d-none" role="alert"></div>
            <div class="card">
                <div class="card-header">
                    <h1>Contact Us any time</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('contact')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">name</label>

                            <div class="col-md-6">

                                <input type="text" name="name" class="form-control name" required placeholder="Your Name Please">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                            <div class="col-md-6">

                                <input type="email" name="email" class="form-control email" required placeholder="Your Email Please">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">message</label>

                            <div class="col-md-6">

                                <textarea name="message" class="form-control message" cols="30" rows="10" required placeholder="Your Query"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ajax_contact_submit">
                                    submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

    $(document).ready(function(){
        $('form').submit(function(e){
            e.preventDefault();
            let data = {
                "name"      : $('.name').val(),
                "email"     : $('.email').val(),
                "message"   : $('.message').val(),
            };

            $.ajax({
                type: 'POST',
                url :"{{route('contact')}}",
                data :data,
                success: function(response){
                    $('.alert').text(response.message);
                    if(response.status == 'success'){
                        $('.alert').addClass("alert-success");
                        $('.alert').removeClass("d-none");

                    }
                    if(response.status == 'failed'){
                        $('.alert').addClass("alert-danger");
                        $('.alert').removeClass("d-none");
                    }
                }
            })

        });
    });
</script>
@endsection