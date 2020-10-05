<section style="background-color: #fcf8F0;">
    <div class="row" style="background-color: #FACAC3;">
        <div class="col-md-4 col-8 text-center py-5 mx-auto">
            <img src="{{ asset('frontend/images/blog/blog.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
    </div>
    <div style="background-color: #fcf8F0;">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-md-2 col-4 text-center pt-5 blog-filter" id="filter-all" style="cursor:pointer; border-bottom: 3px solid #f3795c;">
                        <a href="#">
                            <img src="{{ asset('frontend/images/blog/all.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 65px;">
                            <p class="pt-3 text-blog-filter" style="color: #f3795c; font-weight: bold; font-size: 17px;">ALL</p>
                        </a>
                    </div>
                    @php($categoryblog = App\categoryblog::all())

                    @foreach($categoryblog as $key => $value)
                    <div class="col-md-2 col-4 text-center pt-5 blog-filter">
                        <a href="#">
                            <img src="{{ asset('frontend/images/blog/').'/'.$value->icon }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 65px;">
                            <p class="pt-3 text-blog-filter" id="title" data-id="{{$value->id}}" style="color: black; font-weight: bold; font-size: 17px;">{{strtoupper($value->title)}}</p>
                        </a>
                    </div>
                    @endforeach
                    <!-- <div class="col-2 text-center pt-5 blog-filter" style="cursor:pointer;">
                        <a href="#">
                            <img src="{{ asset('frontend/images/blog/skin-concern.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 65px;">
                            <p class="pt-3 text-blog-filter" style="color: black; font-weight: bold; font-size: 17px;">SKIN CONCERN</p>
                        </a>
                    </div>
                    <div class="col-2 text-center pt-5 blog-filter" style="cursor:pointer;">
                        <a href="#">
                            <img src="{{ asset('frontend/images/blog/skincare-routine.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 65px;">
                            <p class="pt-3 text-blog-filter" style="color: black; font-weight: bold; font-size: 17px;">SKINCARE ROUTINE</p>
                        </a>
                    </div>
                    <div class="col-2 text-center pt-5 blog-filter" style="cursor:pointer;">
                        <a href="#">
                            <img src="{{ asset('frontend/images/blog/mitos.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 65px;">
                            <p class="pt-3 text-blog-filter" style="color: black; font-weight: bold; font-size: 17px;">MITOS ATAU FAKTA</p>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container">
