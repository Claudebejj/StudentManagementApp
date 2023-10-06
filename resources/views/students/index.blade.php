<!DOCTYPE html>
<html>
<head>
    <title>List of Students</title>
</head>
<body>
    <h1>List of Students</h1>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student->name }} (Age: {{ $student->age }})</li>
        @endforeach
    </ul>
</body>
</html>
