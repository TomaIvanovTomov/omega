<script>
    var makes = <?= json_encode(\App\Helper::getAllMakesForSelect2()) ?>;
    var years = <?= json_encode(\App\Helper::getAllYears()) ?>;
    var zip = <?= json_encode(\App\Helper::getCarZips()) ?>;
    var placeholderZip = '<?= \App\Helper::t('placeholder_zip') ?>';
    var placeholderYear = '<?= \App\Helper::t('placeholder_year') ?>';
    var placeholderMake = '<?= \App\Helper::t('placeholder_make') ?>';
    var placeholderModel = '<?= \App\Helper::t('placeholder_model') ?>';
</script>
<div class="header-search-wrapper">
    <div class="container">
        <div class="content-wrapper">
            <h1>{{\App\Helper::t('used_cars_price_quote')}}</h1>
            <h5>{{\App\Helper::t('used_cars_search_slogan')}}</h5>
            <form action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search" method="get">
                <input type="hidden" name="type[]" value="2" />
                <select name="year[]" id="year">
                    <option value=""></option>
                </select>
                <select name="make" class="make">
                    <option value=""></option>
                </select>
                <select name="model[]" class="model">
                    <option value=""></option>
                </select>
                <select name="zip" id="zip">
                    <option value=""></option>
                </select>
                <input type="submit" class="theme-btn" name="search" id="submit" value="{{\App\Helper::t('search')}}" />
            </form>
        </div>
    </div>
</div>
