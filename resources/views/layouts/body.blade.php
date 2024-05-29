<?php

use App\Models\UserAnnModel;
use App\Models\Categories;
use Illuminate\Support\Facades\Cache;


?>
        @include("lib.custom_lib")
        @yield('page-css')
    </head>
    <body style="min-height: 100vh !important" class="d-flex flex-column">

     @if(!(Cache::store('file')->get('isLoaderLoaded')))
     {!!
       '<section class="d-flex justify-content-center align-items-center loading-section">
            <div id="loading" class="spinner-border text-info text-center" style="width: 90px; height: 90px"
                 role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </section>' !!}
        @php Cache::store('file')->put('isLoaderLoaded', true, 3600); @endphp
    @endif
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
        <!-- main Content -->
        <main>
            @yield('content')
        </main>


        @yield('script')
    </body>
</html>
