@extends('layouts.main')

@section('title')
    Добавить отзыв
@endsection

@section('content')
    <div class="site-reviews-add">
        <div class="c-card">
            <div class="c-card-header mb-3">
                <h2>Добавить отзыв</h2>
            </div>

            <div class="c-card-body column-2">
                <div class="row>">
                    <div class="col-6">
                        <form id="form-pay-tinkoff" action="{{ route('products.reviews.add', $product->prod_alias) }}" method="post">
                            @csrf

                            <div class="form-group mb-3"><label class="control-label mb-1 width-100">Общая оценка</label>
                                <input type="range" class="width-50" step="1" min="1" max="5" list="markers" name="review_rating"/>
                                <datalist id="markers">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </datalist>
                            </div>

                            <div class="form-group mb-3"><label class="control-label mb-1">Достоинства</label>
                                <textarea class="form-control" name="review_advantage" required></textarea>
                            </div>

                            <div class="form-group mb-3"><label class="control-label mb-1">Недостатки</label>
                                <textarea class="form-control" name="review_disadvantage" required></textarea>
                            </div>

                            <div class="form-group mb-3"><label class="control-label mb-1">Комментарий</label>
                                <textarea class="form-control" name="review_comment" required></textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="button button-ui btn_a-primary button-small" name="send">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
