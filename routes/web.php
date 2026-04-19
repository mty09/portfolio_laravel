<?php
use App\Models\Project; 
use App\Models\Message; 
use App\Models\Skill; 
use App\Models\Stat;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

// --- PUBLIC ROUTES ---
Route::get('/', function () {
    $projects = Project::all(); 
    $skills = Skill::all();
    $stats = Stat::all();
    return view('welcome', [
        'projects' => $projects,
        'skills' => $skills,
        'stats' => $stats
    ]);
});

Route::post('/contact', function (Request $request) {
    $nouveauMessage = new Message();
    $nouveauMessage->name = $request->name;
    $nouveauMessage->profession = $request->profession;
    $nouveauMessage->email = $request->email;
    $nouveauMessage->message = $request->message;
    $nouveauMessage->save();
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
            'stats' => Stat::all()
        ]);
    });

    Route::post('/project', function (Request $request) {
        $nouveauProjet = new Project();
        $nouveauProjet->title = $request->title;
        $nouveauProjet->description = $request->description;
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
        $nouvelleStat->save();
        return redirect('/admin'); 
    });

    Route::post('/delete', function (Request $request) {
        $type = $request->type; 
        $id = $request->id;
        
        if ($type === 'project') Project::destroy($id);
        if ($type === 'skill') Skill::destroy($id);
        if ($type === 'stat') Stat::destroy($id);

        return redirect('/admin');
    });
});
