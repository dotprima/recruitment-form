<div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.profileAccount') }}"><i class="ti-xs ti ti-users me-1"></i>
                Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-lock me-1"></i>
                Security</a>
        </li>
    </ul>
    <!-- Change Password -->
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form wire:submit.prevent="updatePassword">
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="current_password">Current Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" wire:model="current_password" name="current_password" id="current_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('current_password') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password">New Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" wire:model="password" type="password" id="password" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('password') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="password_confirmation">Confirm New Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" wire:model="password_confirmation" name="password_confirmation"
                                id="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 mb-4">
                        <h6>Password Requirements:</h6>
                        <ul class="ps-3 mb-0">
                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-1">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <div>
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
   
</div>
