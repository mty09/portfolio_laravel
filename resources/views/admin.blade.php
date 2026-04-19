<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - E. DevSecOps</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <header class="bg-indigo-900 text-white shadow-md py-6">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight">⚙️ Panel Admin</h1>
            <div class="flex gap-4">
                <button onclick="openDeleteModal()" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-sm font-bold shadow flex items-center gap-2">
                    🗑️ Supprimer un élément
                </button>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-indigo-700 hover:bg-indigo-600 rounded-lg text-sm font-medium transition shadow">Déconnexion</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Colonne Gauche : Les Messages -->
        <section class="lg:col-span-5">
            <h2 class="text-2xl font-extrabold text-indigo-900 mb-6">📥 Messages Reçus</h2>
            <div class="space-y-6">
                @foreach($messages as $message)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">{{ $message->name }}</h3>
                                <p class="text-sm font-medium text-indigo-600">{{ $message->profession }}</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">📧 <a href="mailto:{{ $message->email }}" class="hover:underline">{{ $message->email }}</a></p>
                        <div class="bg-gray-50 p-4 rounded-lg text-gray-700 italic border-l-4 border-indigo-400">
                            "{{ $message->message }}"
                        </div>
                    </div>
                @endforeach
                @if($messages->isEmpty())
                    <p class="text-gray-500 italic">Aucun message pour le moment.</p>
                @endif
            </div>
        </section>

        <!-- Colonne Droite : Formulaires d'ajout -->
        <section class="lg:col-span-7 space-y-8">
            
            <!-- Formulaire : Ajouter un Projet -->
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
                <h2 class="text-2xl font-extrabold text-purple-700 mb-6">🚀 Ajouter un Projet</h2>
                <form action="/admin/project" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Titre (FR)</label>
                        <input type="text" name="title" required placeholder="Ex: Ekekem" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Title (EN)</label>
                        <input type="text" name="title_en" placeholder="Ex: Ekekem Project" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Description (FR)</label>
                        <textarea name="description" rows="3" required placeholder="Description en français..." class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none"></textarea>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Description (EN)</label>
                        <textarea name="description_en" rows="3" placeholder="English description..." class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Technologies</label>
                        <input type="text" name="technologies" required placeholder="Ex: Laravel - Tailwind" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Lien du projet (sans https://)</label>
                        <input type="text" name="link" placeholder="Ex: mon-projet.com" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Statut (FR)</label>
                        <select name="status" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                            <option value="Terminé">✅ Terminé</option>
                            <option value="En cours">🛠️ En cours</option>
                            <option value="Maintenance">🚧 Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Status (EN)</label>
                        <select name="status_en" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-purple-500 outline-none">
                            <option value="Finished">✅ Finished</option>
                            <option value="In Progress">🛠️ In Progress</option>
                            <option value="Maintenance">🚧 Maintenance</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Image du projet</label>
                        <input type="file" name="image" accept="image/*" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                    </div>
                    <button type="submit" class="md:col-span-2 bg-purple-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-purple-700 transition">Publier le Projet</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Formulaire : Ajouter une Compétence -->
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100">
                    <h2 class="text-xl font-extrabold text-blue-700 mb-4">⚡ Ajouter Compétence</h2>
                    <form action="/admin/skill" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Catégorie</label>
                            <select name="category" required class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none">
                                <option value="Réseaux">Réseaux</option>
                                <option value="Développement Web">Développement Web</option>
                                <option value="Systèmes">Systèmes</option>
                                <option value="Sécurité">Sécurité</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nom (FR)</label>
                            <input type="text" name="name" required placeholder="Ex: TCP/IP" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Name (EN)</label>
                            <input type="text" name="name_en" placeholder="Ex: TCP/IP Networking" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Pourcentage (Maîtrise)</label>
                            <input type="number" name="percentage" min="0" max="100" value="80" required class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-blue-700 transition">Ajouter</button>
                    </form>
                </div>

                <!-- Formulaire : Ajouter une Statistique -->
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100">
                    <h2 class="text-xl font-extrabold text-pink-700 mb-4">📊 Ajouter Statistique</h2>
                    <form action="/admin/stat" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Valeur</label>
                            <input type="text" name="value" required placeholder="Ex: 2+" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-pink-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Libellé (FR)</label>
                            <input type="text" name="label" required placeholder="Ex: Projets réalisés" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-pink-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Label (EN)</label>
                            <input type="text" name="label_en" placeholder="Ex: Completed Projects" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-pink-500 outline-none">
                        </div>
                        <button type="submit" class="bg-pink-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-pink-700 transition">Ajouter</button>
                    </form>
                </div>

                <!-- Formulaire : Ajouter une Réussite (Formation, Hackathon, Certif) -->
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100 md:col-span-2">
                    <h2 class="text-xl font-extrabold text-amber-600 mb-4">🏆 Ajouter Formation / Hackathon / Certif</h2>
                    <form action="/admin/achievement" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @csrf
                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Type</label>
                            <select name="type" required class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                                <option value="Formation">🎓 Formation</option>
                                <option value="Hackathon">💻 Hackathon</option>
                                <option value="Concours">🎖️ Concours</option>
                                <option value="Certification">📜 Certification</option>
                            </select>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Titre / Nom (FR)</label>
                            <input type="text" name="title" required placeholder="Ex: Master en Cybersécurité" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Title (EN)</label>
                            <input type="text" name="title_en" placeholder="Ex: Master's in Cybersecurity" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Institution (FR)</label>
                            <input type="text" name="institution" placeholder="Ex: École Polytechnique" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Institution (EN)</label>
                            <input type="text" name="institution_en" placeholder="Ex: Polytechnic School" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Date / Année</label>
                            <input type="text" name="date" placeholder="Ex: 2023 - 2024" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Description (FR)</label>
                            <textarea name="description" rows="2" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none"></textarea>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Description (EN)</label>
                            <textarea name="description_en" rows="2" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Photo (pour Certif)</label>
                            <input type="file" name="image" accept="image/*" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                        </div>
                        <button type="submit" class="md:col-span-3 bg-amber-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-amber-700 transition shadow-lg shadow-amber-500/30">Ajouter à mon parcours</button>
                    </form>
                </div>

                <!-- Formulaire : Ajouter un CV -->
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100 md:col-span-2">
                    <h2 class="text-xl font-extrabold text-emerald-700 mb-4">📄 Uploader mon CV</h2>
                    <form action="/admin/cv" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-end">
                        @csrf
                        <div class="flex-1 w-full">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Fichier PDF</label>
                            <input type="file" name="cv" accept=".pdf" required class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <button type="submit" class="bg-emerald-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-emerald-700 transition w-full md:w-auto">Sauvegarder le CV</button>
                    </form>
                </div>
            </div>

            <!-- SECTION SÉCURITÉ DISCRÈTE -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <button onclick="document.getElementById('security-form').classList.toggle('hidden')" class="text-xs text-gray-400 hover:text-gray-600 transition uppercase tracking-widest font-bold">
                    Paramètres Avancés
                </button>
                <div id="security-form" class="hidden mt-6 bg-white p-6 rounded-3xl shadow-sm border border-gray-200 max-w-md">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">🔐 Changer le mot de passe</h3>
                    <form action="/admin/password" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <input type="password" name="new_password" required placeholder="Nouveau mot de passe" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 focus:border-indigo-500 outline-none">
                        <button type="submit" class="bg-gray-800 text-white font-bold py-2 px-6 rounded-xl hover:bg-black transition">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- FENETRE MODALE DE SUPPRESSION (Cachée par défaut) -->
    <div id="deleteModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-3xl w-[500px] shadow-2xl relative">
            <button onclick="closeDeleteModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold text-red-600 mb-6 flex items-center gap-2">⚠️ Supprimer un élément</h2>
            
            <form action="/admin/delete" method="POST" class="flex flex-col gap-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Que veux-tu supprimer ?</label>
                    <select id="typeSelect" name="type" onchange="updateItemsList()" class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        <option value="">Sélectionne un type...</option>
                        <option value="project">Un Projet</option>
                        <option value="skill">Une Compétence</option>
                        <option value="stat">Une Statistique</option>
                        <option value="achievement">Une Réussite (Formation/Hackathon/Certif)</option>
                    </select>
                </div>

                <div id="itemContainer" class="hidden">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lequel exactement ?</label>
                    <select id="itemSelect" name="id" required class="w-full p-3 rounded-xl bg-gray-50 border border-gray-300 outline-none">
                        <!-- Rempli par JavaScript -->
                    </select>
                </div>

                <button type="submit" id="deleteBtn" disabled class="bg-red-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-red-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Confirmer la destruction
                </button>
            </form>
        </div>
    </div>

    <!-- SCRIPT POUR LE POPUP -->
    <script>
        // Injection des données Laravel vers JavaScript de manière sécurisée
        const data = {
            project: @json($projects),
            skill: @json($skills),
            stat: @json($stats),
            achievement: @json($achievements)
        };

        const modal = document.getElementById('deleteModal');
        const typeSelect = document.getElementById('typeSelect');
        const itemContainer = document.getElementById('itemContainer');
        const itemSelect = document.getElementById('itemSelect');
        const deleteBtn = document.getElementById('deleteBtn');

        function openDeleteModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            typeSelect.value = '';
            itemContainer.classList.add('hidden');
            deleteBtn.disabled = true;
        }

        function updateItemsList() {
            const type = typeSelect.value;
            itemSelect.innerHTML = '<option value="">Choisis l\'élément...</option>';
            
            if (type && data[type].length > 0) {
                data[type].forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    // On gère l'affichage du nom (title pour projet, name pour skill, label pour stat)
                    option.textContent = type === 'project' || type === 'achievement' ? item.title : (type === 'skill' ? item.name : item.label);
                    itemSelect.appendChild(option);
                });
                itemContainer.classList.remove('hidden');
                deleteBtn.disabled = false;
            } else {
                itemContainer.classList.add('hidden');
                deleteBtn.disabled = true;
            }
        }
    </script>
</body>
</html>
