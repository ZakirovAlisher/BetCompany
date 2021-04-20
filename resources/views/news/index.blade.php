@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All News</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Add news</a>
                 <a class="btn btn-info" href="{{ route('admin') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Picture</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($news as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td><img width="120" height="120"class="border border-secondary"   src="{{ $m->url }}"></td>
            <td>{{ $m->title }}</td>
            <td>{{ $m->user->name }}</td>
                <td>{{ $m->content }}</td>
            <td>
                <form action="{{ route('news.destroy',$m->id) }}" method="POST">
   
                     
    
                    <a class="btn btn-primary" href="{{ route('news.edit',$m->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
</div>  
@endsection