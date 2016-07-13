<!-- Conversations are loaded here -->
<div class="direct-chat-messages">
    @forelse($notices as $index => $notice)
        <div class="direct-chat-msg {{(($index % 2) == 0) ? 'left' : 'right'}}">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-{{(($index % 2) == 0) ? 'left' : 'right'}}">{{$notice->creator->getPresenter()->getRepresentable()}}</span>
                <span class="direct-chat-timestamp pull-{{(($index % 2) == 1) ? 'left' : 'right'}}">{{$notice->created_at}}</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="{{$notice->creator->getImageUrl()}}" alt="message user image">
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
