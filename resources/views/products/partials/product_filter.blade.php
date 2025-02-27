<form>
    <div class="products-filter">
        <div class="filter-item">
            <div class="filter-group_wrap">
                <div class="filter-name">Цена</div>
                <div class="filter-group">
                    <div class="form-group field-productfilter-min_price">
                        <input type="text" class="form-control" name="filter[min_price]" placeholder="от 12567" value="{{ $filter->min_price }}">
                    </div>

                    <div class="form-group field-productfilter-max_price">
                        <input type="text" class="form-control" name="filter[max_price]" placeholder="до 65000" value="{{ $filter->max_price }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="filter-item">
            <div class="btn-group">
                <button type="submit" class="button button-ui btn_a-primary" name="filter[action]" value="apply">Применить</button>
            </div>

            @if($filter->is_filter)
                <div class="btn-group">
                    <button type="submit" class="button button-ui btn_a-secondary" name="filter[action]" value="reset">Сбросить</button>
                </div>
            @endif
        </div>
    </div>
</form>
