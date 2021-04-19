<div class="search-criteria">
    <h4>{{\App\Helper::t('your_search')}}</h4>
    <?php if (isset($_GET['make']) && $_GET['make']) : ?>
        <span class="search-criteria-badge">{{$s_make}}</span>
    <?php endif; ?>
    <?php if (isset($_GET['model']) && $_GET['model']) : ?>
        @foreach($s_model as $model)
            <span class="search-criteria-badge">{{$model}}</span>
        @endforeach
    <?php endif; ?>
    <?php if (isset($_GET['car-model'])) : ?>
    @foreach($s_models as $model)
        <span class="search-criteria-badge">{{$model}}</span>
    @endforeach
    <?php endif; ?>
    <?php if (isset($_GET['type']) && $_GET['type']) : ?>
        @foreach($s_type as $type)
            <span class="search-criteria-badge">{{$type}}</span>
        @endforeach
    <?php endif; ?>

    <?php if (isset($_GET['coupe']) && $_GET['coupe']) : ?>
        <span class="search-criteria-badge">{{$s_coupe}}</span>
    <?php endif; ?>
    <?php if (isset($_GET['year']) && $_GET['year']) : ?>
        @foreach($s_year as $year)
            <span class="search-criteria-badge">{{$year}}</span>
        @endforeach
    <?php endif; ?>
</div>
<form action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search" id="search-form" class="filters-wrapper">
    <input type="hidden" name="order" value=""/>
    <div class="type-wrapper pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_type')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($types as $t) : ?>
            <?php $is_checked = isset($_GET['type']) ? in_array($t->id, $_GET['type']) : false;  ?>
            <?php $count = \App\Product::where("type", $t->id)->count() ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= ucfirst($t->title) ?>&nbsp;({{$count}})</span>
                <input <?= $is_checked ? "checked" : "" ?> type="checkbox" name="type[]" class="filter-checkbox" value="<?= $t->id ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_make')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($makes as $m) : ?>
            <?php $is_checked = (isset($_GET['make']) ? $m['id'] == $_GET['make'] : false);
                  $count = \App\Product::where("make_id", $m['id'])->count();
                  $make = \App\Make::where('id', $m['id'])->first();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this, 'make'); toggleModels('{{$m['id']}}')">
                <img width="50" style="margin-right: 15px" src="<?= $make->getImage() ?>" alt="<?= $m['title'] ?>">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                       type="checkbox"
                       name="make"
                       class="filter-checkbox"
                       value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_drive')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($drives as $m) : ?>
            <?php $is_checked = isset($_GET['drive']) ? in_array($m['id'], $_GET['drive']) : false;
            $count = \App\Product::where("drive_id", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this))">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="drive"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_features')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($features as $m) : ?>
            <?php $is_checked = isset($_GET['feature']) ? in_array($m['id'], $_GET['feature']) : false;
            ?>
            <label class="container-checkbox " onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp</span>
                <input
                    type="checkbox"
                    name="feature[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_transmissions')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($transmissions as $m) : ?>
            <?php $is_checked = isset($_GET['transmission']) ? in_array($m['id'], $_GET['transmission']) : false;
            $count = \App\Product::where("transmission_id", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="transmission[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_doors')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($doors as $m) : ?>
            <?php $is_checked = isset($_GET['door']) ? in_array($m['id'], $_GET['door']) : false;
            $count = \App\Product::where("door_id", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="door[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_interior_color')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($colors as $m) : ?>
            <?php $is_checked = isset($_GET['interior_color']) ? in_array($m['id'], $_GET['interior_color']) : false;
            $count = \App\Product::where("interior_color_id", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="interior_color[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_exterior_color')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($colors as $m) : ?>
            <?php $is_checked = isset($_GET['exterior_color']) ? in_array($m['id'], $_GET['exterior_color']) : false;
            $count = \App\Product::where("exterior_color_id", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="exterior_color[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-make pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_fuel')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($fuels as $m) : ?>
            <?php $is_checked = isset($_GET['fuel']) ? in_array($m['id'], $_GET['fuel']) : false;
            $count = \App\Product::where("fuel", $m['id'])->count();
            ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $m['title'] ?>&nbsp;({{$count}})</span>
                <input
                    type="checkbox"
                    name="fuel[]"
                    class="filter-checkbox"
                    value="<?= $m['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-year pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_coupe')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($coupes as $c) : ?>
            <?php $is_checked = (isset($_GET['coupe']) ? $c['id'] == $_GET['coupe'] : false); ?>
            <?php $count = \App\Product::where("coupe_id", $c['id'])->count() ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this, 'coupe')">
                <span class="value-name"><?= $c['title'] ?>&nbsp;({{$count}})</span>
                <input <?= $is_checked ? "checked" : "" ?>
                       type="checkbox"
                       name="coupe"
                       class="filter-checkbox"
                       value="<?= $c['id'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pa-year pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_year')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <?php foreach ($years as $y) : ?>
            <?php $is_checked = isset($_GET['year']) ? in_array($y['text'], $_GET['year']) : false; ?>
            <?php $count = \App\Product::where("year", $y['text'])->count() ?>
            <label class="container-checkbox <?= ($count > 0 ? "" : "disable-area") ?>" onclick="filterClick(this)">
                <span class="value-name"><?= $y['text'] ?>&nbsp;({{$count}})</span>
                <input <?= $is_checked ? "checked" : "" ?> type="checkbox" name="year[]" class="filter-checkbox" value="<?= $y['text'] ?>">
                <span class="checkmark <?= $is_checked ? "checked-bg" : "" ?>">
                            <?= $is_checked ? "<i class='fa fa-check check-mark'></i>" : "" ?>
                        </span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pa-price pa-wrapper">
        <div class="attribute-label" onclick="toggleFilter(this)">
            <i class="fa fa-plus"></i>&nbsp;
            {{\App\Helper::t('by_price')}}
            <span class="filter-collapse">
                    <i class="fa fa-caret-down"></i>
                </span>
        </div>
        <div class="attribute-values">
            <div id="price-slider"></div>
            <div class="price-holder">
                <span class="min">${{$min_price!=0 ? $min_price : $price_range[0]->min}}</span>
                <span class="max">${{$max_price!=0 ? $max_price : $price_range[0]->max}}</span>
                <input type="hidden" value="{{$min_price!=0 ? $min_price : $price_range[0]->min}}" id="min-price" name="min-price" />
                <input type="hidden" value="{{$max_price!=0 ? $max_price : $price_range[0]->max}}" id="max-price" name="max-price" />
            </div>
        </div>
    </div>

    <div id="modelsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{\App\Helper::t("models")}}</h4>
                    <button type="button" class="close" onclick="closeModal('models')" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
            </div>

        </div>
    </div>

</form>
