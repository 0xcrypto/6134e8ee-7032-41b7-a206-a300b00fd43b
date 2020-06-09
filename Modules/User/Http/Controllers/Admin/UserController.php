<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Modules\User\Entities\Staff;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\User\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
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
        if((int)$request->validate_staff_information == 1){ 
            $validator = Validator::make($request->all(), [
                'stores' => 'required',
                'staff_joining_date' => 'required|date_format:Y-m-d|before:today',
                'staff_senior_id' => ['nullable', Rule::exists('users', 'id')],
                'staff_department_id' => ['required', Rule::exists('departments', 'id')]
            ], [
                'stores.required' => 'The stores field is required.',
                'staff_joining_date.required' => 'The Joining Date field is required.',
                'staff_joining_date.date_format' => 'The Job Type field should be valid date.',
                'staff_joining_date.before' => 'The Job Type field should be date before today.',
                'staff_senior_id.required' => 'The Senior field is required.',
                'staff_department_id.required' => 'The Department field is required.'
            ]);

            $validator->validate();
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = Storage::putFile('media', $file);
            $request->merge(['image' => $path ]);
        }

        if((int)$request->roles[0] == (int)setting('customer_role')){
            $request->merge([ 'reward_points' => (int)setting('user_registration_reward_points')]);
        }

        $request->merge([ 'password' => bcrypt($request->password), 'created_by' => auth()->user()->id ]);

        $user = User::create($request->all());

        $user->roles()->attach($request->roles);
        $user->stores()->attach($request->stores);

        if($request->get('staff_department_id')){
            Staff::create([
                'user_id' => $user->id,
                'employee_id' => $request->input('staff_employee_id'),
                'department_id' => $request->input('staff_department_id'),
                'job_type' => $request->input('staff_job_type'),
                'joining_date' => $request->input('staff_joining_date'),
                'senior_id' => $request->input('staff_senior_id'),
                'device_id' => $request->input('staff_device_id'),
                'address' => $request->input('staff_address')
            ]);
        }

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

        if((int)$request->validate_staff_information == 1){ 
            $validator = Validator::make($request->all(), [
                'stores' => 'required',
                'staff_joining_date' => 'required|date_format:Y-m-d|before:today',
                'staff_senior_id' => ['nullable', Rule::exists('users', 'id')],
                'staff_department_id' => ['required', Rule::exists('departments', 'id')]
            ], [
                'stores.required' => 'The stores field is required.',
                'staff_joining_date.required' => 'The Joining Date field is required.',
                'staff_joining_date.date_format' => 'The Job Type field should be valid date.',
                'staff_joining_date.before' => 'The Job Type field should be date before today.',
                'staff_senior_id.required' => 'The Senior field is required.',
                'staff_department_id.required' => 'The Department field is required.'
            ]);

            $validator->validate();
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = Storage::putFile('media', $file);
            $request->merge(['image' => $path ]);
        }

        if (is_null($request->password)) {
            unset($request['password']);
        } else {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $user->update($request->all());
        $user->roles()->sync($request->roles);
        $user->stores()->sync($request->stores);

        if((int)$request->validate_staff_information == 1 ){
            
        if (Staff::where('user_id', $user->id)->exists()) {
            $staff = Staff::where('user_id', '=', $user->id);
                $staff->update([
                    'employee_id'=>$request->input('staff_employee_id'),
                    'department_id'=>$request->input('staff_department_id'),
                    'job_type'=>$request->input('staff_job_type'),
                    'joining_date'=>$request->input('staff_joining_date'),
                    'senior_id'=>$request->input('staff_senior_id'),
                    'device_id'=>$request->input('staff_device_id'),
                    'address'=>$request->input('staff_address')
                ]);
            }
            else{
                Staff::create([
                    'user_id'=>$user->id,
                    'employee_id'=>$request->input('staff_employee_id'),
                    'department_id'=>$request->input('staff_department_id'),
                    'job_type'=>$request->input('staff_job_type'),
                    'joining_date'=>$request->input('staff_joining_date'),
                    'senior_id'=>$request->input('staff_senior_id'),
                    'device_id'=>$request->input('staff_device_id'),
                    'address'=>$request->input('staff_address')
                ]);
            }
        }

        if (! Activation::completed($user) && $request->activated === '1') {
            Activation::complete($user, Activation::create($user)->code);
        }

        if (Activation::completed($user) && $request->activated === '0') {
            return Activation::remove($user);
        }

        return redirect()->route('admin.users.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('user::users.user')]));
    }

    public function getCustomerNameAndEmail($id){
        $user = User::where('customer_id', '=', $id)->first();

        if($user){
            return response()->json([
                'data' => ['name' => $user->full_name, 'email' => $user->email ],
            ]);
        }

        return response()->json([
            'data' => [],
            'message' => 'DETAIL_NOT_FOUND'
        ]);
        
    }
}
