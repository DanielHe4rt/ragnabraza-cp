@props(['isMobile'])
<div class="d-flex align-items-center">
    @auth()
    <div >
        <span >{{ Auth::user()->userid }}</span>
        <br>
        <span>100.000 - VIP </span>
    </div>

    <div>
        <img class="rounded-circle" width="32" height="32"
             src="{{asset('images/user_preview.png')   }}"
             alt="{{ Auth::user()->userid }}"/>
        <svg class="ms-2 text-black {{ $isMobile ? 'd-none' : '' }}" width="18" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd"/>
        </svg>
    </div>
    @endauth
</div>
