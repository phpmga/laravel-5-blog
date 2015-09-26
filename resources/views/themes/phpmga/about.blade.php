@extends('themes.phpmga.main')

@section('header')
    <title>{{ $userInfo->name }} {{ systemConfig('title','PHP-Mga Blog') }}</title>
    <meta name="keywords" content="{{ $userInfo->name }},{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{!! str_limit(preg_replace('/\s/', '',strip_tags(conversionMarkdown($userInfo->desc))),100) !!}">
@endsection

@section('content')
    <section id="hero" class="light-typo">
        <div id="cover-image" class="image-bg animated fadeIn"></div>
        <div class="container welcome-content">
            <div class="middle-text">
                <h1> {{ $userInfo->name }}</h1>
            </div>
        </div>
    </section>

    <section id="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('article.index') }}" title="{{ systemConfig('title','PHP-Mga Blog') }}">Home</a></li>
                        <li class="active">{{ $userInfo->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-9 col-md-8 ">
                        {!! conversionMarkdown($userInfo->desc) !!}
                    </div>
                    <div class="col-sm-3 col-md-4">
                        <img src="{{ asset('uploads'.'/'.$userInfo->photo) }}" class="img-responsive img-circle about-portrait" alt="{{ $userInfo->name }}" title="{{ $userInfo->name }}" width="300" height="300">
                    </div>
                </div>

                <div class="post-popular">
                    <div class="row hidden-xs">
                        @if(!empty($userArticle))
                            @foreach($userArticle as $articleModel)
                                <div class="col-sm-4 col-md-4">
                                    <a href="{{ route('article.show',array('id'=>$articleModel->id)) }}" title="{{ $articleModel->title }}" >
                                        <img src="{{ getArticleImg($articleModel->pic) }}" class="img-responsive" title="{{ $articleModel->title }}" alt="{{ $articleModel->title }}" style="height: 200px;"></a>
                                    <h4 class="text-center">
                                        <a href="{{ route('article.show',array('id'=>$articleModel->id)) }}" title="{{ $articleModel->title }}" >
                                            {{ $articleModel->title }}
                                        </a>
                                    </h4>
                                    <p class="post-date text-center">
                                        {{ date('Y-m-d',strtotime($articleModel->created_at)) }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection