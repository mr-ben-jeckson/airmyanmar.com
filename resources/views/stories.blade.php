@extends('layouts.global')
@section('title')Myanmar Flights Center: Airmyanmar.com - Stories @stop
@section('keywords')Myanmar Flights Center, Airmyanmar.com, Flights from Myanmar/Burma @stop
@section('description','Myanmar Flights Center - Stories')
@section('content')
    <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Stories</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Stories</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <section class="innerpage-wrapper">
        <div id="dashboard" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="dashboard-heading">
                            <h2><span>Stories</span></h2>
                            <p>Myanmar Flights Center / Air Myanmar's Community</p>
                            <p>Learn more the following stories to claim easy travel tips</p>
                        </div><!-- end dashboard-heading -->
                    </div>
                    @foreach($data as $item)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-bottom: 15px;">
                        <div class="main-block blog-post blog-list">
                            <div class="main-img blog-post-img">
                                <a href="{{url('/stories/'.$item->slug)}}">
                                    <img src="{{url('images/stories/'.$item->img)}}" class="img-responsive" alt="{{$item->title}}" />
                                </a>
                                <div class="main-mask blog-post-info">
                                    <ul class="list-inline list-unstyled blog-post-info">
                                        <li><span><i class="fa fa-calendar"></i></span>{{$item->created_at->diffforHumans()}}</li>
                                        <li><span><i class="fa fa-user"></i></span>By: <a href="#">{{$item->name}}</a></li>
                                    </ul>
                                </div>
                            </div><!-- end blog-post-img -->

                            <div class="blog-post-detail">
                                <h2 class="blog-post-title"><a href="{{url('/stories/'.$item->slug)}}">{{$item->title}}</a></h2>
                                <div class="col-md-12">
                                    {!! substr(html_entity_decode($item->content),0,200) !!}
                                </div>
                                <a href="{{url('/stories/'.$item->slug)}}" class="btn btn-orange">Read More</a>
                            </div><!-- end blog-post-detail -->
                            <div class="clearfix"></div>
                        </div><!-- end blog-post -->
                    </div>
                        @endforeach
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection