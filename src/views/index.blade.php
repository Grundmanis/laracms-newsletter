@extends('laracms.dashboard::layouts.app', ['page' => 'Create a Newsletter'])

@include('laracms.dashboard::partials.summernote')

@section('content')
    <form method="post">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('form.to') }}</label>
            <div class="col-md-6">
                <select class="form-control" name="to" id="to">
                    <option value="buyers">Buyers</option>
                    <option value="sellers">Sellers</option>
                    <option value="all">All</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('form.subject') }}</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
        </div>

        <div class="form-group row">
            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('form.message') }}</label>
            <div class="col-md-6">
                <textarea class="form-control summernote" id="message" name="message"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
