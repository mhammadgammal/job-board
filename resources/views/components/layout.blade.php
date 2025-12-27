<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{{ $title }}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <h1>Welcome to the Job Board</h1>
    <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                    class="h-8 w-auto" />
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" command="show-modal" commandfor="mobile-menu"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                    aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Home</a>
            <a href="/about" class="text-sm/6 font-semibold text-gray-900">About</a>
            <a href="/contact" class="text-sm/6 font-semibold text-gray-900">Contact</a>
        </div>
        @auth
            <span class="text-sm/6 font-semibold text-gray-900" style="margin-left:10px;">
              {{{ Auth::user()->name }}}
            </span>
            <span class="text-sm/6 font-semibold text-gray-900" style="margin-left:10px;">
              <form method="POST" action="/logout" style="display:inline;">
                  @csrf
                  <button type="submit">Log Out</button>
              </form>
            </span>
        @else
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href={{{ route('login') }}} class="text-sm/6 font-semibold text-gray-900">Log in <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        @endauth

    </nav>
    {{{ $slot }}}
</body>

</html>
