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
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> Action <span class="caret"></span> </button>
                <ul class="dropdown-menu" role="menu">
                    <!--
                    <li><a href="#">Mark as read</a></li>
                    <li><a href="#">Mark as unread</a></li>
                    <li><a href="#">Mark as important</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Report spam</a></li>
                    -->
                    <li><a href="#">Delete</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 search-form">
            <form action="#" class="text-right">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search">
                    <span class="input-group-btn"> 
                        <button type="submit" name="search" class="btn_ btn-primary btn-sm search">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach ($inbox_mails as $mail)
                <tr class="{{ $mail->recipients->keyBy('user_id')->get(auth()->user()->id)->is_read == 1 ? 'read' : ''}}"> 
                        <td class="action"><input type="checkbox" /></td>
                        <td class="name">{{ $mail->sender->full_name }}</td>
                        <td class="subject">{{ \Illuminate\Support\Str::limit($mail->subject, 80, $end='...') }}</a></td>
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
    <ul class="pagination">
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>