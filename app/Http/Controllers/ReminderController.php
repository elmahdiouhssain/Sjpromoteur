<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\User;
use App\Models\Reminder;
use Carbon\Carbon;

class ReminderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:agenda-list|agenda-create|agenda-edit|agenda-delete', ['only' => ['index','store']]);
        $this->middleware('permission:agenda-create', ['only' => ['createReminder','storeReminder']]);
        $this->middleware('permission:agenda-edit', ['only' => ['Actionrendez','Actionrendez']]);
        $this->middleware('permission:agenda-delete', ['only' => ['Actionrendez']]);
    }
   
    public function indexRend(Request $request, $id)
    {
       //$patient_id = $id;
       $find = User::find($id);
       $rends = Reminder::all();
       $data['auth_user'] = \Auth::User()->id; 
       $data['rendezvous_user'] = DB::table('reminders')->where('user_id',$data['auth_user'])->get();
       $data['rendezvous_count'] = Reminder::all()->count();
        if($request->ajax())
        {
            $data = Reminder::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('rendezvous.index',compact('find','rends','data'));
    }
    
    public function Actionrendez(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $event = Reminder::create([
                    'user_id'     =>  $request->user_id,
                    'title' =>    $request->title,
                    'start' =>  $request->start,
                    'end'   =>  $request->end,
                ]);

                return response()->json($event);
                //dd($request);
            }

            if($request->type == 'update')
            {
                $event = Reminder::find($request->id)->update([
                    'title' =>    $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end
                ]);

                return response()->json($event);
            }
            if($request->type == 'delete')
            {
                if (\Auth::User()->is_admin) {
                    $event = Reminder::find($request->id)->delete();
                    return response()->json($event);
                }else{
                    return response()->json('Cannot delete this');
                }
            }
    }
    }

    public function createReminder() {
        //$data['findrend'] = Reminder::find($id);
        $data['title'] = "Sjpromoteur SMS reminder";
        $data['rends'] = Reminder::all();
        return view('rendezvous.reminder-create',compact('data'));
    }


    public function storeReminder(Request $request) {

        $validatedData = $request->validate([
            'mobile_no' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'required',
        ]);
        $id = $request->input('r_name');
        //dd($id);
        $mobile_no = $request->input('mobile_no');
        $timezoneoffset = Carbon::parse("{$request->input('date')} {$request->input('time')}");
        $message = $request->input('message');
        //dd($request);
        
        DB::update('update reminders set mobile_no=?,timezoneoffset=?,message=? where id = ?',[$mobile_no,$timezoneoffset,$message,$id]);

    return back()->with('success',"SMS notification est activé pour : {$timezoneoffset}");

    }

}