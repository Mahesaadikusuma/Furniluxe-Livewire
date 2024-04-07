<section>
    <div class="">
        <nav class="navbar bg-red-500 lg:bg-transparent items-center">
            <div class="navbar-start">
                <div class="flex-none lg:hidden">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mx-10 mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-96">
                            <li>
                                <a class="text-base text-neutral font-bold">Homepage</a>
                            </li>
                            <li>
                                <a class="text-base text-neutral font-normal">Product</a>
                            </li>
                            <li>
                                <a class="text-base text-neutral font-normal">Collections</a>
                            </li>
                            <li>
                                <a class="text-base text-neutral font-normal">About</a>
                            </li>
                            <li>
                                <a class="text-base text-neutral font-normal">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="{{ route('home') }}" wire:navigate
                        class="btn btn-link text-xl decoration-transparent text-second">FurniLuxe</a>
                </div>
            </div>

            <div class="navbar-center">
                <div class="lg:hidden">
                    <a href="{{ route('home') }}" wire:navigate
                        class="btn btn-link text-xl text-white decoration-transparent">FurniLuxe</a>
                </div>
                <div class="hidden lg:flex">
                    <ul class="menu menu-vertical lg:menu-horizontal text-base-100 text-base">
                        <li>
                            <a class="font-bold">Home</a>
                        </li>
                        <li>
                            <a class="text-neutral font-normal">Product</a>
                        </li>
                        <li>
                            <a class="text-neutral font-normal">Collections</a>
                        </li>
                        <li>
                            <a class="text-neutral font-normal">About</a>
                        </li>
                        <li>
                            <a class="text-neutral font-normal">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="navbar-end lg:pe-10 flex items-center">
                {{-- @auth
                    <span class="me-2 hidden lg:block">{{ Auth::user()->name }}</span>
                @endauth
                <div class="gap-2">
                    @auth
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS Navbar component"
                                        src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a href="{{ route('profile.show') }}" wire:navigate class="justify-between">
                                        Profile
                                        <span class="badge">New</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('dashboard') }}" wire:navigate>Dashboard</a>
                                </li>
                                <form action="{{ route('logout') }}" @click.prevent="$root.submit();" method="POST">
                                    @csrf
                                    <li>
                                        <button>{{ __('Log Out') }}</button>
                                    </li>
                                </form>
                            </ul>

                        </div>
                    @endauth

                    @guest
                        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" active="true">
                            {{ __('Login') }}
                        </x-nav-link>
                    @endguest
                </div> --}}
                @auth
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Account, {{ Auth::user()->name }}
                                </div>

                                <x-dropdown-link href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>



                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </div>
                @endauth

                @guest
                    <a href="{{ route('register') }}" class="px-4 py-1 text-neutral-800 hover:text-blue-500 ">
                        {{ __('Register') }}
                    </a>

                    <a href="{{ route('login') }}" class="px-4 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-full">
                        {{ __('Login') }}
                    </a>
                @endguest

            </div>
        </nav>
    </div>
</section>
