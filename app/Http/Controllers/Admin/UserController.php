<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\Area;
use App\AreaHead;
use App\School;
use App\Headmaster;
use Illuminate\Http\Request;
use Validator;
use Redirect;
class UserController extends Controller
{
    use ResetsPasswords;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (auth()->user()->hasRole('ah')) {
            $ah = AreaHead::where('user_id', auth()->user()->id)->first();
            $schoolIds = School::where('area_id', $ah->area_id)->pluck('id');
            $useIds = Headmaster::whereIn('school_id', $schoolIds)->pluck('user_id');
            $user = User::whereIn('id', $useIds)->where('name','LIKE',"%$keyword%")->paginate($perPage);
            return view('admin.user.index', compact('user'));
        }

        $user = null;
        if(auth()->user()->hasRole('ah')) $user = User::role('hm');
        if (!empty($keyword)) {
            if($user == null) $user = User::where('name','LIKE',"%$keyword%")->paginate($perPage);
            else $user = $user->where('name','LIKE',"%$keyword%")->paginate($perPage);

        } else {
            if($user == null) $user = User::paginate($perPage);
            else $user = $user->paginate($perPage);
        }
        return view('admin.user.index', compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $areas=Area::get()->pluck('thana','thana');
        // $schools=School::get()->pluck('name','name');
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = $request->validate([
          'name' => 'required|string',
          'email'=> 'required|string|email|max:255|unique:users',
          'password'=> 'required|string|min:6',
          'roles'=> 'required'
        ]);

        $requestData = $request->except('roles');
        $roles=$request->roles;
        
        $user =  User::create($requestData);

        //   $validator = Validator::make($request->all(), [
        //     'name'  => 'required|max:255',
        //     'email' => 'required|email|unique:users',
        // ]);

        // // If validator fails, short circut and redirect with errors
        // if($validator->fails()){
        // return back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        
        $user->assignRole($roles);
        User::sendWelcomeEmail($requestData);
        return redirect('admin/user')->with('flash_message', 'User added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $areas=Area::get()->pluck('thana','thana');
        $schools=School::get()->pluck('name','name');
        return view('admin.user.edit', compact('user', 'areas', 'schools'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->update($requestData);
        $user->syncRoles($request->roles);
        return redirect('admin/user')->with('flash_message', 'User updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/user')->with('flash_message', 'User deleted!');
    }
}