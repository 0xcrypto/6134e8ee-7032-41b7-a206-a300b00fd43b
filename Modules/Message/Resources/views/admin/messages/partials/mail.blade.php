<div class="panel mail-wrapper rounded shadow">
        <!--
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title"></h3>
            </div>
            <div class="clearfix"></div>
        </div>
        -->
        <div class="panel-sub-heading inner-all">
        <div class="pull-left">
            <h3 class="lead no-margin">{{ $mail->subject }}</h3>
        </div>
        <!--
        <div class="pull-right"> 
            <button class="btn btn-info btn-sm tooltips" data-container="body" data-original-title="Print" type="button" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-print"></i> </button> 
            <button class="btn btn-danger btn-sm tooltips" data-container="body" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-trash-o"></i></button> 
            <a href="#mail-compose.html" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Reply</a>
        </div>
           -->
        <div class="clearfix"></div>
    </div>
    <hr>
    <div class="panel-sub-heading inner-all">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-7"> 
                @if( $currentTab == 'inbox')
                    <strong>{{ $mail->sender->full_name }}</strong> to <strong>me</strong>
                @elseif( $currentTab == 'outbox')
                    <strong>me</strong> to <strong>
                    @foreach ($mail->recipients as $recipient)
                        {{ $loop->first ? '' : ',' }}
                        {{ $recipient->receiver->full_name }}
                    @endforeach
                    </strong>
                @endif
                
            </div>
            <div class="col-md-4 col-sm-4 col-xs-5">
                <p class="pull-right">
                    @if(strtotime($mail->created_at) > strtotime(date('Y-m-d H:i:s')) + 86400)         
                        {{ date('d/m/Y', strtotime($mail->created_at)) }}
                    @else
                        {{ date('h:i A', strtotime($mail->created_at)) }}
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="view-mail">
            {!! $mail->body !!}
        </div>
        <!--
        <div class="attachment-mail">
            <p> <span><i class="fa fa-paperclip"></i> 3 attachments — </span> <a href="#">Download all attachments</a> | <a href="#">View all images</a></p>
            <ul>
                <li>
                    <a class="atch-thumb" href="#" data-toggle="modal" data-target=".bs-example-modal-photo1"> <img src="https://via.placeholder.com/200x200/" alt="..."> </a><a class="name" href="#"> IMG_001.jpg <span>20KB</span> </a>
                    <div class="links"> <a href="#" data-toggle="modal" data-target=".bs-example-modal-photo1">View</a> - <a href="#">Download</a></div>
                </li>
                <li>
                    <a class="atch-thumb" href="#" data-toggle="modal" data-target=".bs-example-modal-photo2"> <img src="https://via.placeholder.com/200x200/" alt="..."> </a><a class="name" href="#"> IMG_002.jpg <span>15KB</span> </a>
                    <div class="links"> <a href="#" data-toggle="modal" data-target=".bs-example-modal-photo2">View</a> - <a href="#">Download</a></div>
                </li>
                <li>
                    <a class="atch-thumb" href="#" data-toggle="modal" data-target=".bs-example-modal-photo3"> <img src="https://via.placeholder.com/200x200/" alt="..."> </a><a class="name" href="#"> IMG_003.jpg <span>13KB</span> </a>
                    <div class="links" data-toggle="modal" data-target=".bs-example-modal-photo3"> <a href="#">View</a> - <a href="">Download</a></div>
                </li>
            </ul>
        </div>
        -->
    </div>
    <div class="panel-footer">
        <div class="pull-right">&nbsp;
            <!--
            <button class="btn btn-info btn-sm tooltips" data-container="body" data-original-title="Print" type="button" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-print"></i> </button> 
            <button class="btn btn-danger btn-sm tooltips" data-container="body" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-trash-o"></i></button> 
            <a href="#mail-compose.html" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Reply</a>
            -->
        </div>
        <div class="clearfix"></div>
    </div>
</div>