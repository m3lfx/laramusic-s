<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>yes Views</h1>
    <p>
    <p>I wish I were a <b>{{ $squirrel }}</b>squirrel</p>
    <p>{{ date('d/m/y') }}</p>
    @if ($something === 'Red Panda')
        <p>Something is red, white, and brown!</p>
    @elseif ($something == 'Giant Panda')
        <p>Something is black and white!</p>
    @else
        <p>Something could be a squirrel.</p>
    @endif

    @foreach ($manyThings as $thing)
        <p>{{ $thing }}</p>
    @endforeach

    @for ($i = 0; $i < 100; $i++)
        <p>Even {{ $i }} red pandas, aren't enough!</p>
    @endfor
    </p>
</body>

</html>
