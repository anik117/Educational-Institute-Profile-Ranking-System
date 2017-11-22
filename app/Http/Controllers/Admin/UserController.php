<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\Area;
use App\School;
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
        if (!empty($keyword)) {
            $user = User::where('name','LIKE',"%$keyword%")->paginate($perPage);
        } else {
            $user = User::paginate($perPage);
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

        // //generate a password for the new users
        // $pw = User::generatePassword();
        
        // $user = new User;
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = $pw;
        // $user->save();
        $user->assignRole($roles);
        // User::sendWelcomeEmail($user);
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