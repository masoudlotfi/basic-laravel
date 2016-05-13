@extends('guest_ticket')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <div class="box">
                <div class="box-header bg-transparent">
                    <h3 class="box-title">
                        <i class="icon-menu"></i>
                        <span>{{trans('ticket.searchTicket')}}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="large-6 large-centered columns">
							{!! Form::open(array('route' => 'home.guestTicket.postFind'))!!}
                            {!! Form::textField('ticket_id', trans('ticket.ticketId'), null, ['class' => 'ltr']) !!}
							{!! Form::emailField('email',trans('ticket.email')) !!}
							{!! Form::submit(trans('ticket.search'), ['class'=>'button radius small bg-blue']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection