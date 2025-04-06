<div class="product-reviews">
    <div class="reviews-top">
        <div class="reviews-header">
            <a href="#">Отзывы {{ $count ? '('.$count.')' : '' }}</a>
        </div>

        <a class="button button-ui btn_a-outline-primary" href="{{ route('products.reviews.add', $alias) }}">Добавить отзыв</a>
    </div>

    @if($reviews->count())
        <div class="reviews-list">
            @foreach($reviews as $review)
                <div class="review">
                    <div class="review-top">
                        <div class="review-user">
                            <div class="user-avatar">

                            </div>

                            <div class="user-name">

                            </div>
                        </div>

                        <div class="review-date">
                            {{ Carbon\Carbon::parse($review->created_at)->translatedFormat('j F Y') }}
                        </div>

                        <div class="review-rating">
                            {{ Widget::Rating(['rating' => $review->review_rating]) }}
                        </div>
                    </div>

                    <div class="review-content">
                        @if($review->review_advantage)
                            <div class="review-item">
                                <div class="review-title">Достоинства</div>
                                <div class="review-text">{{ $review->review_advantage }}</div>
                            </div>
                        @endif

                        @if($review->review_disadvantage)
                            <div class="review-item">
                                <div class="review-title">Недостатки</div>
                                <div class="review-text">{{ $review->review_disadvantage }}</div>
                            </div>
                        @endif

                        @if($review->review_comment)
                            <div class="review-item">
                                <div class="review-title">Комментарий</div>
                                <div class="review-text">{{ $review->review_comment }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h5 class="text-center">
            <b>Отзывов пока нет</b>
        </h5>
    @endif
</div>
