@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Username</th>
      <th scope="col">Username</th>
    </tr>
  </thead>
  <tbody class="loadData">
    <tr>
        <td colspan="5">
            Loading
        </td>
    </tr>
  </tbody>
</table>
@endsection

@section('form')
    <form class="ajaxForm">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="nameInput" aria-describedby="emailHelp" name="name" placeholder="Enter name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
