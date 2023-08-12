<form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')
    <div class="card-body">
        <h3 class="card-title">{{ __('Profile Information') }}</h3> <br>
        <p>{{ __("Update your account's profile information and email address.") }}</p>
        <div class="form-group">
            <label for="username">{{__('Name')}}</label>
            <input type="text" name="name" class="form-control" id="username" value="{{old('name', $user->name)}}">
        </div>
        <div class="form-group">
            <label for="useremail">{{__('Email')}}</label>
            <input type="email" name="email" class="form-control" id="useremail" value="{{old('email', $user->email)}}">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>