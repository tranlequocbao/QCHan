<?php
if (!isset($_SESSION)) session_start();
if (isset($home_folder)) {
    $url = $home_folder;
} else {
    if (strpos($_SERVER['HTTP_HOST'], 'localhost') == 0) {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $uri[1] . '/';
    } else {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
    }
}

$url1=$_SERVER['DOCUMENT_ROOT'];

require_once $url1.'/QC_Han/connectdata.php';

//    $aryShowNoteDisabled = ['check_repair'];

?>

<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $url . 'Dashboard/assets/img/apple-icon.png' ?>">
    <link rel="icon" type="image/png" href="<?= $url . 'Dashboard/assets/img/favicon.png' ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Trạm 03 xưởng Hàn
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php if(isset($_SESSION['Station'])) : ?>
        <meta name="_ps" content="<?=$_SESSION['Station']?>">
        <meta name="_level" content="<?=($_SESSION['Station'] == 'Trạm 3' ? '2' : '3')?>">
        <meta name="_type" content="<?=($_SESSION['Station'] == 'Trạm 2' ? '2' : '1')?>">
    <?php endif; ?>
    <title>//</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= $url . 'Dashboard/assets/css/material-dashboard.css?v=2.1.2' ?>" rel="stylesheet " />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= $url . 'Dashboard/assets/demo/demo.css' ?>" rel="stylesheet" />
    <link href="<?= $url . 'page/assets/css/home.css' ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= $url . 'vendor/owl_carousel/css/owl.carousel.min.css' ?>">
   
    <link rel="stylesheet" href="<?= $url . 'vendor/owl_carousel/css/owl.theme.default.min.css' ?>">
    <link rel="stylesheet" href="<?= $url . 'vendor/bootstrap/css/bootstrap.min.css' ?>">


    <style>
        .error_point {
            width: 15px;
            height: 15px;
        }

        #history_modal .modal-body tr th,
        #history_modal .modal-body tr td {
            text-align: center;
        }

        #header {
            transition: all .2s;
        }

        .__hard_menu {
            position: fixed;
            top: 0;
            right: 0;
            padding: 7px 22px;
            background: darkcyan;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            transition: all .2s;
            z-index: 1366;
        }

        @media (min-width: 992px) {
            #history_modal .modal-dialog {
                max-width: 600px;
                margin: 1.75rem auto;
            }
        }
    </style>


<body>

    <div id="_bg_errorConfig" class="d-none" onclick="$('.showErrorConfig').click()"></div>
    <div id="errorConfig" class="left">
        <div class="_close" onclick="$('.showErrorConfig').click()">
            <i class="fa fa-close"></i>
        </div>
        <div class="_list">
            <ul></ul>
        </div>
    </div>
    <div class="row pt-3 pb-3">
        <div class="col-8">

        </div>

    </div>
    <div class="content">
        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-transparent ">
                <button type="button" class="btn btn-primary position-fixed" id="submit" style="top:80px; right:5px; z-index:2; display:none">Lưu</button>
                <div class="container-fluid">

                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Trạm Sửa chữa bề mặt, mối hàn Body</a>

                    </div>
                </div>

            </nav>


        </div>
    </div>

    <section id="header">

        <div class="showErrorConfig" onclick="$('#errorConfig').toggleClass('left');$('#_bg_errorConfig').toggleClass('d-none');$('body').toggleClass('no-scroll')">
            <i class="fa fa-bars"></i>
        </div>

        <div class="container">
            <div class="row pt-3 pb-3">
                <div class="col-8 d-flex">
                    <div class="form-group m-0 form_input_code d-flex w-100">
                        <?php if (isset($_GET['code_user'])) : ?>
                            <input type="text" class="form-control" id="car_code" placeholder="Car code" value="<?= $_GET['code_user'] ?>" readonly>
                        <?php else :
                            $code = 'vin_code';
                            if ($_SESSION['Station'] == 'Trạm 3') {
                                $sql = 'SELECT DISTINCT(vincode) as vin_code FROM `vin_03` ORDER BY `checked` asc, `updated_at` ASC';
                                $result = $conn->query($sql);
                            }
                            echo '<input type="text" class="form-control" id="vin-car-change" placeholder="Car code" value="" background="White" >';
                            echo '<div class="select-group scroll-custom" id="vincode_select_user">';

                            while ($code_vin = mysqli_fetch_assoc($result)) {
                                echo "<div class='select-item all' data-val='" . $code_vin['vin_code'] . "'>" . $code_vin['vin_code'] . "</div>";
                            }
                            echo "</div>";
                        ?>
                        <?php endif; ?>

                    </div>
                    <input type="text" class="form-control d-inline-block w-100" style="display: none !important" id="car_code" value="" disabled>
                    <!--                <button class="btn btn-success w-25 d-inline-block ml-3 button_header" onclick="return false;" disabled>Export</button>-->
                </div>
                <div class="col-4">
                    <div class="row_1">
                        <h4 class="d-inline-block">Hi <a href="<?= $url ?>"><?= $_SESSION['Name'] ?></a>!</h4>
                        <a href="<?= $url . 'login/logout.php' ?>" class="pl-1 d-inline-block">Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section id="bodyer" class="mt-2">
        <div class="container-fluid area-default">
            <div class="row justify-content-center">
                <div class="col-12 d-none">
                    <div class="row car_area car_area_custom align-items-start" style="border-right: 1px solid #ddd"></div>
                </div>
                <!-- <div class="col-12">
                    <div class="row car_area car_area-lh align-items-start pt-2 pb-2" style="border-right: 1px solid #ddd; overflow: auto;position: relative"></div>
                </div> -->
                <!-- <div class="col-6">
                    <div class="row car_area car_area-rh align-items-start pt-2 pb-2" style="border-left: 1px solid #ddd; overflow: auto;position: relative"></div>
                </div> -->
            </div>
        </div>
        <!-- <div class="container-fluid area-submit d-none">
            <div class="row justify-content-center">
                <div class="col-12 car_area_qc1k qc1k_area">
                    <div class="row car_area align-items-start" style="border-right: 1px solid #ddd"></div>
                </div>
                <div class="col-12 car_area_sealer sealer_area">
                    <div class="row car_area align-items-start" style="border-right: 1px solid #ddd"></div>
                </div>
            </div>
        </div> -->
    </section>

    <!--  Modal  -->
    <div class="modal fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="modal_error" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_error_title">Xem chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Loại lỗi</h6>
                    </div>
                    <div class="form-group">
                        <select name="error_type" id="error_type" class="form-control" disabled></select>
                    </div>
                    <div class="form-group error-other-group" style="display: none">
                        <label for="err_other">Lỗi cụ thể</label>
                        <textarea name="err_other" id="err_other" class="form-control" rows="3" readonly onfocus="$(this).removeAttr('style')"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if (isset($_SESSION['Station'])) : ?>
                        <button class="btn btn-success checked_btn" onclick="car.doneError($(this))">Checked</button>
                        <button class="btn btn-primary view_history_btn" style="display: none">History</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <style>
        .addNote textarea,
        .addNote .select-group {
            overflow: hidden;
            padding: 10px;
            max-width: 767px;
            width: 100%;
            font-size: 16px;
            margin: 50px auto;
            display: block;
            border-radius: 10px;
            border: 1px solid #556677;
            outline: none;
            resize: none;
            font-weight: 600;
            height: auto;
            position: relative;
        }

        .addNote textarea:disabled {
            background: #f9f9f9;
        }

        @media (max-width: 767px) {

            .addNote textarea,
            .addNote .select-group {
                margin: 50px 10px;
            }
        }
    </style>
   
    <div class="addNote addNoteController" style="display: none">

        <textarea rows='3' class="note_car" id="note_car" data-autoresize placeholder='Write Note For This Car'></textarea>



        <div class="select-group choice_note"></div>

    </div>
    <!-- <script>
            function resizeTextarea(el) {
                var offset = el.offsetHeight - el.clientHeight;
                jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
            }
            jQuery.each(jQuery('textarea[data-autoresize]'), function() {
                resizeTextarea(this);
                var that = this;
                setTimeout(function() {
                    $(that).trigger('keyup')
                }, 500)
                jQuery(this).on('keyup input focus', function() {
                    resizeTextarea(this);
                }).removeAttr('data-autoresize');
            });
        </script> -->


    <section id="footer" class="mb-5 mt-3">
        <div class="text-center">

            <button class="btn btn-outline-danger addNoteController" style="display:none;" id="edit_note" mv-type="1" disabled onclick="car.saveNote($('.note_car').val());">Save Note</button>
            <button class="btn btn-primary addNoteController" style="display: none" onclick="car.polishSubmit()">Submit</button>

        </div>
    </section>


    <div class="_go_home" onclick="$('#header').toggleClass('top')">
        <i class="fa fa-home"></i>
    </div>
    
    <script src="<?= $url . 'Dashboard/assets/js/core/jquery.min.js' ?>"></script>
    <script src="<?= $url . 'Dashboard/assets/js/core/popper.min.js' ?>"></script>
    <script src="<?= $url . 'Dashboard/assets/js/core/bootstrap-material-design.min.js' ?>"></script>
    <script src="<?= $url . 'Dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js' ?>"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->

    <!--  Notifications Plugin    -->
    <script src="<?= $url . 'Dashboard/assets/js/plugins/bootstrap-notify.js' ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= $url . 'Dashboard/assets/js/material-dashboard.js?v=2.1.2' ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= $url . 'Dashboard/assets/demo/demo.js' ?>"></script>
    <script src="<?= $url . 'page/assets/js/car.js' ?>"></script>
    <script src="<?= $url . 'vendor/owl_carousel/js/owl.carousel.js' ?>"></script>

    <script src="<?= $url . 'page/assets/js/error.js' ?>"></script>

    <script>
        var flagReload = '0';
        var autoload = false;
    </script>

    <script src="<?= $url . 'page/assets/js/autoCompleteNote.js' ?>"></script>
    <script>
        $(document).ready(function() {
           
            Object.size = function(obj) {
                var size = 0,
                    key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
            };

            flagReload = localStorage.getItem('__flag_export') || '0';
            if (flagReload == '1') {
                localStorage.removeItem('__flag_export');
                autoload = true;
                car.checkDoneAll(true, true).then(r => {
                    console.log(r)
                });
                return true;
            }

            function removeItemToArray(arr) {
                var what, a = arguments,
                    L = a.length,
                    ax;
                while (L > 1 && arr.length) {
                    what = a[--L];
                    while ((ax = arr.indexOf(what)) !== -1) {
                        arr.splice(ax, 1);
                    }
                }
                return arr;
            }
            let select_note = '';
            for (let i = 1; i <= Object.size(note_complete); i++) {
                select_note += `
                    <div class="form-group m-0">
                        <input type="checkbox" class="checkboxNote" id="checkbox` + i + `"  data-faq="` + note_complete[i] + `">
                        <label class="m-0" for="checkbox` + i + `">` + note_complete[i] + `</label>
                    </div>
                `;
            }
            $(".choice_note").append(select_note).on('change', '.checkboxNote', function() {
                let text = $(".note_car").val();
                if (!$(this).prop('checked')) {
                    if (selectCheckboxText.length != 0) {
                        removeItemToArray(selectCheckboxText, $(this).data('faq'));
                        text = text.replace($(this).data('faq'), '');
                    }
                } else {
                    selectCheckboxText.push($(this).data('faq'))
                    text = text + '\r\n' + $(this).data('faq');
                }
                $(".note_car").val(text);
                $("#edit_note").removeAttr('disabled');
                if (typeof resizeTextarea != 'undefined' && document.getElementById('note_car') != null) {
                    resizeTextarea(document.getElementById('note_car'));
                }
            });

        })
    </script>

    <script>
        var length_car_vin = 9;
        var length_car_code = 17;
        var position = '<?= $_SESSION['Station'] ?>';
        var location_user = '<?= $_SESSION['Position'] ?? '' ?>';
        var showChecked = false;
        var selectCheckboxText = [];
        var err_option = err_option;
        var err_option_other_id = err_option_other_id;
        var change_design = '<?= $_SESSION['IDuser'] ?>';
        
        $(document).ready(function() {
        
            $("#vincode_select_user").on('click', '.select-item', function() {
            
                vincode = $(this).data('val');
                $("#header").addClass("top");
                $("#vincode_select_user").hide();
                $('#vin-car-change').attr("value",vincode);
                $('#vin-car-change').attr("readonly",true);
               
                car.loadAll(vincode);
                $(".addNoteController").show();
                car.showNote(vincode);
            })
            $("#vin-car-change").on('keyup', function() {
               
                let val = $(this).val().trim();
                let item = $("#vincode_select_user").find(".select-item");
                //reset select
                item.removeClass('hidden');

                //set select with input
                item.each(function() {
                    if ($(this).text().indexOf(val.toUpperCase()) == -1) {
                        $(this).addClass('hidden');
                    }
                })
            })

            if (flagReload == '1') {
                return true;
            }

            function renderErrorList() {
                let html = '';
                var keys = Object.keys(err_option);
                for (let i = 0; i < keys.length; i++) {
                    html += "<li>" + keys[i] + " : " + err_option[keys[i]] + "</li>";
                }
                $("#errorConfig ._list ul").empty().append(html);
            }

            renderErrorList();

            if (typeof resizeTextarea != 'undefined' && document.getElementById('note_car') != null) {
                resizeTextarea(document.getElementById('note_car'));
            }

           

            var _modal = $("#modal_error");
            $(".view_history_btn").click(function() {
                let id = $(this).attr('mv-errid');
                car.viewHistory($("#history_modal"), id);
            })

            
            $(".car_area").on('click', '.error_point', function() {
                // thay doi trang thai clcik loi

                let _type = $(this).attr('mv-error');
                if (
                    $("meta[name=_type]").attr('content') == "1" &&
                    $(this).attr('mv-errlv') != "3"
                ) {
                    $(this).toggleClass('__no_check');
                    checkPolish = true;
                    return;
                }
                _modal.modal('show')
                    .find('#error_type').empty()
                    .append('<option value=""> ' + err_option[_type] + ' </option>');
                if (
                    _modal.find('.view_history_btn').length > 0 &&
                    $(this).attr('mv-errlv') == "3" &&
                    $("meta[name=_level]").attr('content') == "3"
                ) {
                    _modal.find(".view_history_btn")
                        .attr('mv-errid', $(this).attr('mv-errid'))
                        .show();
                }
                if ($(this).attr('mv-errlv') == "3" || $(this).attr('mv-errlv') == "2") {
                    _modal.find('.checked_btn')
                        .attr('mv-errid', $(this).attr('mv-errid'))
                        .hide();
                    showChecked = true;
                }
                if (_modal.find('.checked_btn').length > 0 && $(this).attr('mv-errlv') != "3") {
                    _modal.find('.checked_btn')
                        .attr('mv-errid', $(this).attr('mv-errid'))
                        .show();
                }
                let err_other = $(this).attr('mv-errother') != undefined ? $(this).attr('mv-errother') : '';
                if (err_other == '' || err_other == 'null') {
                    err_other = 'Chưa có bản ghi!';
                }
                _modal.find('.error-other-group').show().find('#err_other').val(err_other);
            })
            _modal.on('hide.bs.modal', function() {
                // if(_modal.find('.checked_btn').length > 0){
                //     _modal.find('.checked_btn')
                //         .removeAttr('mv-errid')
                //         .hide();
                //     _modal.find('.view_history_btn')
                //         .removeAttr('mv-errid')
                //         .hide();
                // }
                if (showChecked) {
                    _modal.find('.checked_btn')
                        .attr('mv-errid', $(this).attr('mv-errid'))
                        .show();
                    showChecked = false;
                }
                _modal.find('.error-other-group').hide().find('#err_other').val('');
            })
            $("#history_modal").on('hide.bs.modal', function() {
                setTimeout(function() {
                    $("#history_modal").find(".modal-body").empty();
                }, 1000);
            })
            $(".submitOverlayButton").click(function() {
                let _parent = $(this).parents('.__overlay');
                if (_parent.attr('mv-type') == 'submit') {
                    car.polishSubmit($(_parent.attr('mv-el')), $('#__usercode').val())
                } else if (_parent.attr('mv-type') == 'recoat') {
                    car.recoatCar($('#__usercode').val())
                }

            })

        })
    </script>

</body>

</html>