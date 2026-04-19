<!DOCTYPE html>
<html lang="fr" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliakym KODAH | DevSecOps Engineer</title>
    
    <!-- Favicon (Icône de l'onglet) -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🛡️</text></svg>">
    
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
            <h1 class="text-3xl font-extrabold tracking-tighter text-gray-900 dark:text-white">E. DevSecOps</h1>
            
            <nav class="hidden md:flex items-center gap-8">
                <ul class="flex gap-8 font-semibold text-sm">
                    <li><a href="#home" data-i18n="nav_home" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Home</a></li>
                    <li><a href="#journey" data-i18n="nav_journey" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Journey</a></li>
                    <li><a href="#skills" data-i18n="nav_skills" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Skills</a></li>
                    <li><a href="#projets" data-i18n="nav_portfolio" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Portfolio</a></li>
                    <li><a href="#contact" data-i18n="nav_contact" class="hover:text-cyan-500 dark:hover:text-cyan-400 transition border-b-2 border-transparent hover:border-cyan-500 pb-1">Contact</a></li>
                </ul>
                
                <div class="flex items-center gap-6 pl-6 border-l border-gray-300 dark:border-slate-700">
                    <button onclick="toggleTheme()" class="text-xl text-gray-500 dark:text-gray-400 hover:text-cyan-500 dark:hover:text-cyan-400 transition">
                        <i id="theme-icon-light" class="fa-solid fa-sun hidden dark:block"></i>
                        <i id="theme-icon-dark" class="fa-solid fa-moon block dark:hidden"></i>
                    </button>
                    <button onclick="toggleLang()" class="flex items-center gap-1.5 text-xs font-bold text-gray-500 dark:text-gray-400 hover:text-cyan-500 dark:hover:text-cyan-400 transition border border-gray-300 dark:border-slate-700 px-2 py-1 rounded">
                        <span id="lang-text">EN</span> <i class="fa-solid fa-globe"></i>
                    </button>
                    <a href="/storage/cv/mon_cv.pdf" target="_blank" class="px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-lg transition shadow-lg shadow-pink-500/30 flex items-center gap-2 text-sm">
                        <span data-i18n="btn_cv">Download CV</span> <i class="fa-solid fa-download"></i>
                    </a>
                </div>
            </nav>

            <!-- BOUTON MOBILE (Hamburger) -->
            <button onclick="toggleMobileMenu()" class="md:hidden text-2xl text-gray-900 dark:text-white p-2">
                <i id="menu-icon" class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- MENU MOBILE OVERLAY -->
        <div id="mobile-menu" class="hidden fixed inset-0 top-[72px] bg-white dark:bg-[#0b1120] z-40 p-6 flex flex-col gap-8 md:hidden transition-all duration-300 border-t border-gray-100 dark:border-slate-800">
            <ul class="flex flex-col gap-6 font-bold text-lg">
                <li><a href="#home" onclick="toggleMobileMenu()" data-i18n="nav_home">Home</a></li>
                <li><a href="#journey" onclick="toggleMobileMenu()" data-i18n="nav_journey">Journey</a></li>
                <li><a href="#skills" onclick="toggleMobileMenu()" data-i18n="nav_skills">Skills</a></li>
                <li><a href="#projets" onclick="toggleMobileMenu()" data-i18n="nav_portfolio">Portfolio</a></li>
                <li><a href="#contact" onclick="toggleMobileMenu()" data-i18n="nav_contact">Contact</a></li>
            </ul>
            
            <div class="pt-8 border-t border-gray-100 dark:border-slate-800 flex flex-col gap-6">
                <div class="flex items-center justify-between">
                    <span class="font-bold">Dark Mode</span>
                    <button onclick="toggleTheme()" class="text-2xl text-cyan-500">
                        <i id="mobile-theme-icon-light" class="fa-solid fa-sun hidden dark:block"></i>
                        <i id="mobile-theme-icon-dark" class="fa-solid fa-moon block dark:hidden"></i>
                    </button>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-bold">Language</span>
                    <button onclick="toggleLang()" class="flex items-center gap-2 font-bold text-cyan-500 border border-cyan-500 px-4 py-2 rounded-xl">
                        <span id="mobile-lang-text">EN</span> <i class="fa-solid fa-globe"></i>
                    </button>
                </div>
                <a href="/storage/cv/mon_cv.pdf" target="_blank" class="w-full justify-center py-4 bg-pink-600 text-white font-bold rounded-2xl shadow-xl shadow-pink-500/20 flex items-center gap-3">
                    <span data-i18n="btn_cv">Download CV</span> <i class="fa-solid fa-download"></i>
                </a>
            </div>
        </div>
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
            <p class="text-xl font-bold text-gray-500 dark:text-slate-400 tracking-wider" data-i18n="hero_hello">Hello, I'm</p>
            <h2 class="text-6xl font-black text-gray-900 dark:text-white tracking-tight">Eliakym KODAH</h2>
            <h3 class="text-2xl font-bold text-gray-700 dark:text-slate-300">
                <span data-i18n="hero_and">And I'm a</span> <span class="text-cyan-500">DevSecOps Engineer |</span>
            </h3>
            
            <p class="text-lg text-gray-600 dark:text-slate-400 leading-relaxed max-w-lg mt-6 lang-fr">
                Développeur et technicien en Réseaux, Infrastructure et Sécurité. Je suis passionné par la création de solutions web robustes et la protection des systèmes d'information. Actuellement en préparation du CCNA.
            </p>
            <p class="text-lg text-gray-600 dark:text-slate-400 leading-relaxed max-w-lg mt-6 lang-en hidden">
                Developer and technician in Networks, Infrastructure and Security. I am passionate about creating robust web solutions and protecting information systems. Currently preparing for CCNA.
            </p>

            <!-- Liens Sociaux -->
            <div class="flex gap-4 pt-4">
                <a href="https://github.com/mty09" class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/eliakym-kodah-bba024370?utm_source=share_via&utm_content=profile&utm_medium=member_android" 
                class="w-10 h-10 rounded-md bg-cyan-500/10 text-cyan-500 flex items-center justify-center text-xl hover:bg-cyan-500 hover:text-white transition border border-cyan-500/30"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>

            <!-- Boutons d'action -->
            <div class="pt-6 flex gap-4">
                <a href="#projets" data-i18n="btn_hire" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-400 text-gray-900 font-bold rounded-full transition shadow-lg shadow-cyan-500/40">Hire Me</a>
                <a href="#contact" data-i18n="btn_contact" class="px-8 py-3 bg-transparent hover:bg-gray-800 text-cyan-500 dark:text-cyan-400 font-bold rounded-full border border-cyan-500 transition">Contact Me</a>
            </div>
        </div>
    </section>

    <!-- Statistiques (Alignées comme sur l'image) -->
    <section class="border-y border-gray-200 dark:border-slate-800 bg-white dark:bg-[#0b1120] transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 py-12 flex justify-center items-center flex-wrap gap-12 md:gap-24">
            @foreach($stats as $stat)
            <div class="flex items-center gap-4 border-l-2 border-gray-200 dark:border-slate-800 pl-6 first:border-0 first:pl-0">
                <h3 class="text-4xl font-black text-gray-900 dark:text-white">{{ $stat->value }}</h3>
                <p class="text-sm text-gray-500 dark:text-slate-400 font-medium w-24 leading-tight lang-fr">{{ $stat->label }}</p>
                <p class="text-sm text-gray-500 dark:text-slate-400 font-medium w-24 leading-tight lang-en hidden">{{ $stat->label_en ?? $stat->label }}</p>
            </div>
            @endforeach
            
            @if($stats->isEmpty())
                <p class="text-gray-500 dark:text-slate-500 w-full text-center" data-i18n="stats_empty">Aucune statistique pour le moment.</p>
            @endif
        </div>
    </section>

    <!-- Parcours : Formations, Hackathons & Certifications -->
    <section id="journey" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-4xl font-black mb-16 text-center text-gray-900 dark:text-white"><span data-i18n="journey_title_1">My</span> <span class="text-cyan-500" data-i18n="journey_title_2">Journey</span> <span data-i18n="journey_title_3">& Certifications</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            @foreach($achievements as $ach)
            <div class="bg-white dark:bg-slate-900/50 rounded-3xl p-8 border border-gray-200 dark:border-slate-800 shadow-xl transition-all duration-300 hover:border-cyan-500/50 group flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="px-4 py-1.5 rounded-full bg-cyan-500/10 text-cyan-500 text-xs font-bold uppercase tracking-widest border border-cyan-500/20">
                        {{ $ach->type }}
                    </span>
                    <span class="text-sm font-bold text-gray-400 dark:text-slate-500">{{ $ach->date }}</span>
                </div>
                
                <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2 group-hover:text-cyan-500 transition-colors">
                    <span class="lang-fr">{{ $ach->title }}</span>
                    <span class="lang-en hidden">{{ $ach->title_en ?? $ach->title }}</span>
                </h3>
                <p class="text-indigo-600 dark:text-cyan-400 font-bold text-sm mb-4">
                    <span class="lang-fr">{{ $ach->institution }}</span>
                    <span class="lang-en hidden">{{ $ach->institution_en ?? $ach->institution }}</span>
                </p>
                
                @if($ach->description)
                <div class="text-gray-600 dark:text-slate-400 text-sm leading-relaxed mb-6 flex-1 italic">
                    <p class="lang-fr">"{{ $ach->description }}"</p>
                    <p class="lang-en hidden">"{{ $ach->description_en ?? $ach->description }}"</p>
                </div>
                @endif

                @if($ach->image_url)
                <div class="mt-auto pt-6 border-t border-gray-100 dark:border-slate-800">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Verification / Preview</p>
                    <div class="relative group/img overflow-hidden rounded-xl border border-gray-200 dark:border-slate-700">
                        <img src="{{ asset('storage/' . $ach->image_url) }}" alt="Certification" class="w-full h-32 object-cover grayscale group-hover/img:grayscale-0 transition duration-500">
                        <div class="absolute inset-0 bg-cyan-500/20 opacity-0 group-hover/img:opacity-100 transition duration-300 flex items-center justify-center">
                            <a href="{{ asset('storage/' . $ach->image_url) }}" target="_blank" class="bg-white text-gray-900 p-2 rounded-full shadow-lg">
                                <i class="fa-solid fa-expand text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        @if($achievements->isEmpty())
            <div class="text-center py-10 bg-gray-50 dark:bg-slate-900/30 rounded-3xl border-2 border-dashed border-gray-200 dark:border-slate-800">
                <p class="text-gray-500 dark:text-slate-500 font-medium" data-i18n="journey_empty">Aucune formation ou réalisation pour le moment.</p>
            </div>
        @endif
    </section>

    <!-- Compétences avec Barres de Pourcentage -->
    <section id="skills" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-4xl font-black mb-16 text-center text-gray-900 dark:text-white"><span data-i18n="skills_title_1">Technical</span> <span class="text-cyan-500" data-i18n="skills_title_2">Skills</span></h2>
        
        <div class="flex flex-wrap justify-center gap-10">
            @foreach($skills->groupBy('category') as $category => $categorySkills)
            <div class="flex-1 min-w-[300px] max-w-[400px] bg-white dark:bg-slate-900/50 p-8 rounded-3xl border border-gray-200 dark:border-slate-800 shadow-xl transition-colors duration-500">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 border-b-2 border-cyan-500/30 pb-4">
                    {{ $category }}
                </h3>
                <ul class="space-y-6">
                    @foreach($categorySkills as $skill)
                    <li>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-bold text-gray-700 dark:text-slate-300 lang-fr">{{ $skill->name }}</span>
                            <span class="font-bold text-gray-700 dark:text-slate-300 lang-en hidden">{{ $skill->name_en ?? $skill->name }}</span>
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
        <h2 class="text-4xl font-black mb-16 text-center text-gray-900 dark:text-white"><span data-i18n="portfolio_title_1">Latest</span> <span class="text-cyan-500" data-i18n="portfolio_title_2">Projects</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 justify-items-center justify-center">
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
                        <a href="https://{{ $projet->link }}" target="_blank" data-i18n="btn_view_site" class="px-6 py-2 bg-white text-cyan-600 font-bold rounded-full shadow-lg">Voir le site</a>
                        @endif
                    </div>
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                        <span>
                            <span class="lang-fr">{{ $projet->title }}</span>
                            <span class="lang-en hidden">{{ $projet->title_en ?? $projet->title }}</span>
                        </span>
                        <!-- Badge Statut -->
                        <span class="text-[10px] uppercase tracking-widest px-2 py-1 rounded-md bg-cyan-100 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400 font-bold border border-cyan-200 dark:border-cyan-800">
                            <span class="lang-fr">{{ $projet->status ?? 'Terminé' }}</span>
                            <span class="lang-en hidden">{{ $projet->status_en ?? 'Finished' }}</span>
                        </span>
                    </h3>
                    <div class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed flex-1">
                        <p class="lang-fr">{{ $projet->description }}</p>
                        <p class="lang-en hidden">{{ $projet->description_en ?? $projet->description }}</p>
                    </div>
                    
                    @if($projet->technologies)
                    <div>
                        <p class="text-xs font-bold text-cyan-500 uppercase tracking-wider mb-2" data-i18n="tech_stack">Tech Stack</p>
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
        <h2 class="text-4xl font-black mb-6 text-gray-900 dark:text-white"><span data-i18n="contact_title_1">Contact</span> <span class="text-cyan-500" data-i18n="contact_title_2">Me</span></h2>
        <p class="text-lg text-gray-600 dark:text-slate-400 mb-12" data-i18n="contact_subtitle">Vous avez un projet en tête ou une question ? Laissez-moi un message !</p>
        
        <form action="/contact" method="POST" class="bg-white dark:bg-slate-900/50 p-10 rounded-3xl border border-gray-200 dark:border-slate-800 shadow-2xl flex flex-col gap-6 text-left transition-colors duration-500">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <input type="text" name="name" required placeholder="Full Name" data-i18n-placeholder="placeholder_name" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
                </div>
                <div>
                    <input type="text" name="profession" required placeholder="Profession / Company" data-i18n-placeholder="placeholder_company" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
                </div>
            </div>
            <div>
                <input type="email" name="email" required placeholder="Email Address" data-i18n-placeholder="placeholder_email" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition text-lg">
            </div>
            <div>
                <textarea name="message" rows="6" required placeholder="Your Message..." data-i18n-placeholder="placeholder_message" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-[#0b1120] text-gray-900 dark:text-white border border-gray-300 dark:border-slate-700 focus:border-cyan-500 outline-none transition resize-none text-lg"></textarea>
            </div>
            
            <button type="submit" class="mt-4 bg-cyan-500 hover:bg-cyan-400 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 text-lg shadow-lg shadow-cyan-500/30">
                <span data-i18n="btn_send">Send Message</span> <i class="fa-solid fa-paper-plane ml-2"></i>
            </button>
        </form>
    </section>

    <!-- SCRIPT POUR LE DARK MODE & LANGUE -->
    <script>
        // --- GESTION DU THÈME ---
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // --- GESTION DE LA LANGUE ---
        const translations = {
            fr: {
                nav_home: "Accueil",
                nav_journey: "Parcours",
                nav_skills: "Compétences",
                nav_portfolio: "Projets",
                nav_contact: "Contact",
                btn_cv: "Télécharger CV",
                hero_hello: "Bonjour, je suis",
                hero_and: "Et je suis",
                btn_hire: "Voir Mes Projets",
                btn_contact: "Contactez-moi",
                stats_empty: "Aucune statistique pour le moment.",
                journey_title_1: "Mon",
                journey_title_2: "Parcours",
                journey_title_3: "& Certifications",
                journey_empty: "Aucune formation ou réalisation pour le moment.",
                skills_title_1: "Compétences",
                skills_title_2: "Techniques",
                portfolio_title_1: "Derniers",
                portfolio_title_2: "Projets",
                btn_view_site: "Voir le site",
                tech_stack: "Technologies",
                contact_title_1: "Contactez-",
                contact_title_2: "Moi",
                contact_subtitle: "Vous avez un projet en tête ou une question ? Laissez-moi un message !",
                placeholder_name: "Nom Complet",
                placeholder_company: "Profession / Entreprise",
                placeholder_email: "Adresse Email",
                placeholder_message: "Votre Message...",
                btn_send: "Envoyer Message"
            },
            en: {
                nav_home: "Home",
                nav_journey: "Journey",
                nav_skills: "Skills",
                nav_portfolio: "Portfolio",
                nav_contact: "Contact",
                btn_cv: "Download CV",
                hero_hello: "Hello, I'm",
                hero_and: "And I'm a",
                btn_hire: "See My Projects",
                btn_contact: "Contact Me",
                stats_empty: "No statistics at the moment.",
                journey_title_1: "My",
                journey_title_2: "Journey",
                journey_title_3: "& Certifications",
                journey_empty: "No education or achievement at the moment.",
                skills_title_1: "Technical",
                skills_title_2: "Skills",
                portfolio_title_1: "Latest",
                portfolio_title_2: "Projects",
                btn_view_site: "Visit Website",
                tech_stack: "Tech Stack",
                contact_title_1: "Contact",
                contact_title_2: "Me",
                contact_subtitle: "Have a project in mind or a question? Leave me a message!",
                placeholder_name: "Full Name",
                placeholder_company: "Profession / Company",
                placeholder_email: "Email Address",
                placeholder_message: "Your Message...",
                btn_send: "Send Message"
            }
        };

    <script>
        // --- GESTION DU THÈME ---
        function toggleTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        // --- GESTION DU MENU MOBILE ---
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.classList.replace('fa-bars', 'fa-xmark');
            } else {
                menu.classList.add('hidden');
                icon.classList.replace('fa-xmark', 'fa-bars');
            }
        }

        // --- GESTION DE LA LANGUE ---
        const translations = {
            fr: {
                nav_home: "Accueil", nav_journey: "Parcours", nav_skills: "Compétences", nav_portfolio: "Projets", nav_contact: "Contact",
                btn_cv: "Télécharger CV", hero_hello: "Bonjour, je suis", hero_and: "Et je suis", btn_hire: "Voir Mes Projets",
                btn_contact: "Contactez-moi", stats_empty: "Aucune statistique pour le moment.",
                journey_title_1: "Mon", journey_title_2: "Parcours", journey_title_3: "& Certifications",
                journey_empty: "Aucune formation ou réalisation pour le moment.",
                skills_title_1: "Compétences", skills_title_2: "Techniques",
                portfolio_title_1: "Derniers", portfolio_title_2: "Projets",
                btn_view_site: "Voir le site", tech_stack: "Technologies",
                contact_title_1: "Contactez-", contact_title_2: "Moi",
                contact_subtitle: "Vous avez un projet en tête ou une question ? Laissez-moi un message !",
                placeholder_name: "Nom Complet", placeholder_company: "Profession / Entreprise",
                placeholder_email: "Adresse Email", placeholder_message: "Votre Message...", btn_send: "Envoyer Message"
            },
            en: {
                nav_home: "Home", nav_journey: "Journey", nav_skills: "Skills", nav_portfolio: "Portfolio", nav_contact: "Contact",
                btn_cv: "Download CV", hero_hello: "Hello, I'm", hero_and: "And I'm a", btn_hire: "See My Projects",
                btn_contact: "Contact Me", stats_empty: "No statistics at the moment.",
                journey_title_1: "My", journey_title_2: "Journey", journey_title_3: "& Certifications",
                journey_empty: "No education or achievement at the moment.",
                skills_title_1: "Technical", skills_title_2: "Skills",
                portfolio_title_1: "Latest", portfolio_title_2: "Projects",
                btn_view_site: "Visit Website", tech_stack: "Tech Stack",
                contact_title_1: "Contact", contact_title_2: "Me",
                contact_subtitle: "Have a project in mind or a question? Leave me a message!",
                placeholder_name: "Full Name", placeholder_company: "Profession / Company",
                placeholder_email: "Email Address", placeholder_message: "Your Message...", btn_send: "Send Message"
            }
        };

        function setLanguage(lang) {
            localStorage.setItem('lang', lang);
            
            // 1. Mise à jour des textes de toggle
            const langTexts = ['lang-text', 'mobile-lang-text'];
            langTexts.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.innerText = lang.toUpperCase();
            });

            // 2. Traduction statique (data-i18n)
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[lang][key]) el.innerText = translations[lang][key];
            });

            // 3. Traduction placeholders
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (translations[lang][key]) el.placeholder = translations[lang][key];
            });

            // 4. Affichage des blocs dynamiques
            document.querySelectorAll('.lang-fr').forEach(el => {
                if (lang === 'fr') el.classList.remove('hidden');
                else el.classList.add('hidden');
            });
            document.querySelectorAll('.lang-en').forEach(el => {
                if (lang === 'en') el.classList.remove('hidden');
                else el.classList.add('hidden');
            });
        }

        function toggleLang() {
            const currentLang = localStorage.getItem('lang') || 'fr';
            setLanguage(currentLang === 'fr' ? 'en' : 'fr');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedLang = localStorage.getItem('lang') || 'fr';
            setLanguage(savedLang);
        });
    </script>
    </script>
</body>
</html>
