<header class="border-b-2 border-color-primary-500 w-full fixed bg-white z-50" x-data="{ open: false }">
  <div x-transition x-show="open" style="display: none;" class="absolute isolate w-[80%] h-screen top-0 shadow-md bg-white z-10 p-4">
    <div class="p-2 w-full inline-flex items-center justify-between">
      <div class="w-10">
        <img src="/logo/ung.png" alt="" class="w-full">
      </div>
      <div>
        <button @click="open = false" class="p-4 rounded-md px-4 py-2.5 hover:bg-neutral-100">
          <i class="fas fa-times text-neutral-500"></i>
        </button>
      </div>
    </div>
    <div class="w-full mt-4 font-semibold">
      <ul class="w-full flex flex-col gap-y-1">
        @foreach($menuItems as $menuItem)
        @isset($menuItem['link'])
        @if(is_array($menuItem['link']))
        <li class="w-full " x-data="{ open: false }">
          <div @click="open = !open" :class="open ? 'bg-neutral-100' : ''"
            class="w-full inline-flex items-center justify-between px-4 py-2">
            {{ $menuItem['name'] }}
            <span>
              <i :class="open ? 'rotate-180' : ''" class="fas fa-chevron-down text-xs transition-transform"></i>
            </span>
          </div>
          <div x-show="open" @click.outside="open = false" x-transition
            class="w-full flex flex-col gap-y-1 mt-3 text-sm px-4">
            @foreach($menuItem['link'] as $submenuItem)
            <a href="{{ route($submenuItem['link']) }}" class="px-3 py-2  rounded-md">
              {{ $submenuItem['name'] }}
            </a>
            <hr>
            @endforeach
          </div>
        </li>
        @else
        <li class="w-full ">
          <a href="{{ route($menuItem['link']) }}"
            class="w-full inline-flex items-center justify-between px-4 py-2 hover:bg-neutral-100">
            {{ $menuItem['name'] }}
          </a>
        </li>
        @endif
        @endisset
        @endforeach
      </ul>
    </div>
  </div>
  <nav class="max-w-screen-xl mx-auto px-4 py-3.5 flex items-center justify-between">

    <div class="flex items-center gap-x-4">
      {{-- trigger nav mobile start --}}
      <div class="inline-flex items-center lg:hidden">
        <button @click="open = !open" class="px-4 py-2.5 border hover:bg-neutral-100 rounded-lg">
          <i class="fas fa-bars text-color-primary-500"></i>
        </button>
      </div>
      {{-- trigger nav mobile end --}}

      <img src="/logo/ung.png" alt="" class="w-10 hidden lg:block">
      <ul class="hidden lg:flex items-center gap-x-1 flex-grow flex-shrink ">
        @foreach($menuItems as $menuItem)
        @isset($menuItem['link'])
        @if(is_array($menuItem['link']))
        <li class="relative" x-data="{ open: false }">
          <div @click="open = !open" :class="open ? 'bg-neutral-100' : ''"
            class="select-none cursor-pointer px-4 py-2.5 inline-flex gap-x-2 items-center rounded-md text-sm font-semibold text-neutral-700 hover:bg-neutral-100">
            {{ $menuItem['name'] }}
            <span>
              <i :class="open ? 'rotate-180' : ''" class="fas fa-chevron-down transition-transform text-xs w-4 h-4"></i>
            </span>
          </div>
          <div x-show="open" style="display: none" @click.outside="open = false" x-transition
            class="absolute py-2 bg-white rounded-md border text-neutral-700 border-neutral-200 shadow-md mt-2 w-56 z-10">
            <div class="w-full flex flex-col gap-y-1 text-sm font-semibold">
              @foreach($menuItem['link'] as $submenuItem)
              <a href="{{ route($submenuItem['link']) }}" class="py-2.5 px-4 w-full hover:bg-neutral-100">
                {{ $submenuItem['name'] }}
              </a>
              @endforeach
            </div>
          </div>
        </li>
        @else
        <li>
          <a href="{{ route($menuItem['link']) }}"
            class="px-4 py-3 rounded-md font-semibold text-neutral-700 hover:bg-neutral-100 text-sm">
            {{ $menuItem['name'] }}
          </a>
        </li>
        @endif
        @endisset
        @endforeach
      </ul>
    </div>
    <div>
      @guest
      <x-button color="primary" size="md" outlined="true" onclick="window.location.href='{{ route('login') }}'">
        Masuk
      </x-button>
      @endguest
      @auth
      <div class="w-12 h-12 rounded-full relative" x-data="{ open: false }">
        <img src="{{ Auth::user()->avatar_url ?? '/avatar/placeholder.jpg' }}" alt="" class="w-full rounded-full hover:cursor-pointer"
          @click="open = !open">
        <div x-show="open" style="display: none" @click.outside="open = false" x-transition
          class="absolute py-2 -left-24 bg-white rounded-md border text-neutral-700 border-neutral-200 shadow-md mt-2 w-36 z-10">
          <div class="w-full flex flex-col gap-y-1 text-sm font-semibold">
            <p class="py-2.5 px-4 w-full">{{ Auth::user()->role->name }}</p>
            <a class="py-2.5 px-4 w-full hover:bg-neutral-100 hover:cursor-pointer " href="{{ route('dashboard.user.profile') }}">
              Profil
            </a>
            <p class="py-2.5 px-4 w-full hover:bg-neutral-100 hover:cursor-pointer text-color-danger-500" wire:click="handleLogout">
              Logout
            </p>
          </div>
        </div>
      </div>
      @endauth
    </div>
  </nav>
</header>