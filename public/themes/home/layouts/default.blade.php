<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
        <input type="hidden" id="baseurl" value="{{ URL::to('/') }}">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    </head>
    <body>
        {!! Theme::partial('header') !!}

        <div class="customcontainer">
            {!! Theme::content() !!}
        </div>

        {!! Theme::partial('footer') !!}

        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html>
