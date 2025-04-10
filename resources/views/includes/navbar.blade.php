<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="m-0 text-primary"><span class="text-dark">TRAVEL</span>ER</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    @foreach ($navLinks as $link)
                        @if (isset($link['dropdown']))
                            <!-- Dropdown Link -->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $link['label'] }}</a>
                                <div class="dropdown-menu border-0 rounded-0 m-0">
                                    @foreach ($link['dropdown'] as $dropdownItem)
                                        <a href="{{ $dropdownItem['url'] }}" class="dropdown-item">{{ $dropdownItem['label'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Regular Link -->
                            <a href="{{ $link['url'] }}" class="nav-item nav-link {{ request()->is(str_replace(url('/'), '', $link['url'])) ? 'active' : '' }}">
                                {{ $link['label'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</div>
