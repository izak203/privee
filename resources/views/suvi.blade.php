Partie 1 installation du framework et l'auth 

Partie 2 Création des controller vues et routes de la plate forme, il reste le conctroller  

Partie 3 Création du profil enseignant? LE PROFIL enseignant EST CREE AVEC SUCCES

Partie 4 Création de categories son intégration effectué avec succès 

Partie 5 A faire Ajouter un premiums pour selectionner les enseignants EFFECTUE AVEC SUCCES 

Partie 6 Adapter  les controllers des modules et créer les models et les migrations pas fini 

Partie 7 Profil étudiant fait avec succès 

Partie 8 Création de AdminUserController effectué avec succès  

Partie 9 A revoir et completer cashier en totalité 

Partie 10 Integré un quizz box 

Patie 11 Organisation du travail à completer et completer les routes vues des quizzes

partie 12 Suppression automatique des devoirs et exercice après le rendu d'un mois j'ai laissé que 2 notes 
effectuée avec succès 

Partie 13 Reglage de l'étudiant,  cashier est fait avec succès 
Partie 14 Toutes les routes des notes des users fonctionnent avec succès 


MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=68f3bee5cc9e68
MAIL_PASSWORD=a20ec646e05dfa
MAIL_ENCRYPTION=tls 
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME=Example 


@section('js')
  <script>
      $('#chk').on('change', function(){
        alert('test');
      });
  </script>
@endsection 

$categories = MusicCategory::all();
foreach($categories as $category)
{
$category->delete();

}

public function foo(Request $request)
{
    $ids = $request->id;

    DB::table('tablename')->whereIn('id', $ids)
    ->update(['NIS' => 0]);
}