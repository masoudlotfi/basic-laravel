@if (!empty($messages = Session::get('flash_notification')))
    @foreach($messages as $message => $level)
        @if ($level =='info')
            <?php $class = 'bg-light-green' ?>
        @elseif($level == 'success')
            <?php $class = 'bg-light-green' ?>
        @elseif($level =='warning')
            <?php $class = 'bg-aqua' ?>
        @elseif($level == 'danger')
            <?php $class = 'bg-red' ?>
        @endif

        <div class="box {{$class}}">
            <div class="box-header {{$class}}">
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="remove">
                        <i class="icon-cross"></i>
                    </span>
                </div>
                <div class="box-body " style="display: block;">
                    <p class="{{$class}}">{!! base64_decode($message) !!}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
