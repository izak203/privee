        <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->numberunique }}</td>
              <td><a href="{{ route('site.profil.bulletin.maternelle.showbulletinuser', $user->id) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">{{ $user->first_name }}</a></td>
              <td>{{ $user->last_name }}</td>
              @if($user->maternel)
              <td>{{ $user->maternel->maternel_name }}</td>
              @endif
              @if($user->category)
              <td>{{ $user->category->category_name }}</td>
              @endif
              @if($user->matiere)
              <td>{{ $user->matiere->matiere_name }}</td>
              @endif
              <td><a href="{{ route('site.profil.bulletin.maternelle.showbulletinuser', $user->id) }}" class="btn btn-primary">Ajouter notes</a></td>
          </tr>