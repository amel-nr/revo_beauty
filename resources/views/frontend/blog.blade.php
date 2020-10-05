@extends('frontend.layouts.app')

@section('content')

@include('frontend.inc.blog_header')
            <div id="data" class="row pt-5 mx-0">
            </div>
                <!-- <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">MITOS ATAU FAKTA</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKINCARE ROUTINE</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKINCARE ROUTINE</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKINCARE ROUTINE</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKINCARE ROUTINE</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div> -->
            
            <!-- <div class="row pt-5 mx-0">
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0; width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKINCARE ROUTINE</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">SKIN CONCERN</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
                <div class="col-4 ">
                    <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0;  width: 50%;">
                        <p style="color: white; font-size: 14px;" class="text-center">MITOS ATAU FAKTA</p>
                    </div>
                    <div class="content-blog">
                        <a href="">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="blog-hover">
                                <div class="p-blog text-center">
                                    <p>CLICK ME</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">BEDA EYE GEL, EYE CREAM <br> DAN EYE SERUM</p>
                </div>
            </div> -->
@include('frontend.inc.blog_footer')
            
@endsection