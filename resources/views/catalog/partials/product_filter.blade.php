<div class="products-filter">
    <div class="filter-item">
        <div class="filter-group_wrap">
            <div class="filter-name">Цена</div>
            <div class="filter-group">
                <div class="form-group field-productfilter-min_price has-success">
                    <input type="text" class="form-control" name="ProductFilter[min_price]" placeholder="от 12567">
                </div>

                <div class="form-group field-productfilter-max_price">
                    <input type="text" class="form-control" name="ProductFilter[max_price]" placeholder="до 65000">
                </div>
            </div>
        </div>
    </div>

    <div class="filter-item">
        <div class="btn-group">
            <button type="submit" class="button button-ui btn_a-primary" name="filter" value="apply">Применить</button>
        </div>

        @if($filter->is_filter)
            <div class="btn-group">
                <button type="submit" class="button button-ui btn_a-secondary" name="filter" value="reset">Сбросить</button>
            </div>
        @endif
    </div>
</div>
