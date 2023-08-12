<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')
    <div class="card-body">
        <h3 class="card-title">{{ __('Update Password') }}</h3><br>
        <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        <div class="form-group">
            <label for="current_password">{{__('Current Password')}}</label>
            <input type="password" name="current_password" class="form-control" id="current_password">
        </div>
        <div class="form-group">
            <label for="password">{{__('New Password')}}</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{__('Confirm Password')}}</label>
            <input type="password_confirmation" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>