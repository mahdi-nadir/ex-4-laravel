# Exercice 4 - Préparation à l'examen final

Vous êtes confronté.es à une application Laravel existante.
L'application utilise Laravel Breeze pour l'authentification.
Cette application a été créée en utilisant les commandes suivantes:

```sh
composer create-project laravel/laravel 41b-ex-4
composer require laravel/breeze --dev
php artisan breeze:install --dark
php artisan migrate
npm install
```

0. Faire fonctionner l'application sur votre poste.  
a) Créer une nouvelle base de donnée (via phpMyAdmin ou autre) qui se nomme `ex-4-<code>`.  
b) Configurer les valeurs dans le fichier `.env`.  
c) Faire les commandes pour installer les dépendances avec `composer` et `npm`.  
d) Valider que la connection est valide avec la commande `php artisan db:show`  
e) Rouler les migrations  
f) Rouler les seeders  
g) Partir le serveur de développement (Ne pas oublier `npm run dev` ou `npm run build`). Valider que l'application fonctionne.  
h) Exécuter les tests. À ce stade-ci, il y aura des erreurs, c'est normal. Une fois le travail terminée,
la suite de test devrait être 100% fonctionnelle. De plus, laravel va SUPPRIMER le contenu de la base de
données suite à une execution des tests: Il sera donc important de rouler les seeders avant chaque test.

1. Créer une `Gate` nommée `admin` qui vérifie que le courriel (email) se termine par
`@cmaisonneuve.qc.ca`. Si c'est le cas, on autorise.  
a) Appliquer cette `Gate` à la route `/question-1`  
b) Appliquer la même `Gate` avec la directive `@can` dans le fichier blade responsable de la navigation.

2. Créer un `Seeder` nommé `Question2Seeder` qui crée deux `User` comme suit:  
a) name: `Test User 1`, email: `test@test.com`, password: `12345678`  
b) name: `Test User 2`, email: `test@cmaisonneuve.qc.ca`, password: `12345678`  
Attention: vous devez utilisez `Illuminate\Support\Facades\Hash::make()` pour encoder le mot de passe.
Valider que vous êtes en mesure de vous authentifier avec ces identifiants.
Assurez-vous de corriger le fichier `DatabaseSeeder.php` en conséquence.

3. Créer la requête Eloquent nécessaire pour répondre aux exigences du test d'intégration
`Question3Test.php`. La route qui est testée est `/api/question-3`.
Les résultats doivent être limités aux 3 entrées les plus récentes.

4. La route `/question-4` présente un formulaire aux utilisateurs authentifié.es. Créer le code nécessaire pour:  
a) Valider la requête POST de la route `/question-4`.  
b) Effectuer la sauvegarde d'un nouvel enregistrement du model `Question4`.  
c) Faire afficher le "flash" de succès.  
Aussi, corriger le bug qui existe présentement dans le formulaire.
Assurez-vous de bien prendre connaissance des règles établies au niveau de la base de donnée
via le fichier de migration `question4`.
Finalement, assurez-vous que les messages d'erreurs sont bien retournés à l'usager.

5. Le test d'intégration `Question5Test.php` ne fonctionne pas en ce moment car rien n'est implémenté.
Vous devez créer tous les fichiers nécessaires pour faire en sorte que la route `/question-5` retourne une vue
nommée `questions.5a` _sauf_ lorsque le paramètre d'url (query string) alt est égale à 1, la route
retourne une vue nommée `questions.5b`. En d'autres termes, une requête vers `/question-5` retourne
la vue `questions.5a` et une requête vers `/question-5?alt=1` retourne la vue `questions.5b`.
Le test d'intégration `Question5Test.php` devrait ainsi passer.  
Aussi: interdit d'utiliser les superglobales de php ($_GET, $_REQUEST, ...).
