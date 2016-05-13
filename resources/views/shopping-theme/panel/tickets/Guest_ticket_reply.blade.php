@extends('guest_ticket')
@section('content')

    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <div class="pull-right box-tools">
                        {{trans('ticket.id')}} : {{$findTicket->public_id}}
                    </div>
                    <h3 class="box-title"><i class="icon-menu"></i>
                        <span>{{trans('ticket.title')}} : {{$findTicket->title}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="rwd-table">
                        <tr class="text-right">
                            <th>{{trans('ticket.created')}}</th>
                            <th>{{trans('ticket.updated')}}</th>
                            <th>{{trans('ticket.priority')}}</th>
                            <th>{{trans('ticket.status')}}</th>
                        </tr>
                        <tr>
                            <td data-th="{{trans('ticket.created')}}"
                                title="&lrm;{{jalaliDate($findTicket->created_at, 'YYYY-MM-dd HH:mm:ss')}}">&lrm;{{jalaliDate($findTicket->created_at, 'YYYY-MM-dd')}}</td>
                            <td data-th="{{trans('ticket.updated')}}"
                                title="&lrm;{{jalaliDate($findTicket->updated_at, 'YYYY-MM-dd HH:mm:ss')}}">&lrm;{{jalaliDate($findTicket->updated_at, 'YYYY-MM-dd')}}</td>
                            <td data-th="{{trans('ticket.priority')}}">{{trans('ticket.ticket_priority_'.$findTicket->priority)}}</td>
                            <td data-th="{{trans('ticket.status')}}"
                                @if($findTicket->status == 0)
                                style="color: green"
                                @elseif($findTicket->status == 1)
                                style="color: black"
                                @elseif($findTicket->status == 2)
                                style="color: orange"
                                @else
                                style="color: darkgray"
                                    @endif
                            >{{trans('ticket.ticket_status_'.$findTicket->status)}}
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- end .timeline -->
            </div>
            <!-- box -->
        </div>
    </div>

    <div class="row">

        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title"><i class="icon-menu"></i>
                        <span>{{trans('ticket.guestReply')}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">

                    <div class="row">
                        <div class="large-12 columns">
                            <div class="inbox-nest">
                                <ul>
                                    @foreach($findTicket->TicketReplies as $ticketReply)
                                        <li>
                                            <img class="img-circle star"
                                                 src="//rokh.chehrak.com/{{md5($ticketReply->userEmail)}}?default=https://cdn.zarinpal.com/emails/img/zarinpal-email-profile-default.png">
                                            <b>{{$ticketReply->userName}}
                                                @if(!empty($ticketReply->User->company_rid))
                                                    ({{$ticketReply->User->company_name}})
                                                @endif
                                            </b>
                                            <small>{{jalaliDate($ticketReply->created_at,'YYYY-MM-dd')}}</small>
                                            <p class="bbcode">
                                                {!! nl2br(e($ticketReply->content)) !!}
                                            </p>
                                            @if($ticketReply->attachment)
                                                <a href="{{ftpLink("/".$ticketReply->attachment, 30)}}">{{trans('ticket.downloadFile')}}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                    <a id="reply" type="hidden"></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end .timeline -->
                </div>
                <!-- box -->
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <div class="box">
                    <div class="box-header bg-transparent">
                        <h3 class="box-title"><i class="icon-menu"></i>
                            <span>{{trans('ticket.guestReply')}}</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        {!! Form::open(['route' => ['home.guestTicket.postReply', base64_encode($email), base64_encode($publicId)],'files'=>true])!!}
                        {!! Form::textareaField('content', trans('ticket.content'), null,['rows' => 7]) !!}
                        {!! Form::file('attachment') !!}
                        @if ($errors = Session::get ( 'errors' ))
                            <span class="label label-danger">{{ $errors->first ( 'attachment' ) }}</span>
                        @endif
                        {!! Form::submit(trans('ticket.reply'), ['class'=>'button radius small bg-blue']) !!}
                        {!! Form::close() !!}
                        @if($findTicket->status < 3)

                            {!! Form::open(['action' => ['Panel\TicketController@postGuestClose',
                            $findTicket->_id]]) !!}
                            {!! Form::submit(trans('ticket.closeTicket') , ['class'=>'button radius small bg-red']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection
