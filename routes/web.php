<?php
use App\Models\Project; 
use App\Models\Message; 
use App\Models\Skill; 
use App\Models\Stat;
use App\Models\Achievement;
use App\Mail\ContactMail;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// --- PUBLIC ROUTES ---
Route::get('/', function () {
    $projects = Project::all(); 
    $skills = Skill::all();
    $stats = Stat::all();
    $achievements = Achievement::all();
    return view('welcome', [
        'projects' => $projects,
        'skills' => $skills,
        'stats' => $stats,
        'achievements' => $achievements
    ]);
});

Route::post('/contact', function (Request $request) {
    $nouveauMessage = new Message();
    $nouveauMessage->name = $request->name;
    $nouveauMessage->profession = $request->profession;
    $nouveauMessage->email = $request->email;
    $nouveauMessage->message = $request->message;
    $nouveauMessage->save();

    // ENVOI DE L'EMAIL DE NOTIFICATION
    try {
        Mail::to(env('MAIL_TO_ADDRESS', 'eliakymkodah09@gmail.com'))->send(new ContactMail([
            'name' => $request->name,
            'profession' => $request->profession,
            'email' => $request->email,
            'message' => $request->message,
        ]));
    } catch (\Exception $e) {
        // On continue même si le mail échoue
    }

    return redirect('/'); 
})->middleware('throttle:3,1');

// --- LOGIN SYSTEM ---
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $adminUser = App\Models\User::first();
    if ($adminUser && Illuminate\Support\Facades\Hash::check($request->password, $adminUser->password)) {
        session(['is_admin' => true]);
        return redirect('/admin');
    }
    return redirect('/login')->with('error', 'Mot de passe incorrect');
});

Route::post('/logout', function () {
    session()->forget('is_admin');
    return redirect('/');
});

Route::middleware(\App\Http\Middleware\AdminAuth::class)->prefix('admin')->group(function () {

    Route::get('/', function() {
        return view('admin', [
            'messages' => Message::all(),
            'projects' => Project::all(),
            'skills' => Skill::all(),
            'stats' => Stat::all(),
            'achievements' => Achievement::all()
        ]);
    });

    Route::post('/project', function (Request $request) {
        $nouveauProjet = new Project();
        $nouveauProjet->title = $request->title;
        $nouveauProjet->title_en = $request->title_en;
        $nouveauProjet->description = $request->description;
        $nouveauProjet->description_en = $request->description_en;
        $nouveauProjet->technologies = $request->technologies;
        $nouveauProjet->link = $request->link;
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $nouveauProjet->image_url = $path;
        }
        
        $nouveauProjet->save();
        return redirect('/admin'); 
    });

    Route::post('/skill', function (Request $request) {
        $nouvelleCompetence = new Skill();
        $nouvelleCompetence->name = $request->name;
        $nouvelleCompetence->name_en = $request->name_en;
        $nouvelleCompetence->category = $request->category;
        $nouvelleCompetence->percentage = $request->percentage ?? 80;
        $nouvelleCompetence->save();
        return redirect('/admin'); 
    });

    // --- CV UPLOAD ---
    Route::post('/cv', function (Request $request) {
        if ($request->hasFile('cv')) {
            $request->file('cv')->storeAs('cv', 'mon_cv.pdf', 'public');
        }
        return redirect('/admin');
    });
    Route::post('/stat', function (Request $request) {
        $nouvelleStat = new Stat();
        $nouvelleStat->value = $request->value;
        $nouvelleStat->label = $request->label;
        $nouvelleStat->label_en = $request->label_en;
        $nouvelleStat->save();
        return redirect('/admin'); 
    });

    Route::post('/achievement', function (Request $request) {
        $achievement = new Achievement();
        $achievement->type = $request->type;
        $achievement->title = $request->title;
        $achievement->title_en = $request->title_en;
        $achievement->institution = $request->institution;
        $achievement->institution_en = $request->institution_en;
        $achievement->date = $request->date;
        $achievement->description = $request->description;
        $achievement->description_en = $request->description_en;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('achievements', 'public');
            $achievement->image_url = $path;
        }

        $achievement->save();
        return redirect('/admin');
    });

    Route::post('/delete', function (Request $request) {
        $type = $request->type; 
        $id = $request->id;
        
        if ($type === 'project') Project::destroy($id);
        if ($type === 'skill') Skill::destroy($id);
        if ($type === 'stat') Stat::destroy($id);
        if ($type === 'achievement') Achievement::destroy($id);

        return redirect('/admin');
    });

    // --- CHANGEMENT DE MOT DE PASSE ---
    Route::post('/password', function (Request $request) {
        $user = \App\Models\User::first();
        if ($user) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->new_password);
            $user->save();
        }
        return back()->with('success', 'Mot de passe modifié avec succès !');
    });
});

// --- ROUTE DE RÉINITIALISATION TOTALE (À SUPPRIMER APRÈS USAGE) ---
Route::get('/reset-db-full', function () {
    try {
        // 1. On vide tout et on recrée les tables
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--force' => true]);

        // 2. On recrée ton compte Admin par défaut
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com'; // Tu pourras le changer dans l'admin après
        $user->password = \Illuminate\Support\Facades\Hash::make('password123'); // Change-le vite !
        $user->save();

        return "✅ Base de données RÉINITIALISÉE ! <br><br> 
                👉 <b>Email :</b> admin@example.com <br> 
                👉 <b>Pass :</b> password123 <br><br> 
                <a href='/admin'>Se connecter à l'admin</a>";
    } catch (\Exception $e) {
        return "❌ Erreur lors de la réinitialisation : " . $e->getMessage();
    }
});

