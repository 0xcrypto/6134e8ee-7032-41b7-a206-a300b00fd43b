<form method="POST" action="{{ route('admin.messages.send') }}" class="form-horizontal" id="message-create-form" novalidate>
    {{ csrf_field() }}
    
    {{ Form::select('recipients', trans('message::attributes.to'), $errors, $users, $message, [ 'labelCol' => 2, 'multiple' => true, 'class' => 'selectize prevent-creation' , 'required' => true]) }}
    {{ Form::text('subject', trans('message::attributes.subject'), $errors, $message, ['labelCol' => 2, 'required' => true]) }}
    {{ Form::wysiwyg('message', trans('message::attributes.message'), $errors, $message, ['labelCol' => 2, 'required' => true]) }}
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-primary" data-loading>
                {{ trans('message::messages.send') }}
            </button>
        </div>
    </div>
    
</form> 

