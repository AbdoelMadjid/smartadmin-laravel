
    <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
        <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                    <span class="mr-2">
                        <img src="{{ Admin::user()->avatar }}" class="rounded-circle profile-image" alt="{{ Admin::user()->name }}">
                    </span>
                <div class="info-card-text">
                    <div class="fs-lg text-truncate text-truncate-lg">{{Admin::user()->name}}</div>
                    <span class="text-truncate text-truncate-md opacity-80 badge badge-primary badge-pill">{{ \Vreyz\Admin\Auth\Database\Administrator::find(Admin::user()->id)->name }}</span>
                </div>
            </div>
        </div>
        <div class="dropdown-divider m-0"></div>
 {{--       <a href="#" class="dropdown-item" data-action="app-reset">
            <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
        </a>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
            <span data-i18n="drpdwn.settings">Settings</span>
        </a>--}}
        <a class="dropdown-item fw-500 pt-3 pb-3" href="{{ admin_url('auth/setting') }}">
            <span data-i18n="drpdwn.page-logout">My Profile</span>
            {{--<span class="float-right fw-n">{{Admin::user()->name}}</span>--}}
        </a>
        <div class="dropdown-divider m-0"></div>
        <a href="#" class="dropdown-item" data-action="app-fullscreen">
            <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
            <i class="float-right text-muted fw-n">F11</i>
        </a>
        <a href="#" class="dropdown-item" data-action="app-print">
            <span data-i18n="drpdwn.print">Print</span>
            <i class="float-right text-muted fw-n">Ctrl + P</i>
        </a>
        <div class="dropdown-multilevel dropdown-multilevel-left">
            <div class="dropdown-item">
                Language
            </div>
            <div class="dropdown-menu">
                <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Fran??ais</a>
                <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Espa??ol</a>
                <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">?????????????? ????????</a>
                <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">?????????</a>
                <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">??????</a>
            </div>
        </div>

        <div class="dropdown-divider m-0"></div>
        <a class="dropdown-item fw-500 pt-3 pb-3" href="{{ admin_url('auth/logout') }}">
            <span data-i18n="drpdwn.page-logout">Logout</span>
            <span class="float-right fw-n">{{Admin::user()->name}}</span>
        </a>
    </div>

