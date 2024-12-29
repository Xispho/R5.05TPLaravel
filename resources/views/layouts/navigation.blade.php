<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex ">
                    <x-nav-link :href="route('eleves.index')" :active="request()->routeIs('eleves.index')">
                        {{ __('Élèves') }}
                    </x-nav-link>
                    <x-nav-link :href="route('modules.index')" :active="request()->routeIs('modules.index')">
                        {{ __('Modules') }}
                    </x-nav-link>
                    <x-nav-link :href="route('evaluations.index')" :active="request()->routeIs('evaluations.index')">
                        {{ __('Évaluations') }}
                    </x-nav-link>
                    <x-nav-link :href="route('eleve-evaluation.index')" :active="request()->routeIs('eleve-evaluation.index')">
                        {{ __('Notes') }}
                    </x-nav-link>
                    <div class="flex justify-center">
                        @if(Auth::user())
                            <div class="pt-2 pb-3 space-y-1">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
                            <x-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-nav-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-nav-link>
                            </form>
                        @else
                            <x-nav-link :href="route('login')">
                                {{ __('Log in') }}
                            </x-nav-link>
                            <x-nav-link :href="route('register')">
                                {{ __('Register') }}
                            </x-nav-link>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ optional(Auth::user())->name ?? '' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ optional(Auth::user())->email ?? '' }}</div>
            </div>
        </div>
    </div>
</nav>
