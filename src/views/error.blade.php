@extends(Config::get('larulogin::template'))

@section(Config::get('larulogin::out'))
    <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">{{trans('larulogin::larulogin.error')}}</div>
            <div class="panel-body">
                {{implode('', $errors->all('<div>:message</div>'))}}
            </div>
        </div>
    </div>
@endsection