@extends('layouts.global')
@section('title', 'Myanmar Flights Center, Airmyanmar.com, Flight Destinations')
@section('keywords')@foreach($data as $item) flight to {{$item->name}} ({{$item->code}}),@endforeach @stop
@section('description')Myanmar Flights Center, Best Deals for @foreach($data as $item){{$item->name}}({{$item->code}}),@endforeach @stop
@section('markup')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Flights",
            "item": "{{url('/')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "Destinations",
            "item": "{{url('/flights/destination')}}"
          }]
        }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "url": "{{url('/')}}",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "{{url('/destination')}}/{slug}",
            "query-input": "required name=slug"
          }
        }
    </script>
@stop
@section('content')
    <div class="container-fluid">
    @foreach($data as $item)
    <div class="col-md-3" style="margin-bottom: 15px;">
        <a href="{{url('/destination/'.$item->slug)}}">
        <div class="item">
            <div class="member-block">
                <div class="member-img" style="background: #47b200;">
                    <img src="{{url('/images/'.array_values(unserialize($item->img))['1'])}}" style="height:155px;" class="img-responsive" alt="member-img" />
                </div><!-- end member-img -->

                <div class="member-name" style="background: #f5f5f5;">
                    <h3 style="color: #ac0072;" title="Cheap Flights to {{$item->name}}">{{$item->name}}</h3>
                    <p style="font-weight: bolder; color: #000;">({{$item->code}})</p>
                </div><!-- end member-name -->
            </div><!-- end member-block -->
        </div><!-- end item -->
        </a>
    </div>
    @endforeach
    </div>
    @endsection