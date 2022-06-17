@extends('layouts.site')
@section('main')

    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{url('public/Uploads')}}/{{$blog->image}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o">{{$blog->created_at}}</i> </li>
                                    </ul>
                                    <h5><a href="{{route('blog_detail', ['id' => $blog->id])}}">{{$blog->name}}</a></h5>
                                    <p>{{$blog->description}}</p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop()