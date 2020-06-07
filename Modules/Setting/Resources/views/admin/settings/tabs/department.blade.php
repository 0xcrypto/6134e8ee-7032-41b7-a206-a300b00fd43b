<div id="department-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th>{{ trans('setting::departments.attributes.name') }}</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="departments">
                {{-- Departments will be added here dynamically using JS --}}
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-department">
        {{ trans('setting::departments.form.add_department') }}
    </button>
</div>

@include('setting::admin.settings.tabs.templates.department')

@push('globals')
    <script>
        FleetCart.data['departments'] = @json($departments);
        FleetCart.errors['departments'] = @json($errors->get('departments.*'), JSON_FORCE_OBJECT);
    </script>
@endpush
