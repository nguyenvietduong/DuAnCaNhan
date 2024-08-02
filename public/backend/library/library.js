(function ($) {
    "use strict";
    var PMD = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    PMD.switchery = () => {
        $('.js-switch').each(function () {
            // let _this = $(this)
            var switchery = new Switchery(this, { color: '#1AB394', size: 'small' });
        })
    }

    PMD.select2 = () => {
        if ($('.setupSelect2').length) {
            $('.setupSelect2').select2();
        }

    }

    PMD.sortui = () => {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    }

    PMD.changeStatus = () => {
        $(document).on('change', '.status', function (e) {
            let _this = $(this)
            let option = {
                'value': _this.val(),
                'modelId': _this.attr('data-modelId'),
                'model': _this.attr('data-model'),
                'modelCheck': _this.attr('data-check'),
                'field': _this.attr('data-field'),
                '_token': _token
            }

            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function (res) {
                    let inputValue = ((option.value == 1) ? 2 : 1)
                    if (res.flag == true) {
                        _this.val(inputValue)
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {

                    console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });

            e.preventDefault()
        })
    }

    PMD.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function (e) {
                let _this = $(this)
                let id = []
                $('.checkBoxItem').each(function () {
                    let checkBox = $(this)
                    if (checkBox.prop('checked')) {
                        id.push(checkBox.val())
                    }
                })

                let option = {
                    'value': _this.attr('data-value'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    'id': id,
                    '_token': _token
                }

                $.ajax({
                    url: 'ajax/dashboard/changeStatusAll',
                    type: 'POST',
                    data: option,
                    dataType: 'json',
                    success: function (res) {
                        if (res.flag == true) {
                            let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;';
                            let cssActive2 = 'left: 13px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;';
                            let cssUnActive = 'background-color: rgb(255, 255, 255); border-color: rgb(223, 223, 223); box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;'
                            let cssUnActive2 = 'left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;'

                            for (let i = 0; i < id.length; i++) {
                                if (option.value == 2) {
                                    $('.js-switch-' + id[i]).find('span.switchery').attr('style', cssActive1).find('small').attr('style', cssActive2)
                                } else if (option.value == 1) {
                                    $('.js-switch-' + id[i]).find('span.switchery').attr('style', cssUnActive).find('small').attr('style', cssUnActive2)
                                }
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                    }
                });

                e.preventDefault()
            })
        }
    }

    PMD.checkAll = () => {
        if ($('#checkAll').length) {
            $(document).on('click', '#checkAll', function () {
                let isChecked = $(this).prop('checked')
                $('.checkBoxItem').prop('checked', isChecked);
                $('.checkBoxItem').each(function () {
                    let _this = $(this)
                    PMD.changeBackground(_this)
                })
            })
        }
    }

    PMD.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function () {
                let _this = $(this)
                PMD.changeBackground(_this)
                PMD.allChecked()
            })
        }
    }

    PMD.changeBackground = (object) => {
        let isChecked = object.prop('checked')
        if (isChecked) {
            object.closest('tr').addClass('active-bg')
        } else {
            object.closest('tr').removeClass('active-bg')
        }
    }

    PMD.allChecked = () => {
        let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
        $('#checkAll').prop('checked', allChecked);
    }

    PMD.int = () => {
        $(document).on('change keyup blur', '.int', function () {
            let _this = $(this)
            let value = _this.val()
            if (value === '') {
                $(this).val('0')
            }
            value = value.replace(/\./gi, "")
            _this.val(PMD.addCommas(value))
            if (isNaN(value)) {
                _this.val('0')
            }
        })

        $(document).on('keydown', '.int', function (e) {
            let _this = $(this)
            let data = _this.val()
            if (data == 0) {
                let unicode = e.keyCode || e.which;
                if (unicode != 190) {
                    _this.val('')
                }
            }
        })
    }


    PMD.convertInput = () => {
        $('input[name=name]').on('keyup', function () {
            let input = $(this)
            let value = PMD.removeUtf8(input.val())
            $('.inputSlug').val(value)
        });
    }



    PMD.addCommas = (nStr) => {
        nStr = String(nStr);
        nStr = nStr.replace(/\./gi, "");
        let str = '';
        for (let i = nStr.length; i > 0; i -= 3) {
            let a = ((i - 3) < 0) ? 0 : (i - 3);
            str = nStr.slice(a, i) + '.' + str;
        }
        str = str.slice(0, str.length - 1);
        return str;
    }


    PMD.removeUtf8 = (str) => {
        str = str.toLowerCase(); // chuyen ve ki tu biet thuong
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|,|\.|\:|\;|\'|\–| |\"|\&|\#|\[|\]|\\|\/|~|$|_/g, "-");
        str = str.replace(/-+-/g, "-");
        str = str.replace(/^\-+|\-+$/g, "");
        return str
    }


    $(document).ready(function () {
        PMD.switchery();
        PMD.select2();
        PMD.changeStatus();
        PMD.checkAll();
        PMD.checkBoxItem();
        PMD.allChecked();
        PMD.changeStatusAll();
        PMD.sortui();
        PMD.int();
        PMD.convertInput();
    });

})(jQuery);

