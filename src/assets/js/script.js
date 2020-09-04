$(document).ready(function () {
    $('#accordionExample').on('hidden.bs.collapse', function (e) {
        console.log($(`#${$(e.target).attr('aria-labelledby')} .collapse-icon`)[0].classList)
        $(`#${$(e.target).attr('aria-labelledby')} .collapse-icon`)[0].classList.add('fa-plus')
        $(`#${$(e.target).attr('aria-labelledby')} .collapse-icon`)[0].classList.remove('fa-minus')
    })

    $('#accordionExample').on('shown.bs.collapse', function (e) {
        $(`#${$(e.target).attr('aria-labelledby')} .collapse-icon`)[0].classList.remove('fa-plus')
        $(`#${$(e.target).attr('aria-labelledby')} .collapse-icon`)[0].classList.add('fa-minus')
    })
})