@extends('layouts.app')
 
@section('content')
 <div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Members</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('members.create') }}"> Add member</a>
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
            <th>Name</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($members as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td><img width="120" height="120"class="border border-secondary" style="border-radius: 100px;"  src="{{ $m->url }}"></td>
            <td>{{ $m->name }}</td>
            <td>{{ $m->description }}</td>
            <td>
                <form action="{{ route('members.destroy',$m->id) }}" method="POST">
   
                     
    
                    <a class="btn btn-primary" href="{{ route('members.edit',$m->id) }}">Edit</a>
   
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