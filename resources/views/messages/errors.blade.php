@if($message = Session::get('error'))
    <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger text-md-left">
            {{ $error }}
        </div>
        <div class="w-100"></div>
    @endforeach
@endif