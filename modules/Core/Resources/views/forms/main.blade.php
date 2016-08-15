<div class="form-group {{ $errors->has($parameters['name']) ? 'has-error' : '' }} has-feedback">
    <label class="control-label col-sm-2" for="{{$parameters['id']}}">
        {{$label}}
    </label>

    <div class="col-sm-10">
        @if ($errors->has($parameters['name']))
            <label class="control-label">
                <i class="fa fa-times-circle-o"></i> Value is shitty
            </label>
        @endif
        @if ($element->getViewMode() == 'edit')
        {{$element->render()}}
        @else
            <p class="form-control-static">{{$element->render()}}</p>
        @endif
        <span class="glyphicon glyphicon-time form-control-feedback hidden" aria-hidden="true"></span>
        <span id="{{$parameters['id']}}" class="sr-only">(success)</span>

        @if ($errors->has($parameters['name']))
            <span class="help-block">
                    <strong>{{ $errors->first($parameters['name']) }}</strong>
            </span>
        @endif
    </div>
</div>