$(function () {
    $(document).ready(function() {
        const make_select = $('.make')
        const model_select = $('.model')
        const year_select = $('.year')
        year_select.select2({
            data: window.years,
            placeholder: window.placeholderYear,
        });
        make_select.select2({
            data: window.makes,
            placeholder: window.placeholderMake,
        });
        make_select.on('change', function () {
            let _this = $(this)
            $.ajax({
                method: "get",
                url: "/car-models/get-models",
                data: {
                    id: _this.find(':selected').val()
                }
            })
            .then(function (res) {
                console.log(res)
                model_select.find("option").each(function (){
                    $(this).remove()
                })
                model_select.select2({
                    data: res
                })
            })
        })

        model_select.select2({
            placeholder: window.placeholderModel
        });

        $('#zip').select2({
            data: window.zip,
            placeholder: window.placeholderZip
        });

        $('#year').select2({
            data: window.years,
            placeholder: window.placeholderYear
        });

        $(".recommended_carousel").owlCarousel({
            loop: true,
            items: 4,
            margin: 15,
            nav:true,
            stagePadding: 40,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });

        const slider = $('.homepage-product-type')
        slider.owlCarousel({
            loop: true,
            margin:10,
            nav:true,
            stagePadding: 40,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:4
                },
                1000:{
                    items:8
                }
            }
        })
        let first_item = slider.find('.owl-item.active').eq(1)
        first_item.addClass('active-item')
        slider.find('.owl-next').on("click", function () {
            first_item.removeClass('active-item')
            let actives = slider.find('.owl-item.active')
            slider.find('.owl-item').removeClass('active-item')
            actives.eq(1).addClass('active-item')
        })

        $(".wishlist-badge").on('click', function () {
            let _this = $(this)
            $.ajax({
                method: 'get',
                url: "/wishlist/save",
                data: {
                    id: $(this).find('input[name="product_id"]').val()
                }
            })
                .then(function (res) {
                    console.log(res)
                    if (res === '1') {
                        $.notify('Product added to wishlist', 'success')
                        console.log($(this))
                        _this.removeClass('not-wish')
                        _this.addClass('in-wish')
                    } else if (res === '2') {
                        $.notify('Product removed from wishlist', 'success')
                        _this.removeClass('in-wish')
                        _this.addClass('not-wish')
                    } else {
                        $.notify('Please, login first', 'success')
                    }
                })
        })

        $('.grid-wrapper').find('i').on('click', function () {
            const grid = $(this).next('input[name="grid"]')
            const lang = grid.next('input[name="lang"]')
            const query = location.href.split("?")[1]
            if (location.href.includes('grid')) {
                let new_params = query.split("&").map(function (param) {
                    if (param.includes('grid')) {
                        let pair = param.split('=')
                        pair[1] = grid.val()
                        param = pair.join("=")
                    }
                    return param
                })
                new_params = new_params.join("&")
                location.href = "/" + lang.val() + "/search?" + new_params
            } else {
                location.href = "/" + lang.val() + "/search?" + query + "&grid=" + grid.val()
            }
        })
    });

    $('.type-badge').on('click', function () {
        let id = $(this).find('input[type="hidden"]').val()
        let form = $(this).closest('form')
        form.find('input[name="single-type"]').val(id)
        form.submit()
    })

    $('.car-details-carret').on('click', function () {
        $('.car-details').toggle()
    })

    $('.car-features-carret').on('click', function () {
        $('.car-features').toggle()
    })

    const minPrice = parseFloat(window.minPrice)
    const maxPrice = parseFloat(window.maxPrice)
    const currentMinPrice = parseFloat(window.currentMinPrice)
    const currentMaxPrice = parseFloat(window.currentMaxPrice)
    const priceHolderMin = $(".price-holder").find('.min')
    const priceHolderMax = $(".price-holder").find('.max')
    $("#price-slider").slider({
        min: minPrice,
        max: maxPrice,
        step: 1,
        values: [currentMinPrice, currentMaxPrice],
        slide: function (event, ui) {
            priceHolderMin.text("$"+ui.values[0])
            priceHolderMax.text("$"+ui.values[1])
            $('#min-price').val(ui.values[0])
            $('#max-price').val(ui.values[1])
        },
        stop: function (event, ui) {
            $("#search-form").submit()
        }
    })

    $('.car-page-carousel').owlCarousel({
        thumbs: true,
        thumbsPrerendered: true,
        loop: true,
        items: 1
    });

    $(".enquire").on('submit', function () {
        const _token = $(this).find('input[name="_token"]').val()
        $.ajax({
            method: 'post',
            url: "/send-enquire",
            data: $(this).serialize()
        })
        .then(function (res) {
            res = JSON.parse(res)
            if (res.type == 'success') {
                $('.response-message').text(res.message).show()
                setTimeout(function () {
                    window.location.href = res.referer
                }, 3000)
            }
        })
        return false
    })

    $('.container-checkbox').on('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        const _this = $(this)
        const fa = $("<i>", {
            "class": "fa fa-check check-mark"
        })
        const checkbox = _this.find('.filter-checkbox')
        const checkmark = _this.find('.checkmark')
        checkbox.prop("checked", !checkbox.prop("checked"))
        console.log(!checkmark.html().includes('fa-check'))
        if (!checkmark.html().includes('fa-check')) {
            checkmark.addClass('checked-bg')
            checkmark.append(fa)
        } else {
            checkmark.removeClass("checked-bg")
            checkmark.html("")
        }
    })

    $("#images_input").fileinput({
        showRemove: false,
        showUpload: false
    });

})

function toggleFilter(e) {
    const _this = $(e)
    const values = _this.next('.attribute-values')
    values.toggle()
    const collapse = _this.find('.filter-collapse')
    if (values.is(":visible"))
        collapse.html("<i class='fa fa-caret-up'></i>")
    else
        collapse.html("<i class='fa fa-caret-down'></i>")
}

function filterClick(e, type = '') {
    const search_form = $("#search-form")
    const _this = $(e)

    if (type === 'make') {
        return false
    }
    if (type === 'coupe') {
        search_form.find('input[name="coupe"]:checked').prop("checked", false)
    }
    if (type === 'brand') {
        search_form.find('input[name="brand"]:checked').prop("checked", false)
    }

    const fa = $("<i>", {
        "class": "fa fa-check check-mark"
    })

    const checkbox = _this.find('.filter-checkbox')
    const checkmark = _this.find('.checkmark')
    checkbox.prop("checked", !checkbox.prop("checked"))
    if (!checkmark.html().includes('fa-check')) {
        checkmark.addClass('checked-bg')
        checkmark.append(fa)
    } else {
        checkmark.removeClass("checked-bg")
        checkmark.html("")
    }
    if (type === 'model') {
        return false
    }
    search_form.submit()
}

function toggleModels(id) {
    let modal = $("#modelsModal")
    $.ajax({
        method: "get",
        url: "/get-models",
        data: {
            id: id
        }
    })
    .then(function (res) {
        modal.find('.modal-body').html(res)
        modal.removeClass("fade")
        modal.css("display", "block")
        modal.css("background-color", "rgba(0,0,0,0.7)")
    })
}

function closeModal(type = '') {
    const modal = $(".modal")
    modal.css("display", "none")
    if (type === 'models') {
        modal.closest("form").submit()
    }
}

function setOrder(e) {
    $("input[name='order']").val($(e).val())
    $("#search-form").submit()
}
