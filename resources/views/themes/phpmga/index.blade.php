@extends('themes.phpmga.main')

@section('header')
    <title>{{ systemConfig('title','PHP-Mga Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
@endsection
@section('content')
        <section id="hero" class="light-typo">
            <div id="cover-image" class="image-bg animated fadeIn"></div>
            <div class="container welcome-content">
                <div class="middle-text">
                </div>
            </div>
        </section>

        <div id="start" class="container content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    @if(!empty($article))
                        @foreach($article['data'] as $artKey=>$art)
                        <article class="clearfix @if(count($article['data']) == $artKey+1) last @endif">
                            <div class="post-date">
                               {{ date('Y-m-d',strtotime($art->created_at)) }} |
                                <a href="{{ url(route('about.show',['id'=>$art->user->id])) }}" title="{{ $art->user->name }}"  >{{ $art->user->name }}</a>
                                <span><a href="{{ route('article.show',array('id'=>$art->id)) }}#disqus_thread" title="{{ $art->title }}" >0 Comments</a></span>
                            </div>

                            <h2>
                                <a href="{{ route('article.show',array('id'=>$art->id)) }}" title="{{ $art->title }}" >
                                    {{ $art->title }}
                                </a>
                            </h2>
                            <p>
                                {{ strCut(conversionMarkdown($art->content),80) }}
                                <a class="" href="{{ route('article.show',array('id'=>$art->id)) }}" title="{{ $art->title }}" >Read more</a>
                            </p>
                        </article>
                        @endforeach
                    @endif

                    <div class="paging clearfix">
                        {!! $article['page']->render() !!}
                    </div>

                    <div class="post-popular">

                        <div class="row hidden-xs">

                            @if(!empty($hotArticle))
                            @foreach($hotArticle as $key=>$article)
                                <div class="col-sm-4 col-md-4">
                                    <a href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" >
                                        <img src="{{ getArticleImg($article->pic) }}" class="header_img-responsive" alt="img2" width="300px" height="150px" title="{{ $article->title }}" alt="{{ $article->title }}">
                                    </a>
                                    <h4 class="text-center">
                                        <a href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" >{{ $article->title }}</a>
                                    </h4>
                                    <p class="post-date text-center">{{ date('Y-m-d',strtotime($article->created_at)) }}</p>
                                </div>
                            @endforeach
                            @endif
                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
@endsection