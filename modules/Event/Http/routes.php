<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'KekecMed\Event\Http\Controllers'], function () {

    Route::post('event/delete/{id}', function ($id) {
        return response()->json(['success' => \KekecMed\Event\Entities\Event::destroy($id)]);
    })->name('event.delete');

    Route::post('event/drag/{id}', function ($id) {
        $model = \KekecMed\Event\Entities\Event::findOrFail($id);
        $delta = request('data');
        $start = new \Carbon\Carbon($model->start);
        $end = new \Carbon\Carbon($model->end);

        foreach ($delta as $unit => $value) {
            switch ($unit) {
                case 'milliseconds':
                    $start->addSeconds($value * 1000);
                    $end->addSeconds($value * 1000);
                    break;
                case 'seconds':
                    $start->addSeconds($value);
                    $end->addSeconds($value);
                    break;
                case 'minutes':
                    $start->addMinutes($value);
                    $end->addMinutes($value);
                    break;
                case 'hours':
                    $start->addHours($value);
                    $end->addHours($value);
                    break;
                case 'days':
                    $start->addDays($value);
                    $end->addDays($value);
                    break;
                case 'month':
                    $start->addMonths($value);
                    $end->addMonths($value);
                    break;
                case'years':
                    $start->addYears($value);
                    $end->addYears($value);
                    break;
            }
        }

        $model->start = $start->toDateTimeString();
        $model->end = $end->toDateTimeString();

        return response()->json(['success' => $model->save()]);
    })->name('event.drag');

    Route::post('event/resize/{id}', function ($id) {
        $model = \KekecMed\Event\Entities\Event::findOrFail($id);
        $delta = request('data');
        $end = new \Carbon\Carbon($model->end);

        foreach ($delta as $unit => $value) {
            switch ($unit) {
                case 'milliseconds':
                    $end->addSeconds($value * 1000);
                    break;
                case 'seconds':
                    $end->addSeconds($value);
                    break;
                case 'minutes':
                    $end->addMinutes($value);
                    break;
                case 'hours':
                    $end->addHours($value);
                    break;
                case 'days':
                    $end->addDays($value);
                    break;
                case 'month':
                    $end->addMonths($value);
                    break;
                case'years':
                    $end->addYears($value);
                    break;
            }
        }

        $model->end = $end->toDateTimeString();

        return response()->json(['success' => $model->save()]);
    })->name('event.drag');

    Route::resource('event', 'EventController');
});