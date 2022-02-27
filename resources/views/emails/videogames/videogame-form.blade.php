@component('mail::message')

# Thank you for your message

<strong>Title</strong> {{$videogame['title']}}

<strong>Rating</strong> {{$videogame['rating']}}

<strong>Console</strong> {{$videogame['console']}}

<strong>Purchase_price \$</strong> {{$videogame['purchase_price']}} <br>

<strong>Sale price \$</strong> {{$videogame['sale_price']}}

<strong>URL</strong> 
{{$videogame['url']}}

@endcomponent
