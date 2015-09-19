@extends('themes.keylime.main')

@section('header')
    <title>404_{{ systemConfig('title','Enda Blog') }}-Powered By{{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
@endsection

@section('content')
<section id="hero" class="light-typo">
    <div id="cover-image" class="image-bg3 animated fadeIn"></div>
    <div class="container welcome-content">
        <div class="middle-text">
            <h1>Ah，a página que você procura não pode ser encontrada</h1>
            <h2>Veja outros artigos</h2>
            <a class="btn" href="{{ url('/') }}" title="{{ systemConfig('title','Enda Blog') }}">Home</a><br>
        </div>
    </div>
</section>

<div class="container content">
    <div class="post-popular">
        <div class="row hidden-xs">
            {{ viewInit() }}
            <?php $hotArticle = App\Model\Article::getHotArticle(3)?>
            @if(!empty($hotArticle))
                @foreach($hotArticle as $key=>$article)
                    <div class="col-sm-4 col-md-4">
                        <a href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" target="_blank">
                            <img src="{{ asset('uploads/'.$article->pic) }}" class="img-responsive" width="300px" height="150px" title="{{ $article->title }}" alt="{{ $article->title }}">
                        </a>
                        <h4 class="text-center">
                            <a href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" target="_blank">{{ $article->title }}</a>
                        </h4>
                        <p class="post-date text-center">{{ date('Y-m-d',strtotime($article->created_at)) }}</p>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</div>
@endsection