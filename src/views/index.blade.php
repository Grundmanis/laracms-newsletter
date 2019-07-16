@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.newsletter')] )

@section('content')
    <form method="post">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.menu.mail-template') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="to" class="col-form-label text-md-right">{{ __('laracms::admin.to') }}</label>
                    <select class="form-control" name="to" id="to">
                        <option value="buyers">{{ __('texts.buyers') }}</option>
                        <option value="sellers">{{ __('texts.sellers') }}</option>
                        <option value="all">{{ __('texts.all') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject" class="col-form-label text-md-right">{{ __('laracms::admin.subject') }}</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>

                <div class="form-group">
                    <label for="message" class="col-form-label text-md-right">{{ __('laracms::admin.message') }}</label>
                    <textarea class="form-control summernote" id="message" name="message"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('laracms::admin.send') }}</button>
    </form>
@endsection
