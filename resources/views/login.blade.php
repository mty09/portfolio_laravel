<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Sécurisée - E. DevSecOps</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center h-screen font-sans">
    <div class="bg-slate-800 p-8 rounded-3xl shadow-2xl border border-slate-700 w-96 text-center">
        <h2 class="text-2xl font-bold text-white mb-6">🔒 Accès Restreint</h2>
        
        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4 text-sm font-bold">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="flex flex-col gap-4">
            @csrf
            <input type="password" name="password" required placeholder="Mot de passe" class="w-full p-4 rounded-xl bg-slate-900 text-white border border-slate-700 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none text-center tracking-widest">
            <button type="submit" class="bg-indigo-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-indigo-700 transition">Entrer</button>
        </form>
        <a href="/" class="text-slate-500 hover:text-slate-300 text-sm mt-6 inline-block">Retour au site public</a>
    </div>
</body>
</html>
