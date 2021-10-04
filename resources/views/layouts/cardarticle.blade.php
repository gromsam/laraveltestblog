<div class="card">
    <a href="/articles/{{ $article->slug }}" >
        <img src="{{$article->image}}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
        <a href="/articles/{{ $article->slug }}" >
            <h5 class="card-title">{{$article->title}}</h5>
        </a>
        <p class="card-text">{{ $article->preview }} ...</p>
        <a href="/articles/{{ $article->slug }}" class="btn btn-primary btn-lg w-100">Подробнее</a>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <card-like
            :count="{{ $article->like }}"
            :post_id="{{ $article->id }}"
        ></card-like>
        <card-view
            :count="{{ $article->view  }}"
        ></card-view>
    </div>
</div>
