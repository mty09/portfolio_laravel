<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Portfolio</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background-color: #f4f4f9; }
        .projet { background: white; padding: 1rem; margin-bottom: 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status { color: #888; font-size: 0.9rem; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Bienvenue sur mon Portfolio ! 🚀</h1>
    
    <h2>Mes Réalisations :</h2>

    <!-- La magie de Laravel : on boucle sur les données envoyées par ton fichier Route -->
    @foreach($projects as $projet)
        <div class="projet">
            <h3>{{ $projet->title }}</h3>
            <p>{{ $projet->description }}</p>
            <p class="status">Statut actuel : {{ $projet->status }}</p>
        </div>
    @endforeach

</body>
</html>
