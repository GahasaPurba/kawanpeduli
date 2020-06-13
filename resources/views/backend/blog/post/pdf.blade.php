<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <img width="300" src="{{ public_path('frontend/img/logo.png') }}">
    <br><br>
    <p><b>LIST POSTINGAN</b></p>
    <p>Update : {{ date('d-m-Y') }}</p>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Tag</th>
                <th class="text-center">Author</th>
                <th class="text-center">Thumbnail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post => $result)
            <tr>
                <th class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $result->title }}</td>
                <td>{{ $result->category->name }}</td>
                <td>
                    @foreach ($result->tag as $tags)
                    <ul>
                        <li>{{ $tags->name }}</li>
                    </ul>
                    @endforeach
                </td>
                <td>{{ $result->user->name }}</td>
                <td class="text-center">
                    <img class="rounded" width="100" src="{{ public_path('upload/thumbnail/'.$result->thumbnail) }}">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
