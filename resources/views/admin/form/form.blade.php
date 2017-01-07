@extends('layouts.app')

@section('content')

<div class="container">

  <nav class="navbar navbar2 navbar-default">
        <ol class="breadcrumb breadcrumb-left">
          <li><a href="/admin">Home</a></li>
          <li ><a href="{{ $pageUrl }}">{{ $pageTitle }}</a></li>
        </ol>
  </nav>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading">{{ $pageTitle }}</div>
            <div class="panel-body">
  
              <form class="form-horizontal" role="form" method="POST" action="{{ $pageUrl }}{{ isset($data) ? "/" . $data->id : ""  }}">
                @if( isset($data) )<input name="_method" type="hidden" value="PUT">@endif

                {{ csrf_field() }}
                @if(isset($formFields) )

                  @foreach( $formFields as $key => $item  )
                  <div class="form-group{{ $errors->has( $key ) ? ' has-error' : '' }}">
                    <label for="feed" class="col-md-4 control-label">{{ $item['title'] }}</label>

                    <div class="col-md-6">
                        @include("admin.form.fields." . $item['type']  )
                        @if ($errors->has($key))
                            <span class="help-block">
                                <strong>{{ $errors->first($key) }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>
                  @endforeach

                @endif

                <div class="form-group">
                  <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Save
                    </button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection