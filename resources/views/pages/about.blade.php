@include('includes.header')
    <!-- Topbar Start -->
    @include('includes.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('includes.navbar')
    <!-- Navbar End -->


       <!-- Header Start -->
       <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog Detail</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Booking Start -->
    @include('includes.booking');
    <!-- Booking End -->



    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    @include('includes.blogdetail')
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    @include('includes.commentlist')
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                   @include('includes.commentform')
                    <!-- Comment Form End -->
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    @include('includes.authorbio')
    
                    <!-- Search Form -->
                   @include('includes.search')

                    <!-- Category List -->
                   @include('includes.category')
    
                    <!-- Recent Post -->
                    @include('includes.recent_posts')
    
                    <!-- Tag Cloud -->
                    @include('includes.tagcloud')
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    @include('includes.footer')