<div class="email">
    <div class="row">
        <div class="col-sm-6">
            <label style="margin-right: 8px;" class="">
                <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" id="check-all" class="icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                </div>
            </label>
            <div class="btn-group">
                <form method="POST" action="{{ route('admin.messages.inbox.delete') }}" class="form-horizontal" id="message-create-form" novalidate>
                    {{ csrf_field() }}
                    
                   <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                   <input type="hidden" name="mail_ids" id="inbox_mail_ids">
                   <button class="btn btn-light btn-inbox-delete" type="submit" disabled>
                       <i class="fa fa-trash"></i> {{ trans('message::messages.delete') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="col-md-6 search-form">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="Search" id="txtSearchStringInbox" value="{{ $searchString }}">
                <span class="input-group-btn"> 
                    <button type="button" id="buttonInboxSearch" name="search" class="btn_ btn-primary btn-sm search">
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
                @foreach ($inbox_mails as $mail)
                    <tr class="{{ $mail->recipients->keyBy('user_id')->get(auth()->user()->id)->is_read == 1 ? 'read' : ''}}"> 
                        <td class="action"><input type="checkbox" class="in-checkbox" value="{{ $mail->id }}"/></td>
                        <td class="name">{{ $mail->sender->full_name }}</td>
                        <td class="subject">
                            <a href="{{ route('admin.messages.show', array('currentTab'=>'inbox', 'id'=>$mail->id, 'total_inbox'=> $total_inbox )) }}">
                                {{ \Illuminate\Support\Str::limit($mail->subject, 80, $end='...') }}
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
    {{ $inbox_mails->links() }}
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#buttonInboxSearch').click(function(){
                var searchString = $('#txtSearchStringInbox').val();
                window.location.href = "{{ route('admin.messages.index', array('currentTab'=>'inbox')) }}/"+encodeURI(searchString);
            });

            $(".in-checkbox").click(function(){
                $('#inbox_mail_ids').val(getSelectedMails('in'));
                $('.btn-inbox-delete').prop('disabled', $('input.in-checkbox:checked').length == 0);
            });
        })
    </script>
@endpush
