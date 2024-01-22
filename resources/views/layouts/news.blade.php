<section class="newsSection" id="news">
    <div class="container">
        <h3 class="title title-withDot">Новости и акции</h3>
        <div class="slider slider-light news-slider">
            @php
                $posts = \App\Models\News::limit(5)->where(['branch_id' => \App\Services\BranchService::current()->id])->get();
            @endphp
            @foreach($posts as $post)
                <div class="slider__item">
                    <div class="card">
                        <a href="/news/{{$post->id}}" class="card__image image" aria-label="Preview Image">
                            <img src="{{$post->getImage()}}" width="auto" height="auto" alt="{{$post->title}}" class="card__image image"/>
                        </a>
                        <div class="card__content">
                            <p class="text-s">{{$post->title}}</p>
{{--                            <p class="text-s date">{{$post->created_at}}</p>--}}
                            <a href="/news/{{$post->id}}" class="button newsSection__hoverButton"
                            >Читать статью</a
                            >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
