<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt class="h-auto rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="profile.profileAccount">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt class="h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                        <small class="text-muted">Admin</small>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        @if (Auth::user()->roles == "applicant")
        <li>
            <a class="dropdown-item" href="{{ route('profile.profileAccount') }}">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">{{ __('Profile') }}</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('profile.profileSecurity') }}">
                <i class="ti ti-settings me-2 ti-sm"></i>
                <span class="align-middle">Settings</span>
            </a>
        </li>
        @endif
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="dropdown-item" href="auth-login-cover.html" target="_blank"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <i class="ti ti-logout me-2 ti-sm"></i>
                    <span class="align-middle">{{ __('Log Out') }}</span>
                </a>
            </form>
        </li>
    </ul>
</li>
