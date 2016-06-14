@extends($vc->getTheme())

@section('content')
    <div class="content-header" style="position:absolute; top:100px; left:0;z-index:1000">
        <div class="btn btn-danger" id="event-trash"><i class="fa fa-trash fa-lg"></i></div>
        <br/>
        <br/>
        <div class="btn btn-primary" id="event-edit"><i class="fa fa-pencil fa-lg"></i></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title">Filter</h4>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        {{Form::imultiselect('Calendar', 'calendars', \KekecMed\Calendar\Entities\Calendar::class)}}
                        {{Form::imultiselect('Status', 'statuses', \KekecMed\Event\Entities\EventStatus::class)}}
                        {{Form::imultiselect('Type', 'types', \KekecMed\Event\Entities\EventType::class)}}
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop

@push('scripts')
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    /*** Handle jQuery plugin naming conflict between jQuery UI and Bootstrap ***/
    $.widget.bridge('uibutton', $.ui.button);
    $.widget.bridge('uitooltip', $.ui.tooltip);
</script>
<script src="{{asset('modules/theme/admin-lte/bootstrap/js/bootstrap.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('modules/theme/admin-lte/plugins/fullcalendar/fullcalendar.js')}}"></script>
<script src="{{asset('modules/theme/admin-lte/plugins/fullcalendar/lang-all.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('#calendar').fullCalendar({
            dragRevertDuration: false,
            lang: 'de',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: function (start, end, timezone, callback) {
                $.ajax({
                    url: '{{url('calendar/events')}}/',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        start: start.unix(),
                        end: end.unix(),
                        calendars: $('#calendars_id').val(),
                        types: $('#types_id').val(),
                        statuses: $('#statuses_id').val(),
                        _token: '{{csrf_token()}}'
                    },
                    success: function (doc) {
                        var events = doc;
                        callback(events);
                    }
                });
            },
            eventRender: function (event, element) {
                $(element).tooltip({
                    'title': $('<table class="table table-condensed">' +
                            '<tr>' +
                                '<td>' +
                                    'Start' +
                                '</td>' +
                                '<td>' +
                                    '<span class="label label-default">End</span>' +
                                '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>' +
                            'End' +
                            '</td>' +
                            '<td>' +
                            '<span class="label label-default">End</span>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>' +
                            'Creator' +
                            '</td>' +
                            '<td>' +
                            '<span class="label label-default">Creator</span>' +
                            '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td>' +
                            'Patient' +
                            '</td>' +
                            '<td>' +
                            '<span class="label label-default">Patient</span>' +
                            '</td>' +
                            '</tr>' +
                        '</table>'),
                    'html': true,
                    'container': 'body'
                });
            },
            eventClick: function (calEvent, jsEvent, view) {

                alert('Event: ' + calEvent.title);
                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                alert('View: ' + view.name);

                // change the border color just for fun
                $(this).css('border-color', 'red');

            },
            eventMouseover: function (event, jsEvent, view) {

            },
            eventMouseout: function (event, jsEvent, view) {

            },
            eventDragStart: function(event, jsEvent, ui, view) {

            },
            eventDragStop: function( event, jsEvent, ui, view ) {
                jsEvent.preventDefault();
                jsEvent.stopPropagation();
                var trashEl = jQuery('#event-trash');
                var ofs = trashEl.offset();
                var x1 = ofs.left;
                var x2 = ofs.left + trashEl.outerWidth(true);
                var y1 = ofs.top;
                var y2 = ofs.top + trashEl.outerHeight(true);

                if (jsEvent.pageX >= x1 && jsEvent.pageX<= x2 &&
                        jsEvent.pageY>= y1 && jsEvent.pageY <= y2) {
                    showDeleteDialog('Are you sure', 'Do you want to delete this event', function() {

                        $.ajax({
                            url: '{{url('event/delete')}}/' + event.id,
                            dataType: 'json',
                            type: 'post',
                            data: {
                                _token: '{{csrf_token()}}'
                            },
                            success: function (doc) {
                                if (doc.success) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                }
                            },
                            error: function () {

                            }
                        });
                    });
                }

                var trashEl = jQuery('#event-edit');
                var ofs = trashEl.offset();
                var x1 = ofs.left;
                var x2 = ofs.left + trashEl.outerWidth(true);
                var y1 = ofs.top;
                var y2 = ofs.top + trashEl.outerHeight(true);

                if (jsEvent.pageX >= x1 && jsEvent.pageX<= x2 &&
                        jsEvent.pageY>= y1 && jsEvent.pageY <= y2) {
                    window.location.href = '{{url('event')}}/' + event.id + '/edit'
                }
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {
                $.ajax({
                    url: '{{url('event/drag')}}/' + event.id,
                    dataType: 'json',
                    type: 'post',
                    data: {
                        data: delta._data,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (doc) {
                        if (!doc.success) {
                            alert("An error occured");
                        }
                    },
                    error: function () {
                        revertFunc();
                    }
                });
            },
            eventResize: function (event, delta, revertFunc, jsEvent, ui, view) {
                $.ajax({
                    url: '{{url('event/resize')}}/' + event.id,
                    dataType: 'json',
                    type: 'post',
                    data: {
                        data: delta._data,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (doc) {
                        if (!doc.success) {
                            alert("An error occured");
                        }
                    },
                    error: function () {
                        revertFunc();
                    }
                });
            },
            dayRender: function (date, cell) {

            },
            dayClick: function(date, jsEvent, view) {

                /*alert('Clicked on: ' + date.format());

                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                alert('Current view: ' + view.name);

                // change the day's background color just for fun
                $(this).css('background-color', 'red');*/

            },
            slotDuration: '00:05:00',
            selectable: true,
            selectHelper: true,
            select: function(start, end, event, ui) {
                $(event.target).prev();

                var eventData;
                /*if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end
                    };
                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                }*/
                //$('#calendar').fullCalendar('unselect');
            },
            editable: true
        });

        $('#calendars_id, #types_id, #statuses_id').change(function () {
            $('#calendar').fullCalendar('refetchEvents');
        })

        $('#delete-event').droppable({
            drop: function( event, ui ) {
                alert("ddd");
            }
        });

        $('#calendars_id, #types_id, #statuses_id').select2();
    });
</script>
@endpush