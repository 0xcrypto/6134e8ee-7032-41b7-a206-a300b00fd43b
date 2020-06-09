<div class="row">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                {{ Form::text('customer_id', trans('ticket::attributes.form.customer_id'), $errors, $ticket, ['readonly' => request()->routeIs('admin.tickets.edit')] ) }}
            </div>
            <div class="col-md-6">
                {{ Form::text('customer_name', trans('ticket::attributes.form.customer_name'), $errors, $ticket, ['readonly' => request()->routeIs('admin.tickets.edit')]) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                {{ Form::text('customer_email', trans('ticket::attributes.form.customer_email'), $errors, $ticket, ['readonly' => request()->routeIs('admin.tickets.edit')]) }}
            </div>
            <div class="col-md-6">
                {{ Form::select('department_id', trans('ticket::attributes.form.department_id'), $errors, $departments, $ticket, ['required' => true]) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                {{ Form::select('service_id', trans('ticket::attributes.form.service_id'), $errors, $services, $ticket, ['required' => true]) }}
            </div>
            <div class="col-md-6">
                {{ Form::select('status_id', trans('ticket::attributes.form.status_id'), $errors, $statuses, $ticket, ['required' => true]) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                {{ Form::select('priority_id', trans('ticket::attributes.form.priority_id'), $errors, $priorities, $ticket, ['required' => true]) }}
            </div>
            <div class="col-md-6">
                {{ Form::select('store_id', trans('ticket::attributes.form.store_id'), $errors, $stores, $ticket, ['required' => true]) }}
            </div>
        </div>
        @if(request()->routeIs('admin.tickets.edit'))
        <div class="col-md-12">
            <div class="col-md-6">
                {{ Form::select('assigned_to', trans('ticket::attributes.form.assigned_to'), $errors, $staffs, $ticket, ['required' => true]) }}
            </div>
            <div class="col-md-6">
               
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-12">
        {{ Form::text('subject', trans('ticket::attributes.form.subject'), $errors, $ticket, ['labelCol' => 2, 'required' => true, 'readonly' => request()->routeIs('admin.tickets.edit')]) }}
        {{ Form::wysiwyg('description', trans('ticket::attributes.form.description'), $errors, $ticket, ['labelCol' => 2]) }}
    </div>
</div>