<div class="d-none d-sm-block sidebar p-4">
    <div>
        <h1>Marketplace</h1>
        <form action="/" class="search-form pt-2 pb-3">
            <input type="text" class="form-control" placeholder="Search Marketplace">
        </form>
    </div>
    <div>
        <ul>
            <li class="active"><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-store"></i></div> Browse All</div></a></li>
            <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-bag-shopping"></i></div> Buying</div></a></li>
            <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-money-bill-wave"></i></div> Selling</div></a></li>
        </ul>
    </div>
    <div>
        <a href="{{route('create_listing')}}" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Create new listing</a>
    </div>
    <hr>
    <div>
        <p class="cont-title">Categories</p>
        <ul>
            <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-bowl-food"></i></div> Food</div></a></li>
            <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-laptop"></i></div> Gadgets</div></a></li>
            <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-car"></i></div> Cars</div></a></li>
        </ul>
    </div>
</div>

<div class="d-block d-sm-none sidebar-mobile">
    <div class="d-flex justify-content-between pt-4 px-4">
        <button id="sidebar-menu"><i class="fa-solid fa-bars"></i></button>
        <div>
            <a href="create-listing.php" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Create new listing</a>
        </div>
    </div>
    <hr>
    <div class="px-4">
        <h1>Marketplace</h1>
        <form action="/" class="search-form pt-2 pb-3">
            <input type="text" class="form-control" placeholder="Search Marketplace">
        </form>
    </div>
    <div class="sidebar-toggle py-2">
        <div>
            <ul>
                <li class="active"><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-store"></i></div> Browse All</div></a></li>
                <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-bag-shopping"></i></div> Buying</div></a></li>
                <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-money-bill-wave"></i></div> Selling</div></a></li>
            </ul>
        </div>
        <hr>
        <div>
            <p class="cont-title px-4">Categories</p>
            <ul>
                <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-bowl-food"></i></div> Food</div></a></li>
                <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-laptop"></i></div> Gadgets</div></a></li>
                <li><a href="{{route('marketplace')}}"><div class="ul-menu"><div class="icon-cont"><i class="fa-solid fa-car"></i></div> Cars</div></a></li>
            </ul>
        </div>
    </div>
</div>