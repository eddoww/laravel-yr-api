Hello! Weather forecast of the day ;)
<br>
<br>
Country : {{$forecast['location']['country']}}<br>
Location: {{$forecast['location']['name']}}<br>
<br>

Today's Weather Warnings:<br>

@foreach($forecast['forecast']['text']['location']['time'] as $time)
    <p>
        from: {{$time['@from']}}<br> {{--Should probably make this display in a much nicer format of time--}}
        to: {{$time['@to']}}<br>

        Title: {{$time['title']}} <br>
        Details:<br> {!!$time['body']!!}<br>
        <br>
    </p>
    <hr>
@endforeach

As for the weather itsself:<br>
<br>
<table border="1px">
    <thead>
    <tr>
    <td>from</td>
    <td>to</td>
    <td>temperature</td>
    <td>wind dir</td>
    <td>wind speed</td>
    <td>pressure</td>
    </tr>
    </thead>
    <tbody>
@foreach($forecast['forecast']['tabular']['time'] as $time)

        <tr>
            <td>{{$time['@from']}}</td>
            <td>{{$time['@to']}}</td>
            <td>{{$time['temperature']['@value']}}</td>
            <td>{{$time['windDirection']['@name']}}</td>
            <td>{{$time['windSpeed']['@name']}}</td>
            <td>{{$time['pressure']['@value']}}</td>
        </tr>
@endforeach
    </tbody>
</table>

<br>
Yr demands these credits to be displayed, so here we go!<br>
<br>
<p>
    {{$forecast['credit']['link']['@text']}}
    <br>
    {{$forecast['credit']['link']['@url']}}
</p>


