@push('scripts')
    <script>
        var customerRole = {{ setting('customer_role')}},
            isEditingUser = {{ request()->routeIs('admin.users.edit') ? 1 : 0 }};


        $(document).ready(function(){
            $(".role-select").on('change', function(){ // On role change
                var selectedRole = parseInt($(this).val()[0]);
                if((selectedRole == customerRole)) {
                    $('.staff-info').prop('disabled', true);
                    $('#stores')[0].selectize.disable();
                    $('#customer-id-field').show();
                    $('#validate_staff_information').val(0);
                }
                else{
                    $('.staff-info').prop('disabled', false);
                    $('#stores')[0].selectize.enable();
                    $('#customer-id-field').hide();
                    $('#validate_staff_information').val(1);
                }
            });

            
        });

        //On load
        if(isEditingUser){ // edit user
            var currentRole = {{ count(request()->route()->parameters()) > 0 ? $user->roles()->first()->id : 0 }};
            if(currentRole == customerRole){
                $('.staff-info').prop('disabled', true);
                $('#stores')[0].selectize.disable();
                $('#customer-id-field').show();
                $('#validate_staff_information').val(0);
            }
            else{
                $('.staff-info').prop('disabled', false); 
                $('#stores')[0].selectize.enable();
                $('#customer-id-field').hide();
                $('#validate_staff_information').val(1);
            }
        }
        else{ // create user
            $('.staff-info').prop('disabled', true); 
            $('#stores')[0].selectize.disable();
            $('#customer-id-field').hide(); 
            $('#validate_staff_information').val(0);
        }
    </script>
@endpush

<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="validate_staff_information" id="validate_staff_information">
        <div class="row">
            <div class="col-md-6">
                {{ Form::select('roles', trans('user::attributes.users.roles'), $errors, $roles, $user, ['multiple' => true, 'required' => true, 
                'class' => 'role-select selectize prevent-creation max-items-one']) }}
                <div class="form-group " id="customer-id-field">
                    <label for="customer_id" class="col-md-3 control-label text-left">Customer ID</label>
                    <div class="col-md-9">
                        <input name="customer_id" class="form-control" id="" type="text" value="{{ $user->customer_id }}" >
                    </div>
                </div>
                {{ Form::text('first_name', trans('user::attributes.users.first_name'), $errors, $user, ['required' => true]) }}
                {{ Form::text('last_name', trans('user::attributes.users.last_name'), $errors, $user, ['required' => true]) }}
                {{ Form::select('gender', trans('user::attributes.users.gender.gender'), $errors, $genders, $user, ['required' => true]) }}

                <div class="form-group {{ $errors->has('file') ? 'has-error': ''}}" >
                    <label for="file" class="col-md-3 control-label text-left">{{ trans('user::attributes.users.image') }}<span class="m-l-5 text-red">*</span></label>
                    <div class="col-md-9">
                        <input type="file" name="file" id="file"/>    
                        {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                
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
        @if(request()->routeIs('admin.users.edit'))

        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff_employee_id" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.employee_id') }}</label>
                        <div class="col-md-9">
                            <input name="staff_employee_id" class="form-control staff-info" id="staff[employee_id]" type="text" value="{{ $user->staff_info ? $user->staff_info->employee_id : '' }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('stores') ? 'has-error': ''}}">
                        <label for="stores[]-selectized" class="col-md-3 control-label text-left">{{ trans('user::attributes.users.stores') }}</label>
                        <div class="col-md-9">
                            <select name="stores[]" class="selectize prevent-creation selectized staff-info" multiple="multiple" id="stores" tabindex="-1" style="display: none;">
                                @foreach($stores as $storeId => $storeName)
                                    <option value="{{ $storeId }}" {{ in_array($storeId, $user->stores()->pluck('id')->toArray()) ? 'selected': '' }}>{{ $storeName }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('stores', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('staff_department_id') ? 'has-error': ''}}">
                        <label for="staff_department_id" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.department_id') }}<span class="m-l-5 text-red">*</span></label>
                        <div class="col-md-9">
                            <select name="staff_department_id" class="form-control custom-select-black staff-info" id="staff_department_id">
                                @foreach($departments as $deptId => $deptName)
                                    <option value="{{ $deptId }}"  {{ ($user->staff_info && $user->staff_info->department_id == $deptId) ? 'selected': '' }}>{{ $deptName }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('staff_department_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group  {{ $errors->has('staff_senior_id') ? 'has-error': ''}}">
                        <label for="staff_senior_id" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.senior_id') }}<span class="m-l-5 text-red">*</span></label>
                        <div class="col-md-9">
                            <select name="staff_senior_id" class="form-control custom-select-black staff-info" id="staff_senior_id">
                                @foreach($seniors as $seniorId => $seniorName)
                                    <option value="{{ $seniorId }}"  {{ ($user->staff_info && $user->staff_info->senior_id == $seniorId) ? 'selected': '' }}>{{ $seniorName }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('staff_senior_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="staff_job_type" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.job_type') }}<span class="m-l-5 text-red">*</span></label>
                        <div class="col-md-9">
                            <select name="staff_job_type" class="form-control custom-select-black staff-info" id="staff_job_type">
                                <option value="0" {{ ($user->staff_info && $user->staff_info->department_id == 0) ? 'selected': '' }}>{{ trans('user::staff.job_types.in_store') }}</option>
                                <option value="1" {{ ($user->staff_info && $user->staff_info->department_id == 1) ? 'selected': '' }}>{{ trans('user::staff.job_types.out_store')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  {{ $errors->has('staff_joining_date') ? 'has-error': ''}}">
                        <label for="staff_joining_date" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.joining_date') }}<span class="m-l-5 text-red">*</span></label>
                        <div class="col-md-9">
                            <input id="staff_joining_date" name="staff_joining_date" class="form-control datetime-picker flatpickr-input form-control input staff-info" placeholder="" type="text" readonly="readonly" value="{{ $user->staff_info ? $user->staff_info->joining_date : '' }}">
                            {!! $errors->first('staff_joining_date', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="staff_device_id" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.device_id') }}</label>
                        <div class="col-md-9"><input name="staff_device_id" class="form-control staff-info" id="staff_device_id" type="text" value="{{ $user->staff_info ? $user->staff_info->device_id : '' }}"></div>
                    </div>
                    <div class="form-group ">
                        <label for="staff_address" class="col-md-3 control-label text-left">{{ trans('user::attributes.staffs.address') }}</label>
                        <div class="col-md-9"><textarea name="staff_address" class="form-control staff-info" id="staff_address" rows="10" cols="10">{{ $user->staff_info ? $user->staff_info->address : '' }}</textarea></div>
                    </div>
                </div>
            </div>
        @endif

        @if(request()->routeIs('admin.users.create'))
            <div class="row" id="staff-info">
                <div class="col-md-6">
                    {{ Form::text('staff_employee_id', trans('user::attributes.staffs.employee_id'), $errors, $user, ['required' => true, 'class'=> 'staff-info']) }}
                    {{ Form::select('stores', trans('user::attributes.users.stores'), $errors, $stores, $user, ['multiple' => true, 'required' => true, 'class' => 'selectize prevent-creation', 'id'=> 'stores']) }}
                    {{ Form::select('staff_department_id', trans('user::attributes.staffs.department_id'), $errors, $departments, $user, ['required' => true, 'class'=> 'staff-info']) }}
                    {{ Form::select('staff_senior_id', trans('user::attributes.staffs.senior_id'), $errors, $seniors, $user, ['required' => true, 'class'=> 'staff-info']) }}
                    {{ Form::select('staff_job_type', trans('user::attributes.staffs.job_type'), $errors, $job_types, $user, ['required' => true, 'class'=> 'staff-info']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::text('staff_joining_date', trans('user::attributes.staffs.joining_date'), $errors, $user, ['class' => 'datetime-picker staff-info']) }}
                    {{ Form::text('staff_device_id', trans('user::attributes.staffs.device_id'), $errors, $user, ['class'=> 'staff-info']) }}
                    {{ Form::textarea('staff_address', trans('user::attributes.staffs.address'), $errors, $user, ['class'=> 'staff-info']) }}
                </div>
            </div>
        @endif
        
    </div>

    @if (request()->routeIs('admin.users.edit'))
        {{ Form::checkbox('activated', trans('user::attributes.users.activated'), trans('user::users.form.activated'), $errors, $user, ['disabled' => $user->id === $currentUser->id, 'checked' => old('activated', $user->isActivated())]) }}
    @endif
</div>