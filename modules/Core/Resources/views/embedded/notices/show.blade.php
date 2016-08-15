<!-- Conversations are loaded here -->
<div class="direct-chat-messages">
    @forelse($notices as $index => $notice)
        <div class="direct-chat-msg">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-{{(($index % 2) == 0) ? 'left' : 'right'}}">{{$notice->creator->getPresenter()->getRepresentable()}}</span>
                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
            <!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                <h5>{{$notice->title}}</h5>
                {{$notice->body}}
            </div>
            <!-- /.direct-chat-text -->
        </div>
    @empty
        <div class="alert alert-info">No notices for object</div>
    @endforelse
</div>
<!-- /.direct-chat-pane -->
