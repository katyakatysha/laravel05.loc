<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<form action="" method="post">
    @csrf
    <select name="from">
        @foreach($currencies as $currency)
            <option>{{ $currency['Cur_Name'] }}</option>
        @endforeach
    </select>
    <select name="to">
        @foreach($currencies as $currency)
            <option>{{ $currency['Cur_Name'] }}</option>
        @endforeach
    </select>
    <input type="text" name="count">
    <button type="submit">Convert</button>
</form>
</body>
</html>
