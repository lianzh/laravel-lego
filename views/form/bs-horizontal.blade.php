<form method="post" class="form-horizontal">
    @include('lego::messages', ['messages' => $form->messages(), 'errors' => $form->errors()])
    @foreach($form->fields() as $field)
        <div class="form-group {{ $field->errors()->any() ? 'has-error' : '' }}">
            <label for="{{ $field->elementId() }}" class="col-sm-2 control-label">{{ $field->description() }}</label>
            <div class="col-sm-10">
                {!! $field !!}
                @if($field->messages()->any())
                    @foreach($field->messages()->all() as $message)
                        <p class="text-info">{!! $message !!}</p>
                    @endforeach
                @endif
                @if($field->errors()->any())
                    @foreach($field->errors()->all() as $error)
                        <p class="text-danger">
                            <i class="glyphicon glyphicon-remove-sign"></i>
                            {!! $error !!}
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

    {{ csrf_field() }}

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>