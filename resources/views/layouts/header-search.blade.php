@php
$makes = json_encode(\App\Helper::getAllMakesForSelect2());
$years = json_encode(\App\Helper::getAllYears());
@endphp
<script>
    var makes = <?= $makes ?>;
    var years = <?= $years ?>;
    var placeholderMake = '<?= \App\Helper::t('placeholder_make') ?>';
    var placeholderModel = '<?= \App\Helper::t('placeholder_model') ?>';
    var placeholderYear = '<?= \App\Helper::t('placeholder_year') ?>';
</script>
<div class="header-search-wrapper">
    <input type="hidden" id="test">
    <form action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search" method="get">
        <select name="year[]" class="year">
            <option value=""></option>
        </select>
        <select name="make" class="make">
            <option value=""></option>
        </select>
        <select name="model[]" class="model">
            <option value=""></option>
        </select>
        <input type="submit" class="theme-btn" id="submit" value="{{\App\Helper::t('search')}}" />
    </form>
</div>
