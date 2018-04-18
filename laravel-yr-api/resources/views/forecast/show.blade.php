Hello! Weather forecast of the day ;)
<br>
<br>
Country : {{$forecast['location']['country']}}<br>
Location: {{$forecast['location']['name']}}<br>
<br>

Today the weather will be like:<br>

@foreach($forecast['forecast']['text']['location']['time'] as $time)
Title: {{$time['title']}} <br>
Detailed: {!!$time['body']!!}<br>

from: {{$time['@from']}}<br>
to: {{$time['@to']}}<br>
@endforeach

Yr demands these credits to be displayed, so here we go!<br>

<p>
    {{$forecast['credit']['link']['@text']}}
    <br>
    {{$forecast['credit']['link']['@url']}}
</p>


