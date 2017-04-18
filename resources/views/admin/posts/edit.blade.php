@extends('layouts.admin')
@section('title', 'Edit post')
@section('content.admin')
<div class="panel panel-default">
    <div class="panel-heading">Edit post</div>
    <form role="form" method="POST">
        <div class="panel-body">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                <label>Summary</label>
                <textarea name="summary" rows="3" class="form-control">{{ $post->summary }}</textarea>
            </div>

            <div class="form-group">
                <label>Provinces</label>
                <select name="province_code" class="form-control">
                    <option value="">None</option>
                    @if($post->province_code != null)
                    <option value="{{ $post->province->code }}" selected="selected">{{ $post->province->name }}</option>
                    @endif
                    @foreach ($provinces as $province)
                        @if ($post->province_code != $province->code)
                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="" selected="selected">None</option>
                    @if($post->category_id != null)
                    <option value="{{ $post->category->id }}" selected="selected">{{ $post->category->name }}</option>
                    @endif
                    @foreach ($categories as $category)
                        @if ($post->category_id != $category->id)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            </div><!-- .panel-body -->
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-4">
                    <a href="{{ route('admin_posts_delete', ['id' => $post->id]) }}" type="submit" class="btn btn-danger">Delete</a>
                </div>
                <div class="col-xs-8 text-right">
                    <a href="{{ route('admin_posts') }}" type="submit" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div><!-- .panel-footer -->
    </form>
</div><!-- .panel -->
@endsection