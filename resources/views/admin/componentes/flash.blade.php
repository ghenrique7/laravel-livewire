@if (session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

@endif

@if (session('danger'))
<div class="alert alert-danger" role="alert">
    {{ session('danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p> {{ $error }} </p>
        @endforeach
    </div>
@endif
