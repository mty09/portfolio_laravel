<!DOCTYPE html>
<html lang="fr" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio E. DevSecOps</title>
    <!-- On inclut Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            cyan: '#06b6d4',
                            blue: '#3b82f6',
                            dark: '#0f172a', // Le fond très sombre du screenshot
                        }
                    }
                }
            }
        }
        
        // Initialisation du thème (On force le Dark Mode par défaut car le design de l'image est sombre)
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>
    <!-- Font Awesome pour les icônes sociales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-[#0b1120] dark:text-slate-200 font-sans antialiased transition-colors duration-500 selection:bg-cyan-500 selection:text-white">

    <!-- Header & Navbar -->
    <header class="fixed w-full top-0 bg-white/80 dark:bg-[#0b1120]/80 backdrop-blur-md border-b border-gray-200 dark:border-slate-800/50 z-50 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-extrabold tracking-tighter text-gray-900 dark:text-white">Portfolio</h1>
            
            <nav class="hidden md:flex items-center gap-8">
                <ul class="flex gap-8 font-semibold text-sm">
                    <li><a href="#home" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Home</a></li>
                    <li><a href="#skills" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Skills</a></li>
                    <li><a href="#projets" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Portfolio</a></li>
                    <li><a href="#contact" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Contact</a></li>
                </ul>
                
                <div class="flex items-center gap-6 pl-6 border-l border-gray-300 dark:border-slate-700">
                    <!-- BOUTON THEME -->
                    <button onclick="toggleTheme()" class="text-xl text-gray-500 dark:text-gray-400 hover:text-cyan-500 dark:hover:text-cyan-400 transition">
                        <i id="theme-icon-light" class="fa-solid fa-sun hidden dark:block"></i>
                        <i id="theme-icon-dark" class="fa-solid fa-moon block dark:hidden"></i>
                    </button>

                    <!-- BOUTON TELECHARGER CV -->
                    <a href="/storage/cv/mon_cv.pdf" target="_blank" class="px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-lg transition shadow-lg shadow-pink-500/30 flex items-center gap-2 text-sm">
                        Download CV <i class="fa-solid fa-download"></i>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Accueil / Hero Section (Design Inspiré) -->
    <section id="home" class="min-h-screen pt-32 pb-20 px-6 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
        
        <!-- Colonne Gauche : L'image avec le GLOW -->
        <div class="flex-1 flex justify-center md:justify-end relative">
            <!-- La Forme "Glow" Bleue derrière -->
            <div class="absolute inset-0 bg-cyan-500/40 blur-[80px] rounded-full w-[400px] h-[400px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -z-10"></div>
            
            <!-- La photo dans une forme abstraite (Blob) -->
            <div class="relative w-80 h-96 md:w-[400px] md:h-[480px] overflow-hidden shadow-2xl border-2 border-cyan-400/30" 
                 style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; box-shadow: inset 0 0 50px rgba(6, 182, 212, 0.5);">
                <img src="{{ asset('Eliakym_KODAH.jpeg') }}" alt="Eliakym KODAH" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Colonne Droite : Le Texte -->
        <div class="flex-1 space-y-6">
            <p class="text-xl font-bold text-gray-500 dark:text-slate-400 tracking-wider">Hello, I'm</p>
            <h2 class="text-6xl font-black text-gray-900 dark:text-white tracking-tight">Eliakym KODAH</h2>
            <h3 class="text-2xl font-bold text-gray-700 dark:text-slate-300">
                And I'm a <span class="text-cyan-500">DevSecOps Engineer |</span>
            </h3>
            
            <p class="text-lg text-gray-600 dark:text-slate-400 leading-relaxed max-w-lg mt-6">
                Développeur et technicien en Réseaux, Infrastructure et Sécurité. Je suis passionné par la création de solutions web robustes et la protection des systèmes d'information. Actuellement en préparation du CCNA.
            </p>

            <!-- Liens Sociaux -->
            <div class="flex gap-4 pt-4">
                <a href="#" class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>

            <!-- Boutons d'action -->
            <div class="pt-6 flex gap-4">
                <a href="#projets" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-400 text-gray-900 font-bold rounded-full transition shadow-lg shadow-cyan-500/40">Hire Me</a>
                <a href="#contact" class="px-8 py-3 bg-transparent hover:bg-gray-800 text-cyan-500 dark:text-cyan-400 font-bold rounded-full border border-cyan-500 transition">Contact Me</a>
            </div>
        </div>
    </section>

    <!-- Statistiques (Alignées comme sur l'image) -->
    <section class="border-y border-gray-200 dark:border-slate-800 bg-white dark:bg-[#0b1120] transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 py-12 flex justify-between items-center flex-wrap gap-8">
            @foreach($stats as $stat)
            <div class="flex items-center gap-4 border-l-2 border-gray-200 dark:border-slate-800 pl-6 first:border-0 first:pl-0">
                <h3 class="text-4xl font-black text-gray-900 dark:text-white">{{ $stat->value }}</h3>
                <p class="text-sm text-gray-500 dark:text-slate-400 font-medium w-24 leading-tight">{{ $stat->label }}</p>
            </div>
            @endforeach
            
            @if($stats->isEmpty())
                <p class="text-gray-500 dark:text-slate-500 w-full text-center">Aucune statistique pour le moment.</p>
            @endif
        </div>
    </section>

    <!-- Compétences avec Barres de Pourcentage -->
    <section id="skills" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-4xl font-black mb-16 text-center text-gray-900 dark:text-white">Technical <span class="text-cyan-500">Skills</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach($skills->groupBy('category') as $category => $categorySkills)
            <div class="bg-white dark:bg-slate-900/50 p-8 rounded-3xl border border-gray-200 dark:border-slate-800 shadow-xl transition-colors duration-500">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 border-b-2 border-cyan-500/30 pb-4">
                    {{ $category }}
                </h3>
                <ul class="space-y-6">
                    @foreach($categorySkills as $skill)
                    <li>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-bold text-gray-700 dark:text-slate-300">{{ $skill->name }}</span>
                            <span class="text-sm font-bold text-cyan-500">{{ $skill->percentage ?? 80 }}%</span>
                        </div>
                        <!-- La Barre de Pourcentage -->
                        <div class="w-full bg-gray-200 dark:bg-slate-800 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-cyan-600 to-cyan-400 h-2.5 rounded-full shadow-[0_0_10px_rgba(6,182,212,0.8)]" style="width: {{ $skill->percentage ?? 80 }}%"></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
            
            @if($skills->isEmpty())
                <p class="text-gray-500 dark:text-slate-500 col-span-full text-center">Aucune compétence pour le moment.</p>
            @endif
        </div>
    </section>

    <!-- Projets -->
    <section id="projets" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-4xl font-black mb-16 text-center text-gray-900 dark:text-white">Latest <span class="text-cyan-500">Projects</span></h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            @foreach($projects as $projet)
            <div class="bg-white dark:bg-slate-900/80 rounded-3xl overflow-hidden border border-gray-200 dark:border-slate-800 shadow-xl group flex flex-col transition-colors duration-500 hover:-translate-y-2">
                <div class="h-64 bg-gray-200 dark:bg-slate-800 relative overflow-hidden">
                    @if($projet->image_url)
                        <img src="{{ asset('storage/' . $projet->image_url) }}" alt="Capture du projet" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=Project" alt="Pas d'image" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-50">
                    @endif
                    <!-- Overlay au survol -->
                    <div class="absolute inset-0 bg-cyan-900/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        @if($projet->link)
                        <a href="https://{{ $projet->link }}" target="_blank" class="px-6 py-2 bg-white text-cyan-600 font-bold rounded-full shadow-lg">Voir le site</a>
                        @endif
                    </div>
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $projet->title }}</h3>
                    <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed flex-1">{{ $projet->description }}</p>
                    
                    @if($projet->technologies)
                    <div>
                        <p class="text-xs font-bold text-cyan-500 uppercase tracking-wider mb-2">Tech Stack</p>
                        <p class="text-gray-800 dark:text-slate-300 text-sm bg-gray-100 dark:bg-[#0b1120] inline-block px-4 py-2 rounded-lg border border-gray-200 dark:border-slate-700 font-mono">{{ $projet->technologies }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            
            @if($projects->isEmpty())
                <p class="text-gray-500 dark:text-slate-500 col-span-full text-center">Aucun projet pour le moment.</p>
            @endif
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-24 px-6 max-w-4xl mx-auto text-center mb-20">
        <h2 class="text-4xl font-black mb-6 text-gray-900 dark:text-white">Contact <span class="text-cyan-500">Me</span></h2>
        <p class="text-lg text-gray-600 dark:text-slate-400 mb-12">Vous avez un projet en tête ou une question ? Laissez-moi un message !</p>
        
        <form action="/contact" method="POST" class="bg-white dark:bg-slate-900/50 p-10 rounded-3xl border border-gray-200 dark:border-slate-800 shadow-2xl flex flex-col gap-6 text-left transition-colors duration-500">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <input type="text" name="name" required placeholder="Full Name" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
                </div>
                <div>
                    <input type="text" name="profession" required placeholder="Profession / Company" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
                </div>
            </div>
            <div>
                <input type="email" name="email" required placeholder="Email Address" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
            </div>
            <div>
                <textarea name="message" rows="6" required placeholder="Your Message..." class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition resize-none text-lg"></textarea>
            </div>
            
            <button type="submit" class="mt-4 bg-cyan-500 hover:bg-cyan-400 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 text-lg shadow-lg shadow-cyan-500/30">Send Message <i class="fa-solid fa-paper-plane ml-2"></i></button>
        </form>
    </section>

    <!-- SCRIPT POUR LE DARK MODE -->
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>
