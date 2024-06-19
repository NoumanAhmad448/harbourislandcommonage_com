<?php

use App\Models\UserAnnModel;
use App\Models\Categories;
use Illuminate\Support\Facades\Cache;


?>
        @include("lib.custom_lib")
        @yield('page-css')
    </head>
    <body>
        @include(config("files.components").'.form_loader')
        <!-- main Content -->
        <div class="font-sans text-gray-900 bg-gray-100 antialiased min-h-screen">
            @include('components.header')
            <main>
                @yield('content')
            </main>
            @include('components.footer')
        </div>
        @yield('script')
    </body>
</html>
