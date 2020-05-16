<nav class="navbar navbar-expand">
    <ul class="navbar-nav mr-auto align-items-center">
        <li class="nav-item">
            <a class="nav-link logo" href="{{ route('admin.dashboard.index') }}">
                <span class="logo-lg">FleetCart</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav align-items-center right-nav-link">
        <li class="nav-item">
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa fa-desktop"></i>
                <!--{{ trans('admin::admin.visit_store') }}-->
            </a>
        </li>

        <li class="nav-item pull-right">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#" aria-expanded="true">
                <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item user-details">
                    <a href="javaScript:void();">
                        <div class="media">
                            <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                            <div class="media-body">
                            <h6 class="mt-2 user-title">{{ $currentUser->first_name }}</h6>
                            <p class="user-subtitle">{{ $currentUser->email }}</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="{{ route('admin.profile.edit') }}">{{ trans('user::users.profile') }}</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="{{ route('admin.logout') }}">{{ trans('user::auth.logout') }}</a></li>
            </ul>
        </li>

        @if (count(supported_locales()) > 1)
            <li class="language dropdown top-nav-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span>{{ strtoupper(locale()) }}</span>
                </a>

                <ul class="dropdown-menu">
                    @foreach (supported_locales() as $locale => $language)
                        <li class="{{ $locale === locale() ? 'active' : '' }}">
                            <a href="{{ localized_url($locale) }}">{{ $language['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    </ul>
</nav>
<style>
    .right-nav-link a.nav-link {
    padding-right: .8rem !important;
    padding-left: .8rem !important;
    font-size: 20px;
    color: #353434;
}

.right-nav-link a.nav-link {
    padding-right: .8rem !important;
    padding-left: .8rem !important;
    font-size: 20px;
    color: #353434;
}
.user-profile img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
}
.user-details {
    border-bottom: 1px solid rgba(66, 59, 116, 0.15);
    padding: 1rem!important;
}
.user-details .media .avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.user-details .media .media-body .user-title {
    font-size: 14px;
    color: #000;
    font-weight: 600;
    margin-bottom: 2px;
}
.user-details .media .media-body .user-subtitle {
    font-size: 13px;
    color: #585858;
    margin-bottom: 0;
}
.user-profile img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    box-shadow: 0 16px 38px -12px rgba(0,0,0,.56), 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);
}
</style>