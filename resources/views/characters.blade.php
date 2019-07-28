<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Char*burp*acters</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <!-- Styles -->
    <style>

    </style>
</head>
<body>
    <header>
        <div class="search flex-center position-ref">
            <form id="search" method="get">
                <label for="name">Name</label>
                <input type="text" placeholder="Name" name="name" />

                <label for="species">Species</label>
                <input type="text" placeholder="Species" name="species" />

                {{-- I guess this isn't filterable :/
                <input type="text" placeholder="Origin" name="origin" />--}}

                <label for="status">Status</label>
                <select name="status">
                    <option value="">---</option>
                    <option value="alive">Alive</option>
                    <option value="dead">Dead</option>
                    <option value="unknown">Unknown</option>
                </select>

                <input type="submit" value="Oooooh, he's tryin!" class="btn"/>
            </form>
        </div>
    </header>
    <div class="content">
        @if($all)
            <h1>Cha*burp*racters</h1>
            {!! renderNav($all['info']['prev'],$all['info']['next']) !!}
            <ul id="characters">
            @foreach($all['results'] AS $character)
                <li style="background-image:url({{$character['image']}});">
                    <dl>
                        <dt>Name:</dt>
                        <dd>{{ $character['name'] }}</dd>
                        <dt>Species:</dt>
                        <dd>{{ $character['species'] }}</dd>
                        <dt>Origin:</dt>
                        <dd>{{ $character['origin']['name'] }}</dd>
                        <dt>Status:</dt>
                        <dd>{{ $character['status'] }}</dd>
                        <dt>Ep(s):</dt>
                        <dd>
                            <ul>
                            @foreach($character['episode'] AS $episode)
                                <li>
                                    {{renderEpisode($episode)}}
                                </li>
                            @endforeach
                            </ul>
                        </dd>
                    </dl>
                </li>
            @endforeach
            </ul>
            {!! renderNav($all['info']['prev'],$all['info']['next']) !!}
        @else
            <h1>Sorry, no characters found :(</h1>

        @endif
    </div>
</body>
</html>
