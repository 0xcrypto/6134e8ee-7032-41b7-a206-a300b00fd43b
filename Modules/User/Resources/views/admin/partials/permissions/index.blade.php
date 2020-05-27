<div class="row">
    <div class="col-lg-9 col-md-12">
        <div class="col-md-4">{{ trans('user::roles.permissions.select_unselect') }}</div>
        <div class="col-md-8 col-sm-8">
            <div class="col-md-3">
                <span class="btn btn-default"><input type="checkbox" class="btn-index-all"> {{ trans('admin::admin.route.list') }}</span>
            </div>
            <div class="col-md-3">
                <span class="btn btn-default"><input type="checkbox" class="btn-create-all"> {{ trans('admin::admin.route.create') }}</span> 
            </div>
            <div class="col-md-3">
                <span class="btn btn-default"><input type="checkbox" class="btn-edit-all"> {{ trans('admin::admin.route.edit') }}</span>
            </div>
            <div class="col-md-3">
                <span class="btn btn-default"><input type="checkbox" class="btn-destroy-all"> {{ trans('admin::admin.route.delete') }}</span>
            </div>
        </div>
    </div>
</div>
@foreach ($permissions as $module => $modulePermissions)
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="col-md-4">
                <div class="row">
                    <div class="permission-parent-head clearfix">
                        <h3>{{ $module }}</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            @foreach ($modulePermissions as $group => $groupPermissions)
                <div class="permission-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <h4>{{ $group }}</h4>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="row">
                                @include('user::admin.partials.permissions.actions')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
