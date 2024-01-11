@extends('layouts.base')
@section('body')
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Artist Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Artist Name" name="name">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">country</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="artist country" name="country">
        </div>
        <div class="form-group">
            <label for="image">country</label>
            <input type="text" class="form-control" name="img_path">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
