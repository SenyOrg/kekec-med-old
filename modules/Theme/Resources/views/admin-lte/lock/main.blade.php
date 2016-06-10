<div class="hold-transition lockscreen @if(!Session::get('locked')) hidden @endif">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href=""><i class="fa fa-heartbeat text-red fa-lg" aria-hidden="true"></i> <b>Kekec</b>MED</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">{{$vc->getUser()->getFullName()}}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{$vc->getUser()->getImageUrl()}}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials">
            <div class="input-group">
                <input type="password" class="form-control" placeholder="Enter password..." id="unlock-password">

                <div class="input-group-btn">
                    <button type="button" class="btn" id="unlock-button"><i class="fa fa-unlock text-muted fa-lg"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="login.html">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2016 <b><a href="http://almsaeedstudio.com" class="text-black">SenyCorp</a></b><br>
        All rights reserved
    </div>
</div>
<!-- /.center -->
</div>

@push('document-ready-stack')
        $('#unlock-password').keypress(function(e) {
            if(e.which == 13) {
                $('#unlock-button').trigger('click');
            }
        });

        $('#unlock-button').click(function() {
            $.getJSON('{{url('core/check/')}}/'+$('#unlock-password').val(), {}, function(data) {
                if (data['result']) {
                    $.get('{{url('core/session/locked/0')}}', {}, function() {
                        $('div.lockscreen').addClass('hidden');
                    })
                } else {
                    alert("wrong password");
                }
                $('#unlock-password').val('');
            }).fail(function() {
                $('#unlock-password').val('');
                alert("wrong password");
            })
        })

        $('#lock-button').click(function() {
            $.get('{{url('core/session/locked/1')}}', {}, function() {
                console.log("asd");
                $('div.lockscreen').removeClass('hidden');
            })
        })
@endpush
<style type="text/css">
    .lockscreen {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;

        position:fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height:100%;
        background-image: url('{{asset('modules/theme/admin-lte/dist/img/background.jpg')}}') !important;
        background-color: transparent !important;
        z-index:1600;
    }
</style>