
<!-- Mainly scripts -->
<script src="<?php echo(base_url()); ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo(base_url()); ?>assets/js/inspinia.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/pace/pace.min.js"></script>

<!-- Data Tables -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


<!-- Custom msh javascript -->
<script src="<?php echo(base_url()); ?>assets/js/mshcustom/validateUserActions.js"></script>


<script>
    $(document).ready(function () {
       /* $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        *//* Init DataTables *//*
        var oTable = $('#editable').dataTable();

        *//* Apply the jEditable handlers to the table *//*
        oTable.$('td').editable('../example_ajax.php', {
            "callback": function (sValue, y) {
                var aPos = oTable.fnGetPosition(this);
                oTable.fnUpdate(sValue, aPos[0], aPos[1]);
            },
            "submitdata": function (value, settings) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition(this)[2]
                };
            },

            "width": "90%",
            "height": "100%"
        });
*/

    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData([
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ]);

    }
</script>



<!-- Mainly scripts -->
<script src="<?php echo(base_url()); ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/bootstrap.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo(base_url()); ?>assets/js/inspinia.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chosen -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

<!-- JSKnob -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="<?php echo(base_url()); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- NouSlider -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

<!-- Switchery -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/switchery/switchery.js"></script>

<!-- IonRangeSlider -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

<!-- iCheck -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Color picker -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Image cropper -->
<script src="<?php echo(base_url()); ?>assets/js/plugins/cropper/cropper.min.js"></script>





    <!-- Mainly scripts -->
    <script src="<?php echo(base_url()); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo(base_url()); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>



   <!-- Data picker -->
   <script src="<?php echo(base_url()); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="<?php echo(base_url()); ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="<?php echo(base_url()); ?>assets/js/plugins/switchery/switchery.js"></script>

   

    <!-- MENU -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/cropper/cropper.min.js"></script>



<script>
$(document).ready(function(){







    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('#data_2 .input-group.date').datepicker({
        startView: 1,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    $('#data_3 .input-group.date').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    $('#data_4 .input-group.date').datepicker({
        minViewMode: 1,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true
    });

    $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { color: '#1AB394' });

    var elem_2 = document.querySelector('.js-switch_2');
    var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

    var elem_3 = document.querySelector('.js-switch_3');
    var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });




});
var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
    $(selector).chosen(config[selector]);
}

$("#ionrange_1").ionRangeSlider({
    min: 0,
    max: 5000,
    type: 'double',
    prefix: "$",
    maxPostfix: "+",
    prettify: false,
    hasGrid: true
});

$("#ionrange_2").ionRangeSlider({
    min: 0,
    max: 10,
    type: 'single',
    step: 0.1,
    postfix: " carats",
    prettify: false,
    hasGrid: true
});

$("#ionrange_3").ionRangeSlider({
    min: -50,
    max: 50,
    from: 0,
    postfix: "°",
    prettify: false,
    hasGrid: true
});

$("#ionrange_4").ionRangeSlider({
    values: [
        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December"
    ],
    type: 'single',
    hasGrid: true
});




</script>

<script src="<?php echo(base_url()); ?>assets/js/FileSaver.js"></script>
<script src="<?php echo(base_url()); ?>assets/js/jquery.wordexport.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });

    });
</script>



    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });


        });
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

</body>

</html>




