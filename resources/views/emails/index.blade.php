<!DOCTYPE html>
<html>
<head>
    <title>Fetched Emails</title>
</head>
<body>
    <h1>Fetched Emails</h1>
    @if(count($emails) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>From</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emails as $email)
            <tr>
                <td>{{ $email->from }}</td>
                <td>{{ $email->subject }}</td>
                <td>{{ $email->date }}</td>
                <td>{{ $email->body }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No emails found.</p>
    @endif
</body>
</html>
