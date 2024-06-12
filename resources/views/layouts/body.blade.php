<?php

use App\Models\UserAnnModel;
use App\Models\Categories;
use Illuminate\Support\Facades\Cache;


?>
        @include("lib.custom_lib")
        @yield('page-css')
    </head>
    <body>

        @if(isset($ann) && $ann->count())
            <div class="container-fluid font-bold text-center" >
                <div class="row">
                    <div class="col-12">

                        <div  class="alert alert-info mb-1 font-bold alert-dismissible fade show"
                        role="alert"  style="font-weight: bold"> {{ $ann -> message ?? ''}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
