<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use Hash;
use App\Models\User;
use App\Models\Cheque;
use App\Models\Adherant;
use App\Models\Amical;
use App\Models\Tranche;

class DashboardController extends Controller
{

    //
    public function Showdashboard() {
        $data = array();
        $data['title'] = "Sjpromoteur Dashboard";
        /////adherants/////
        $data['adherants'] = Adherant::all()->count();
        $data['adherants_day'] = DB::table('adherants')->orderBy('id', 'DESC')->first();

        /////cheques////////
        $data['cheques'] = Cheque::all()->count();
        $data['cheques_day'] = DB::table('cheques')->orderBy('id', 'DESC')->first();
        /////societe///////
        $data['societes'] = Amical::all()->count();
        $data['adrevtotal'] = Adherant::all()->sum('montant_verse');
        $data['tranches'] = Tranche::all()->sum('montant_verse');
        $data['total'] = $data['adrevtotal']+$data['tranches'];
        $data['lastuser'] = DB::table('users')->orderBy('id', 'DESC')->first();
        $data['lastpay'] = DB::table('cheques')->orderBy('id', 'DESC')->first();
        
        //////Query by Months////////////
        $ads = Adherant::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $months = Adherant::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $ads[$index];
        }
        //////END Query by Months////////////
        return view('generale.index',compact('data','datas'));
    }

     //
    public function Showprofile() {
        $data['title'] = "Sjpromoteur Profile";
        return view('generale.profile',compact('data'));
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas !.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas être le même que votre mot de passe actuel.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Mot de passe changé avèc succée!");
    }  

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('warning', 'La session est deconnecté');
    }

}
