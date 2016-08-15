<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Calendar\Http\Controllers'],
    function () {
        /**
         * Retrieve calendar events by filters:
         *
         * - calendars
         * - types
         * - statuses
         */
        Route::post('calendar/events/', function () {
            // Create query and join additional tables
            $query = DB::table('events')
                       ->join('calendars', 'events.calendar_id', '=', 'calendars.id')
                       ->join('event_types', 'events.event_type_id', '=', 'event_types.id')
                       ->join('event_statuses', 'events.event_status_id', '=', 'event_statuses.id')
                       ->select('events.*', 'event_types.color AS backgroundColor');

            // Apply calendars filter
            if (request('calendars')) {
                $query->whereIn('events.calendar_id', request()->toArray()['calendars']);
            }

            // Apply types filter
            if (request('types')) {
                $query->whereIn('events.event_type_id', request()->toArray()['types']);
            }

            // Apply statuses filter
            if (request('statuses')) {
                $query->whereIn('events.event_status_id', request()->toArray()['statuses']);
            }

            // Set up range filter
            $query->whereBetween('events.start',
                [
                    \Carbon\Carbon::createFromTimestamp(request('start'))->toDateTimeString(),
                    \Carbon\Carbon::createFromTimestamp(request('end'))->toDateTimeString()
                ]);

            return response()->json(
                $query->get()
            );
        })->name('calendar.events');

        Route::resource('calendar', 'CalendarController');
    });
