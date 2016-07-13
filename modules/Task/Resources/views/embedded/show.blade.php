<ul class="todo-list ui-sortable">
    @forelse($tasks as $task)
        <li>
            <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
            <!-- checkbox -->
            <input type="checkbox" value="">
            <!-- todo text -->
            <span class="text">{{$task->title}}</span>
            <!-- Emphasis label -->
            <small class="label label-danger"><i
                        class="fa fa-user fa-lg"></i> {{$task->creator->getFullname()}}</small>
            &nbsp;&nbsp;>&nbsp;&nbsp;
            <small class="label label-info"><i
                        class="fa fa-user fa-lg"></i> {{$task->assignee->getFullname()}}</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
                <a href="{{route('task.edit', $task->id)}}"><i class="fa fa-edit"></i></a>
            </div>
        </li>
    @empty
        <li><i>No Tasks for object</i></li>
    @endforelse
</ul>