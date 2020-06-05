<div class="row">
    <div class="col-sm-8">
        {{ Form::text('name', trans('user::attributes.roles.name'), $errors, $role, ['required' => true]) }}
        <div class="form-group ">
                <label for="" class="col-md-3 control-label text-left">{{ trans('user::attributes.roles.accessible_roles') }}</label>
                <div class="col-md-9">

                @php
                    $selectedRoles = [];
                    if(request()->routeIs('admin.roles.edit')){
                        $selectedRoles = DB::table('role_accessibilites')->where('role_id', '=', $role->id)->pluck('accessible_role_id')->toArray();
                    }
                @endphp

                @foreach($roles as $id=>$name)
                    <p><input type="checkbox" name="accessible_roles[]" value="{{ $id }}" {{ in_array($id, $selectedRoles) ? 'checked': '' }}> {{ $name }}</p>
                @endforeach
            </div>
        </div>
        {{ Form::checkbox('is_direct_commission_applicable', trans('user::attributes.roles.is_direct_commission_applicable'), trans('user::attributes.roles.check_this_if_role_recieve_direct_commission'), $errors, $role) }}
    </div>        
</div>
