@push('scripts')
    <script>
        var customerRole = {{ setting('customer_role')}},
            isEditingUser = {{ request()->routeIs('admin.users.edit') ? 1 : 0 }};

        $(document).ready(function(){
            $(".role-select").on('change', function(){ 
                var selectedRole = parseInt($(this).val());
                if((selectedRole == customerRole)) {
                    $('.staff-fields').hide()
                }
                else{
                    $('.staff-fields').show()
                }
            });
        });

        
        if(!isEditingUser){
            var currentRole = {{ isset($user) ?? $user->roles()->first()->id }};
            if(currentRole == customerRole){
                $('.staff-fields').hide();
            }
        }

    </script>
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label text-left"> {{ trans('user::attributes.users.user_id') }} </label>
                    <div class="col-md-9">{{ $user->user_id }}</div>
                </div>
                {{ Form::select('roles', trans('user::attributes.users.roles'), $errors, $roles, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation max-items-one role-select']) }}
                {{ Form::text('first_name', trans('user::attributes.users.first_name'), $errors, $user, ['required' => true]) }}
                {{ Form::text('last_name', trans('user::attributes.users.last_name'), $errors, $user, ['required' => true]) }}
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
        <div class="row staff-fields">
            <div class="col-md-6">
                {{ Form::select('senior_id', trans('user::attributes.users.senior_id'), $errors, $seniors, $user) }}
            </div>
            <div class="col-md-6">
                {{ Form::select('stores', trans('user::attributes.users.stores'), $errors, $stores, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation']) }}
            </div>
            <div class="col-md-12">
                {{ Form::checkbox('is_direct_commission_user', trans('user::attributes.users.is_direct_commission_user'), trans('user::users.check_this_if_user_recieve_direct_commission'), $errors, $user) }}
            </div>
        </div>
        </div>
        @if (request()->routeIs('admin.users.edit'))
            {{ Form::checkbox('activated', trans('user::attributes.users.activated'), trans('user::users.form.activated'), $errors, $user, ['disabled' => $user->id === $currentUser->id, 'checked' => old('activated', $user->isActivated())]) }}
        @endif
    </div>
</div>


