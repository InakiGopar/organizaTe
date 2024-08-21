<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <!-- Primary Navigation Menu -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo />
        </a>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <x-nav-link :href="route('dashboard')"  class="nav-link">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('order.orders')"  class="nav-link">
                        {{ __('Pedidos') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('product.products')"  class="nav-link">
                        {{ __('Productos') }}
                    </x-nav-link>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li >
                    <p>hola {{ Auth::user()->name }}!</p>
                </li>
                <li>
                    <a href={{ route('profile.edit') }}>
                        Perfil
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Cerrar sesion
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
