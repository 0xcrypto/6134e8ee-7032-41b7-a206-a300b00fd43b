@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endpush

<form method="POST" action="{{ route('admin.messages.send') }}" class="form-horizontal" id="message-create-form" novalidate>
    {{ csrf_field() }}
    
    {{ Form::select('recipients', trans('message::attributes.to'), $errors, $users, $message, [ 'labelCol' => 2, 'multiple' => true, 'class' => 'select2', 'required' => true]) }}
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


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                'width': '100%'
            });
        })
    </script>
@endpush

