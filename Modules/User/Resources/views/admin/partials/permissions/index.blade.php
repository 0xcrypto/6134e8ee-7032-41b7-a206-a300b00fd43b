<div class="row">
    <div class="col-md-4" style="line-height: 35px;">{{ trans('user::roles.permissions.select_unselect') }}</div>
    <div class="col-md-8">
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
@foreach ($permissions as $module => $modulePermissions)
    <div class="row">
        <div class="permission-parent-head clearfix">
            <h3>{{ $module }}</h3>
        </div>
        @foreach ($modulePermissions as $group => $groupPermissions)
            <div class="permission-group">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <p>{{ $group }}</p>
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
@endforeach
