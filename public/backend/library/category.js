(function ($) {
    "use strict";
    var NVD = {};

    NVD.addCategory = () => {
        $(document).on('click', '.addCategory', function () {
            $('.allDate').append(NVD.renderInputDate());
        })
    }

    NVD.renderInputDate = () => {
        let html = ''
        html += `
        <div class="form-row formDate mb15">
            <div class="deleteDate"><i class="fa fa-trash"></i></div>
            <input type="date" name="time[]" value=""
                class="form-control" placeholder="" autocomplete="off">
        </div>
        `
        return html
    }


    NVD.deleteDate = () => {
        $(document).on('click', '.deleteDate', function () {
            $(this).closest('.form-row').remove();
        })
    }


    $(document).ready(function () {
        NVD.addCategory();
        NVD.deleteDate()
    });



})(jQuery);
