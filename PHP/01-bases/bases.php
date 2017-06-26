<style>
  h2{
    margin: 0;
    font-size: 15px;
    color: red;
  }
</style>

<?php
//-------------------------------
echo '<h2>Les balises PHP</h2>';
//-------------------------------
?>
<?php
// pour ouvrir un passage en PHP, on utilise la balise précédente.
// et pour fermer un passage en PHP on utilise la balise suivant
?>

<strong>Bonjour</strong> <!-- en dehors des balises ouvertures et fermetures du PHP nous pouvons ecrire du HTML . Notez que vous ne pouvez pas mettre du PHP dans un fichier HTML.-->

<?php
// Vous n'etes pas obligé de fermer un passage PHP en fin de script.

// Notez que en PHP toutes les instructions se termine par un ";"

// ---------------------------------------------------------
echo '<h2>Ecriture et affichage</h2>';
// ---------------------------------------------------------

echo 'Bonjour'; // echo est une instruction qui permet d'effectuer un affichage dans le navigateur

echo '<br>'; // on peut mettre du HTML entre les quotes qui suivent echo

print 'Nous sommes mardi'; // print fait la meme chose que echo

// il existe d'autres instructions d'affichage que nous verrons plus loin :
// print_r();
// var_dump();

//CECI pour faire un commentaire sur une ligne

/*
CECI pour faire un commentaire sur plusieurs lignes
*/

//-------------------------------
echo '<h2>Variables : types / déclaration / affectation </h2>';
//-------------------------------

// Définition : une variable est un espace mémoire nommé permettant  de conserver une valeur.

// On déclare une variable avec le signe $ en PHP.

$a = 127; // je déclare la variable appelée 'a' et lui affecte la valeur 127

echo gettype($a); // $a est de type  integer (entier)

echo '<br>';

$b = 1.5;

echo gettype ($b);  // $b est de type double (nombre décimal)

echo '<br>';

$a = 'une chaine';

echo gettype ($a); // $a est de type string

echo '<br>';

$b = '127';

echo gettype($b); // $b est de type string car le nombre est entre quotes

echo '<br>';

$a = true;
echo gettype ($a); // $a est de type booléen
$b = FALSE;        // $b est de type booléen ( on peut écrire true et false en majuscules comme en minuscules)

//-------------------------------
echo '<h2>Concaténation</h2>';
//-------------------------------

$x = 'bonjour ';
$y = 'tout le monde';

echo $x . $y .'<br>'; // on concatène les valeurs de $x et de $y suivies d'une balise <br>

// Concaténation lors de l'affectation  :
$prenom1 = 'Bruno'; // Affecte la valeur Bruno à $prenom1
$prenom1 = 'Claire';

echo $prenom1 . '<br>'; // affiche Claire car elle a remplacé ma valeur Bruno dans la variable $prenom1

$prenom2 = 'Bruno';
$prenom2 .= 'Claire'; // on affecte la valeur Claire à la suite de la valeur Bruno : on obtient ainsi le string 'BrunoClaire'
echo $prenom2 . '<br>';

//-------------------------------
echo '<h2>Guillemets et quotes</h2>';
//-------------------------------

$message = "aujourd'hui"; // ou bien :
$message = 'aujourd\'hui'; // on echappe les apostrophes quand on est dans des quotes avec l'anti-slash


$txt = 'bonjour';
echo '$txt tout le monde <br>'; // ici on affiche $txt littéralement
echo "$txt tout le monde <br>"; // ici la variable ets évaluée, c'est son contenue qui est affiché : 'Bonjour tout le monde'

//-------------------------------
echo '<h2>Les Constantes</h2>';
//-------------------------------

// Définition : une constante est un espace mémoire nommé qui contient une valeur, mais celle ci n'est pas modifiable : on ne peut donc pas la modifier lors de l'éxécution du script.
define('CAPITALE', 'Paris'); // je déclare la constante CAPITALE et lui affecte la valeur Paris. Par convention , on écrit les constantes en MAJUSCULES.

echo CAPITALE . '<br>'; // Paris

// ------------------------------
// Exercice : afficher  Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables.

$a = 'Bleu-';
$b = 'Blanc-';
$c = 'Rouge';

echo $a . $b . $c;

//-------------------------------
echo '<h2>Les Opérateurs arithmétiques</h2>';
//-------------------------------

$a = 10;
$b = 2;

echo ($a + $b) . '<br>'; // addition affiche 12
echo ($a - $b) . '<br>';
echo ($a * $b) . '<br>';
echo ($a / $b) . '<br>';
echo ($a % $b) . '<br>'; // modulo, affiche 0 (reste de la division entière). Utile pour déterùiner si un nombre est pair ou impair grâce au modulo 2

// -----

$a = 10;
$b = 2;

$a += $b;    // équivaut à $a = $a + $b
$a -= $b;    // sa vaut 10
$a *= $b;    // sa vaut 20
$a /= $b;    // sa vaut 10
$a %= $b;   // sa vaut 0 (10%2)

// Incrémenter et décrémenter :
$i = 0;
$i++; // incrémentation = ajoute +1
$i--; // décrémentation = soustrait -1

//-------------------------------
echo '<h2>Les structures conditionnelles</h2>';
//-------------------------------

$a = 10; $b = 5; $c = 2;

if ($a > $b){
    // si la condition est true on éxécute les accolades qui suivent
    print '$a est supérieur à $b <br>';
} else {
    // si la condition est false on éxecute le else
    print 'Non, c\'est $b qui est supérieur à $a <br>';
};

// --------

if ($a > $b && $b > $c) { // la double esperluette pour AND : si les deux conditions sont vraies on entre dans les accolades qui suivent
print 'OK pour les deux condition <br>';
}else {
    print 'nous sommes dans le else <br>';
}

// ----------------
if ($a == 9 || $b > $c) {
    // si
    print 'une des deux conditions est vraie <br>';
} else {
    //
    print ' nous sommes dans le else <br>';
}

// ----------------
$a = 10; $b = 5; $c = 2;
if ($a == 8){
    // si $a est égale à 8
    echo 'reponse 1 <br>';
}elseif ($a != 10){
    // sinon si $a est différent de 10 :
    echo 'reponse 2 <br>';
} else {
    // sinon, si les 2 conditions précédentes sont fausses :
    echo 'reponse 3 <br>';
}

// Attention, un else n'est jamais suivi d'une condition ( sinon utiliser elseif)

// -------------------------
// Forme contractée dite ternaire : 2 ème possibilité d'écrire le if/else :
echo ($a == 10) ? '$a égale à 10 <br>' : '$a est différent de 10 <br>';
$resultat = ($a == 10) ? '$a égale à 10 <br>' : '$a est différent de 10 <br>';

// Le '?' remplace le if  et le ':' remplace le else. si la condition avant le '?' est vraie on exécute l'instruction avant le ':', sinon l'instruction après le ':'

//--------------
// Comparaison  == OU ===
$vara = 1;
$varb = '1';
if ($vara == $varb) echo '$vara est égale à $varb en valeur <br>';
if ($vara === $varb) echo '$vara est égale à $varb en valeur et en type <br>'; // ici les deux variables sont de types différents, donc le === renvoie false

/* Synthese :
    = est un signe d'affectation
    == est un signe de comparaison
    === est un signe de comparaison en valeur et en type ( strictement égal)
*/

// -------------------
// isset et empty :
// empty () = teste si le contenu des parenthèse est vide : '',0,NULL, false ou non défini
// isset () = teste si c'est défini ET a une valeur non NULL

$var1 = 0;
$var2 = ' '; // string vide

if (empty($var1)) echo '0, vide, NULL , false ou non défini <br>';

if (isset($var2)) echo '$var2 existe et est non NULL  <br>';

// différence entre isset et empty  : si on met en commentaire les lignes 231 et 232, empty renvoie TRUE car $var1 n'est plus définie, et isset renvoi FALSE car $ver2 n'est pas définie.



//-------------------------------
echo '<h2>Condition Switch</h2>';
//-------------------------------

$couleur = 'jaune';

switch($couleur){
    case 'bleu' : echo 'Vous aimez le bleu'; break;
    case 'rouge' : echo 'Vous aimez le rouge'; break;
    case 'vert' : echo 'Vous aimez le vert'; break;
    default : echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}

// Le switch compare la valeur de ce qui est entre parenthèse aux différents case. On éxécute les instructions du case dans lequel on tombe. Le break signifie sortir de la condition et continuer le script.

// Si aucun des case ne correspond, on tombe alors dans le default (équivalent du else)

//----------------------
// EXERCICE : réécrire ce switch avec des conditions if/else classiques.

if ($couleur == 'bleu'){
    echo 'Vous aimez le bleu';
} elseif ($couleur == 'rouge'){
    echo 'Vous aimez le rouge';
}elseif ($couleur == 'vert'){
    echo 'Vous aimez le vert';
} else {
    echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}

//-------------------------------
echo '<h2>Fonctions prédéfinies</h2>';
//-------------------------------
// Définition : une fonction prédéfinie permet de réaliser un traitement spécifique prévu dans le langage PHP.

//-------------
$email1 = 'prenom@site.fr';
echo strpos ($email1, '@'); // nous renvoie la position 6 du caractère '@' dans la chaine contenue dans $email1.

echo '<br>';

$email2 = 'bonjour';
echo strpos($email2,'@');

var_dump(strpos($email2, '@')); // grace à var_dump on apercoit le false retourné par la fonction strpos quand elle ne trouve pas l'@ dans $email2. var_dump est donc une fonction d'affichage améliorée que l'on utilise en phase de développement.
// Quand on utilise une fonction prédéfinie, il faut s'interroger sur les arguments à lui donner, et sur ce qu'elle retourne :

/* strpos retourne :
    succès : un integer qui représenta la position du caractère recherché
    échec : booléen FALSE
*/
echo '<br>';

//--------
$phrase ='mettez une phrase ici à cette endroit';
echo strlen($phrase); //affiche la longueur de $phrase. ICI 35.

/* strlen () retourne :
        succes : integer
        echec : un booleen false
*/

// --------------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

echo substr($texte, 0, 40) . '...<a href=""> lire la suite </a>';  // ceci retourne une partie de teste, avec un lien pour lire la suite
/* substr () retourne :
      succes : string
      Echec : un booleen false
*/

echo '<br>';
echo str_replace('site', 'gmail', $email1); // remplace le string 1 par le string 2 dans le string 3. Met gmail a la place de 'site'.
echo '<br>';

//---------------
$message = ' HELLO wORLD  ';
echo strtolower($message) . '<br>'; // affiche tout en minuscules
echo strtoupper($message) . '<br>'; // affiche tout en MAJUSCULES

echo strlen($message) . '<br>'; // affiche 19 avec les espaces
echo strlen(trim($message)) . '<br>'; // il affiche la longueur sans les espaces
echo '<br>';

//-----------------------
$message = '<h1> HELLO WORLD </h1> <p> how are you? </p>';
echo strip_tags($message); // affiche le message sans les balises HTML.(utilise dans un contexte de sécurité)

//-------------------------------
echo '<h2>Le manuel PHP </h2>';
//-------------------------------

// ressource en ligne :http://php.net/manual/fr/function.substr.php

//-------------------------------
echo '<h2>Les fonctions utilisateurs </h2>';
//-------------------------------

// Les fonctions qui ne sont pas prédéfinies dans le language, sont déclarées puis éxécutées par le developpeur

// déclaration d'une fonction :
function separation (){
  echo '<hr>';
}// fonction sans paramètre, les paramètre, les parenthèses sont donc vides ( mais obligatoires)

// Appel de la fonction
separation(); // on éxécute une fonction en l'appelant par son nom suivi de parenthèses

//----------------------
// Les fonctions avec paramètres :
// Les paramètres d'une fonction sont destinés à recevoir une valeur qui permet de compléter ou de modifier le comportement de la fonction.
function bonjour($qui){ // $qui  est un paramètre : il recoit la valeur de l'argument qui est donné lors de l'appel de la fonction
  return 'Bonjour ' . $qui . '<br>';
  echo 'ce code ne sera jamais executé...'; // return nous fait quitter la fonction : ce code n'est donc pas exécuté
}
echo bonjour ('Pierre'); // si une fonction attend un argument, il faut le lui passer
$prenom = 'John';
echo bonjour($prenom); // l'argument peut etre une variable

// ------------------
function appliqueTVA($nombre){
  return $nombre * 1.2;
}
// Exercice : à partir de cette fonction, écrivez une fonction appliqueTVA2 qui calcule un nombre multiplié par n'importe  quel taux donné à la fonction
function appliqueTVA2 ($nombre,$taux = 1.1){
  return $nombre * $taux;
}
echo appliqueTVA2 (100,3);
echo '<br>';
echo appliqueTVA2(100); // on peut spécifier une valeur par défaut à un paramètre dans les parenthèses lors de la déclaration de la fonction (ici $taux = 1.1). Dans ce cas, si la valeur n'est pas passée lors de l'appel, le paramètre prend cette valeur par défaut.

//-------------------
// exercice :

function meteo($saison, $temperature){
  echo "nous sommes en $saison et il fait $temperature degrés <br>";
}

meteo('hiver',2);
meteo('printemps',1);

// au sein d'une nouvelle fonction exometeo(), afficher l'article "au" pour le printemps ("au printemps"), et "en" pour les autres saison.

function meteo2($saison, $temperature){
  if ($saison === 'printemps') {
    $change = 'au';
  } else {
    $change = 'en';
  }
  if ($temperature <= 1 && $temperature >= -1 ) {
    $change2 = 'degré';
  } else {
    $change2 = 'degrés';
  }
  echo "Nous sommes $change $saison et il fait $temperature $change2 <br>";
}

//----------------------------------
// Variables locales et globales

function jourSemaine(){
  $jour = 'mercredi'; // variables locale
  return $jour; // retourne la valeur de $jour a l'exterieur de la fonction.
}

// echo $jour; // erreur, car on utilise une variable locale a la fonction jourSemaine dans l'espace global
echo jourSemaine() . '<br>'; // on recupere la valeur retourné par le return de la fonction.

//--------------------------------------
$pays = 'france'; // variable globales

function affichagePays(){
  global $pays; // le mot clé global permet d'utiliser une variable déclaré dans l'espace global au sein de la fonction.
  echo $pays; // on peut utiliser $pays grace au global ci-dessus.
}

 affichagePays();

 //-----------------------------------------------------
 echo '<h2> Les structures itératives : boucles </h2>';
 //-----------------------------------------------------
// boucle while
$i = 0; // valeur de départ


while($i < 3){ // tant que $i est inférieur a 3, j'entre dans la boucle
  echo "$i---";
  $i++; // ne pas oblier l'incrémentation pour ne pas avoir une boucle infinie
}

// --------------------
// Exercice : à l'aide d'une boucle while, afficher dans un sélecteur les années de 1917 à 2017

echo '<select>';
    echo '<option>1</option>';
    echo '<option>2</option>';
    echo '<option>3</option>';
echo '</select>';

$annee = 1917;
echo '<select>';
while($annee <= 2017){
global $annee;
  echo "<option> $annee </option>";

  $annee++;
}
echo '</select>';

//-----------------------------------------------------
// Boucle for :
echo '<br>';
for($j = 0; $j < 16; $j++){
  print $j . '<br>';
}

// exercice : affichez dans un sélecteur les nombres de 1 à 30 avec une boucle for
echo '<select>';
for($jour = 1; $jour <= 30; $jour++){
  print "<option> $jour </option>";
}
echo '</select>';

echo '<br>';

// exercice : afficher lers chiffres de 0 à 9 sur la même ligne dans une table HTML
echo '<table border ="1">';
echo '<tr>';
for($chiffre = 0; $chiffre <= 9; $chiffre++){
   echo "<td>$chiffre</td>" ;
}
echo '</tr>';
echo '</table>';

//-----------------------------------------------------
// Boucle do while :
// La boucle do while à la particularité de s'éxécuter au moins UNE fois, puis ensuite tant que la condition de fin est vraie.
$meteo = 'beau';
do {
  echo 'Je m\'affiche au 1er tour de boucle';
} while($meteo != 'beau'); // la condition est fausse et pourtant la boucle a bien fait un tour

echo '<hr>';
//------------
$i = 0;
do{
  echo ' je suis au tour de boucle n° ' . $i .' <br>';
  $i++;
}while($i < 3);


//-----------------------------------------------------
echo '<h2> Les tableaux de données : arrays </h2>';
//-----------------------------------------------------

// Un tableau se déclare un peu comme une variable dans laquelle on peut stocker un ensemble de valeurs. Ces valeurs peuvent etre de n'importe quel type.
// Déclaration d'un array :
$liste = array('gregoire','nathalie','emilie','francois','georges');
// echo $liste; ( ERREUR car on ne peut pas afficher directement un array)

// pour afficher rapidement en phase de développement le contenu d'un array :
echo '<pre>'; var_dump($liste); echo '</pre>';// affiche le contenu et le style de variable.
echo '<pre>'; print_r($liste); echo '</pre>';// affiche le numero des elements dans le tableau

// autre manière d'affecter des valeurs à un Array :
$tab[] = 'France'; // les crochets vides permetttent d'ajouter la valeur 'France' au premier indice disponible, ici à indice 0
$tab[] = 'Italie'; //
$tab[] = 'Suisse';
$tab[] = 'Portugal';
echo '<pre>'; print_r($tab); echo '</pre>';

// Pour accéder à l'élément 'Italie' de l'array $tab :
echo $tab[1]; // on précise l'indice de l'élément entre crochet après le nom du tableau

//-----------------------------------------------------
// tableau associatif :
$couleur = array('j' => 'jaune', 'b' => 'bleu', 'v' => 'vert'); // on peut choisir le nom des indices , il s'agit alors d'un array associatif

// pour acceder a un element du tableau associatif :
echo 'la seconde couleur de notre tableau est le ' . $couleur['b']; // affiche bleu.
echo "la seconde couleur de notre tableau est le $couleur[b]"; // ceci affiche bleu aussi mais un array ecrit dans des guillemets perd les quotes autour de son indice.

//-----------------
echo '<br>';
// quelques fonctions prédéfinies sur les arrays :
echo 'taille du tableau : ' . count($couleur) . '<br>'; // compte le nombres d'éléments dans le tableau, ici 3.
echo 'Taille du tableau : ' . sizeof($couleur) . '<br>'; // fait exactement la meme chose que count

$chaine = implode('-',$couleur); // fonction prédéfinie qui rassemble les éléments d'un array en une chaine, séparés par le séparateur indiqué
echo $chaine . '<br>'; // $chaine est un string contenant les valeurs de l'array

$couleur2 = explode('-',$chaine); // fonction prédéfinie qui transforme une chaine contenant un séparateur comme le "-" en un tableau
var_dump($couleur2); //$couleur2 est bien un array

//-----------------------------------------------------
echo '<h2> Boucle foreach </h2>';
//-----------------------------------------------------
// La boucle foreach permet de parcourir un array ou un objet de manière automatique

foreach($tab as $valeur){ // parcourt l'array de $tab par ses valeurs. $valeur prend successivement à chaque tour de boucle les valeurs contenues dans $tab
  echo $valeur . '<br>';
}

//---
// Pour parcourir les indices ET les valeurs :
foreach($tab as $indice => $valeur){ // quand il y a 2 variables, 1ere parcourt la colonne des indices et la seconde la colonne des valeurs
  echo "$indice . 'correspond à ' . $valeur . '<br>'" ;
}

// Exercice : écrire un array avec les indices prenom, nom, email et téléphone, et y associer des valeurs. Puis vous affichez avec une boucle foreach les indices et les valeurs dans des <p>, sauf pour le prenom qui doit etre dans un <h1>
$contact = array('prenom' => 'Teva', 'nom' => 'NATCHITZ', 'email' => 'teva@hotmail.fr', 'telephone' => '0611223344');
foreach($contact as $indices => $valeurs){
  if($indices == 'prenom'){
  echo "<h1> $indices = $valeurs </h1>";

}else {
  echo "<p> $indices = $valeurs </p>";
}}

//-----------------------------------------------------
echo '<h2> Tableaux multidimensionnels </h2>';
//-----------------------------------------------------
// Nous parlons de tableaux multidimensionnels quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
              0=> array ('prenom' => 'Julien', 'nom'=>'Dupon', 'tel'=> '0600000000'),
              1=> array ('prenom' => 'Nicolas', 'nom'=>'Duran', 'tel'=> '0600000000'),
              2=> array ('prenom' => 'Pierre', 'nom'=>'Duchemol')
            );

echo  '<pre>'; print_r($tab_multi); echo '</pre>';
// Pour accéder à la valeur 'Julien' :
echo $tab_multi[0]['prenom'] . '<br>'; // nous entrons dans $tab_multi à l'indice 0 pour aller ensuite à l'indice 'prenom'
echo '<hr>';

// Parcourir le tableau multidimensionnel avec une boucle for :
for($i = 0; $i < count ($tab_multi); $i++){
  echo $tab_multi[$i]['prenom'] . '<br>';
}; echo '<hr>';

// Exercice : afficher les prénoms de $tab_multi avec une boucle foreach

foreach($tab_multi as $indices => $valeurs){
  echo $tab_multi[$indices]['prenom'] . '<br>';

}echo '<hr>';

//-----------------------------------------------------
echo '<h2> Inclusion de fichiers </h2>';
//-----------------------------------------------------

echo 'premiere inclusion : ';
include('exemple.inc.php'); // apres include on precise le chemin du fichier a inclure.

echo '<br>Deuxieme inclusion : ';
include_once('exemple.inc.php'); // le once verifie si le fichier a deja été inclus et ne le ré-inclus pas si il y est deja .

echo '<br>Troisieme inclusion : ';
require('exemple.inc.php');

echo '<br>quatrieme inclusion : ';
require_once('exemple.inc.php'); // avec once on verifie dabord que le fichier n'est pas deja inclus .

/*
Difference entre include et require
Elle apparait uniquement si on ne parvient pas a inclure le fichier demandé :
-include : genere une erreur de type warning et continue l'execution du script
-require : genere une erreur de type fatal error et stop l'exécution du script

Notez que le .inc dans le nom du fichier est la a titre indicatif , precisant au developpeur qu'il sagit d'un fichier d'inclusion et non pas d'une page a part entiere.

*/

//-----------------------------------------------------
echo '<h2> Gestion des dates </h2>';
//-----------------------------------------------------
// la fonction prédéfinie date() renvoie la date du jour selon le format spécifié :
echo date('d/m/Y H:i:s') . '<br>'; // affiche la date au format jour,mois,années ainsi que heures,minutes,secondes.

echo date('Y-m-d'); // affiche la date au format années-mois-jour. Notez que l'on peut changer le separateur .
echo '<br>';

//------------------
/* //------------------
/* definition du timestamp Unix :
Le timestamp est le nombre de secondes écoulées entre une date et le 1janvier 1970 a 00:00:00.
Cette date correspond a la création d'UNIX, premier systeme d'exploitation.

On utilise le timestamp dans de nombreux langages de programmation dont le PHP et le javascript.
*/

// la fonctions prédéfinie time() retourne l'heure courante en timestamp.

echo time();
echo '<br>';
// On va utiliser le timestamp pour passer une date d'un format vers un autre format :
$dateJour = strtotime('29-05-2017'); // transforme la date en timestamp
echo $dateJour .'<br>';
$dateFormat = strftime ('%Y-%m-%d', $dateJour); // transforme un timestamp en date au format indiqué
echo $dateFormat .'<br>';

//-----------------
// Créer une date avec la classe DateTime ( approche objet) :
$date = new DateTime ('11-04-2017'); // on crée un objet DateTime en utilisant le mot clé 'new' suivi du nom de la classe DateTime. On passe une date en argument de DateTime

echo $date->format ('Y-m-d'); // on peut formater l'objet $date en appelant sa méthode format() et en lui indiquant les paramètres du format souhaité, ici Y-m-d.

// ***************************************************************************

//-----------------------------------------------------
echo '<h2> Introduction aux objets </h2>';
//-----------------------------------------------------
// Un objet est un autre type de données. il permet de regrouper des informations : on peut y déclarer des variables, appelées attributs ou propriétés, ainsi que des fonctions appelées méthodes.

// Exemple 1 :
// Nous créons une classe appelée Etudiant qui nous permet de créer des objets de type Etudiant. Ils auront les attributs et la méthodes de cette classe.
class Etudiant {
  public $prenom = 'Julien';
  public $age = 25;  // $prenom et $age sont des attributs. public permet de préciser qu'ils seront accessibles partout.

  public function pays(){ // pays() est une méthode
    return 'France';

  }
}

$objet = new Etudiant(); // "new" est un mot clé permettant d'instancier (de copier) la classe et d'en faire un objet.
echo '<pre>'; print_r($objet); echo '</pre>'; // on voit le type de $objet, la classe dont il est issu, et les propriétés qu'il contient

echo $objet->prenom . '<br>';  // pour accéder à la propriété prenom qui est dans l'objet, je mets une flèche ->

echo $objet->age . '<br>'; // affiche 25

echo $objet->pays() . '<br>'; // appel d'une méthode toujours avec les parenthèses

// Exemple 2 : un panier d'achat de site e-commerce :
class Panier {
  public function ajout_article($article){
    //ici le code pour ajouter l'article au panier
    return "L'article $article a bien été ajouté au panier";
  }
}

// Création d'un objet panier :
$panier = new Panier();
echo $panier->ajout_article('Pull'); // appelle la méthode ajout_article en lui passant l'argument "Pull" pour l'ajouter au panier. Les méthodes s'appellent après une flèche -> et avec des parenthèses.

// ****************************************************
