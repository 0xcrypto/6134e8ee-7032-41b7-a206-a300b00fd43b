<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\User\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class UserController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'user::users.user';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'user::admin.users';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveUserRequest::class;

    /**
     * Display a listing of the users.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    { 
        if ($request->has('table')) {
            $users = new User;
            return $users->table($request);
        }

        return view("{$this->viewPath}.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\User\Http\Requests\SaveUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password), 
            'user_id' => User::getUniqueId(6),
            'created_by' => auth()->user()->id
        ]);
        
        $user = User::create($request->all());

        $user->roles()->attach($request->roles);
        $user->stores()->attach($request->stores);

        Activation::complete($user, Activation::create($user)->code);

        return redirect()->route('admin.users.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('user::users.user')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Modules\User\Http\Requests\SaveUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaveUserRequest $request)
    {
        $user = User::findOrFail($id);

        if (is_null($request->password)) {
            unset($request['password']);
        } else {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $user->update($request->all());

        $user->roles()->sync($request->roles);
        $user->stores()->sync($request->stores);

        if (! Activation::completed($user) && $request->activated === '1') {
            Activation::complete($user, Activation::create($user)->code);
        }

        if (Activation::completed($user) && $request->activated === '0') {
            return Activation::remove($user);
        }

        return redirect()->route('admin.users.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('user::users.user')]));
    }
}
