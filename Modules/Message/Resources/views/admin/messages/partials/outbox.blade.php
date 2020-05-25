@push('styles')
    <style>
        .email table tr.read > td{
            background-color: #f6f6f6;
        }
    </style>
@endpush
<div class="email">
    <div class="row">
        <div class="col-sm-6">
            <label style="margin-right: 8px;" class="">
                <div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" id="check-all" class="icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
            </label>
            <div class="btn-group">
                <form method="POST" action="{{ route('admin.messages.outbox.delete') }}" class="form-horizontal" id="message-create-form" novalidate>
                    {{ csrf_field() }}
                    
                   <input type="hidden" name="mail_ids" id="outbox_mail_ids">
                   <button class="btn btn-light btn-outbox-delete" type="submit" disabled>
                       <i class="fa fa-trash"></i> {{ trans('message::messages.delete') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="col-md-6 search-form">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="Search" id="txtSearchStringOutbox" value="{{ $searchString }}">
                <span class="input-group-btn"> 
                    <button type="button" id="buttonOutboxSearch" name="search" class="btn_ btn-primary btn-sm search">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach ($outbox_mails as $mail)
                    <tr class="read">
                        <td class="action"><input type="checkbox" class="out-checkbox" value="{{ $mail->id }}"/></td>
                        <td class="name">To:
                            @foreach ($mail->recipients->slice(0, 3) as $recipient)
                                {{ $loop->first ? '' : ',' }}
                                {{ $recipient->receiver->full_name }}
                            @endforeach
                        </td>
                        <td class="subject">
                            <a href="{{route('admin.messages.show', array('currentTab'=>'outbox', 'id'=>$mail->id, 'total_inbox'=> $total_inbox )) }}">
                                {{ \Illuminate\Support\Str::limit($mail->subject, 50, $end='...') }}
                            </a>
                        </td>
                        <td class="time">
                            @if(strtotime($mail->created_at) > strtotime(date('Y-m-d H:i:s')) + 86400)         
                                {{ date('d/m/Y', strtotime($mail->created_at)) }}
                            @else
                                {{ date('h:i A', strtotime($mail->created_at)) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{ $outbox_mails->links() }}
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#buttonOutboxSearch').click(function(){
                var searchString = $('#txtSearchStringOutbox').val();
                window.location.href = "{{ route('admin.messages.index', array('currentTab'=>'outbox')) }}/"+encodeURI(searchString);
            });

            $(".out-checkbox").click(function(){ 
                $('#outbox_mail_ids').val(getSelectedMails('out'));
                $('.btn-outbox-delete').prop('disabled', $('input.out-checkbox:checked').length == 0);
            });
        });

        function getSelectedMails(type){
            var Ids = [];
            $('.' + type + '-checkbox').each(function(input, index){
                if($(this).is(':checked')){
                    Ids.push(parseInt($(this).val()));
                }
            });
                
            return Ids.join(',');
        }
    </script>
@endpush
