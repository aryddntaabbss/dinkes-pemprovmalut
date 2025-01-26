<nav aria-label="Breadcrumb" class="bg-white">
    <ol class="flex text-sm font-medium text-gray-700">
        <li class="inline-flex items-center">
            <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </li>
        <!-- Breadcrumb for Current Page -->
        <li class="inline-flex items-center">
            <a href="{{ url(request()->path()) }}" class="text-gray-500 hover:text-gray-700">{{ $pageName }}</a>
        </li>
    </ol>
</nav>