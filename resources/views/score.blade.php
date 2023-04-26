<!DOCTYPE html>
<html>
<head>
    @if($rating)
    <title>Score for {{ $rating->word }}</title>
    @endif
</head>
<body>
<form>
    <input type="text" name="term">
    <button type="submit">Posalji upit</button>
</form>
@if($rating)
    <h1>Score for {{ $rating->word }}</h1>
    <p>The score is {{ $rating->popularity_rating }}</p>
@endif
</body>
</html>



