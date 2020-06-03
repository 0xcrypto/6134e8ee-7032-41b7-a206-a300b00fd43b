@push('scripts')
    <script>
        var customerRole = {{ setting('customer_role')}},
            isEditingUser = {{ request()->routeIs('admin.users.edit') ? 1 : 0 }};

        $(document).ready(function(){
            $(".role-select").on('change', function(){ debugger;
                var selectedRole = parseInt($(this).val());
                if((selectedRole == customerRole)) {
                    $('#staff-info').hide()
                }
                else{
                    $('#staff-info').show()
                }
            });
        });

        
        if(!isEditingUser){
            var currentRole = {{ isset($user) ?? $user->roles()->first()->id }};
            if(currentRole == customerRole){
                $('#staff-info').hide();
            }
        }
    </script>
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{ Form::select('roles', trans('user::attributes.users.roles'), $errors, $roles, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation max-items-one role-select']) }}
                {{ Form::text('customer_id', trans('user::attributes.users.customer_id'), $errors, $user) }}
                {{ Form::text('first_name', trans('user::attributes.users.first_name'), $errors, $user, ['required' => true]) }}
                {{ Form::text('last_name', trans('user::attributes.users.last_name'), $errors, $user, ['required' => true]) }}
                {{ Form::select('gender', trans('user::attributes.users.gender.gender'), $errors, $genders, $user, ['required' => true]) }}
            </div>
            <div class="col-md-6">
                <div class="">
                    {{ Form::text('mobile', trans('user::attributes.users.mobile'), $errors, $user, ['required' => true]) }}
                    {{ Form::email('email', trans('user::attributes.users.email'), $errors, $user, ['required' => true]) }}
                    @if (request()->routeIs('admin.users.create'))
                        {{ Form::password('password', trans('user::attributes.users.password'), $errors, null, ['required' => true]) }}
                        {{ Form::password('password_confirmation', trans('user::attributes.users.password_confirmation'), $errors, null, ['required' => true]) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row" id="staff-info">
            <div class="col-md-6">
                {{ Form::text('staff[employee_id]', trans('user::attributes.staffs.staff_id'), $errors, $user, ['required' => true]) }}
                {{ Form::select('stores', trans('user::attributes.users.stores'), $errors, $stores, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation']) }}
                {{ Form::select('staff[department_id]', trans('user::attributes.staffs.department_id'), $errors, $departments, $user, ['required' => true]) }}
                {{ Form::select('staff[senior_id]', trans('user::attributes.staffs.senior_id'), $errors, $seniors, $user, ['required' => true]) }}
                {{ Form::select('staff[job_type]', trans('user::attributes.staffs.job_type'), $errors, $job_types, $user, ['required' => true]) }}
            </div>
            <div class="col-md-6">
                {{ Form::text('staff[joining_date]', trans('user::attributes.staffs.joining_date'), $errors, $user, ['class' => 'datetime-picker']) }}
                {{ Form::text('staff[device_id]', trans('user::attributes.staffs.device_id'), $errors, $user) }}
                {{ Form::textarea('staff[address]', trans('user::attributes.staffs.address'), $errors, $user) }}
            </div>
        </div>
    </div>

        @if (request()->routeIs('admin.users.edit'))
            {{ Form::checkbox('activated', trans('user::attributes.users.activated'), trans('user::users.form.activated'), $errors, $user, ['disabled' => $user->id === $currentUser->id, 'checked' => old('activated', $user->isActivated())]) }}
        @endif
    </div>
</div>