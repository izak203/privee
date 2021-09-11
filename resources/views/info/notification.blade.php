@if (count($errors) > 0)
      <div class="alert alert-danger">
      <strong>Whoops!</strong> On a constaté des problèmes..
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
 @endif

 @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif

@if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}        
        </div>
@endif

@if (session()->has('secondary'))
        <div class="alert alert-secondary">
            {{ session()->get('secondary') }}        
        </div>
@endif