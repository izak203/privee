<!--<div class="card mb-3" style="max-width: 740px;">-->
  <div class="row no-gutters">
  @forelse($users as $user)
    <div class="col-md-4 mb-3">
    @if($user->image)
               <img src="{{ asset('image/users/' .$user->image) }}" alt="" width="100%" height="450">
                @else
                <img src="/images/users/default.png" alt=""/>
             @endif
    </div>
    <div class="col-md-8 mb-3" style="background-color:#5b34c7e8;">
      <div class="card-body">
        <h5 class="card-title" style="color:#fff;background-color:tomato;height:70px;line-height:70px;padding-left:20px;width:400px;border-radius:5px;">Enseignant(es): {{ $user->first_name }} - {{ $user->last_name }} </h5>
        <p class="card-text" style="color:#fff;">Pays Ville: {{ $user->country }} - {{ $user->city }}</p>
        <p class="card-text"  style="color:#fff;">Diplôme: {{ $user->diploma }}</p>
        <h3 style="color:#fff;">Expérience:</h3> <p class="card-text" style="color:#fff;">{{ Str::limit($user->experience, 490) }}</p>
        <p class="card-text  btn btn-danger">{{ $user->category->category_name }} {{ $user->maternel->maternel_name }} </p> <p class="card-text  btn btn-primary">Numéro Identification: {{ $user->numberunique }}.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    @empty
    <p>Aucun enseignant trouvé</p>
    @endforelse
  </div>
<!--</div>#6431f1e8;--> 