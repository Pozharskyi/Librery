@extends('layout')
@section('content')
    <h1>All books</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Author</td>
            <td>Year</td>
            <td>Genre</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->genre}}</td>
                <td>
                    <div class="btn-group inline">
                        <a class="btn btn-small btn-success" href="{{ route('books.show',['book'=>$book->id]) }}">Show the book</a>
                        <a class="btn btn-small btn-info" href="{{ route('books.edit', ['book' => $book->id]) }}">Edit the book</a>

                        {{ Form::open(['url' => 'books/' . $book->id, 'class' => 'pull-right']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete the book', ['class' => 'btn btn-warning']) }}
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
        @endforeach
        {{ $books->render() }}
        </tbody>
    </table>

@endsection