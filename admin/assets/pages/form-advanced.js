/*
 Template Name: Urora - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 Website: www.mannatthemes.com
 File: Form Advanced components
 */


!function($) {
    "use strict";

    var AdvancedForm = function() {};
    
    AdvancedForm.prototype.init = function() {

        //Bootstrap-MaxLength
        $('input#defaultconfig').maxlength({
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        $('input#thresholdconfig').maxlength({
            threshold: 20,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        $('input#moreoptions').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        });

        $('input#alloptions').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger",
            separator: ' out of ',
            preText: 'You typed ',
            postText: ' chars available.',
            validate: true
        });

        $('textarea#textarea').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        $('input#placement').maxlength({
            alwaysShow: true,
            placement: 'top-left',
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ion-plus-round',
            verticaldownclass: 'ion-minus-round',
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });

        $("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='demo2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$',
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='demo3']").TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='demo3_21']").TouchSpin({
            initval: 40,
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 40,
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });

        $("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post",
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='demo0']").TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({
            weekStart : 0, time: false, minDate : new Date() 
           });
       $('#timepicker').bootstrapMaterialDatePicker({ 
           format : 'HH:mm', time: true, date: false 
       });
       $('#date-format').bootstrapMaterialDatePicker({ 
           format : 'dddd DD MMMM YYYY - HH:mm' 
       });  
       $('#min-date').bootstrapMaterialDatePicker({ 
           format : 'DD/MM/YYYY HH:mm', minDate : new Date() 
       });
       $('#single-input').clockpicker({
           placement: 'bottom',
           align: 'left',
           autoclose: true,
           'default': 'now'
       });
       $('.clockpicker').clockpicker({
           donetext: 'Done',
       }).find('input').change(function() {
           console.log(this.value);
       });

       $('#check-minutes').click(function(e){
       // Have to stop propagation here
           e.stopPropagation();
           input.clockpicker('show')
           .clockpicker('toggleView', 'minutes');
       });

       //colorpicker start
       $(".colorpicker").asColorPicker();
       
       $(".gradient-colorpicker").asColorPicker({
           mode: 'gradient'
       });

       $(".complex-colorpicker").asColorPicker({
           mode: 'complex'
       });
       // Select2
       $(".select2").select2({
           width: '100%'
       });
    },
    //init
    $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.AdvancedForm.init();
}(window.jQuery);