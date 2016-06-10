/**
 * Created by senycorp on 06.06.16.
 */

$(document).ready(function() {

    $('input[data-track-changes],select[data-track-changes]').on("change", function() {
        var newValue = $(this).val();
        var oldValue = $(this).attr('data-track-changes');

        if (newValue != oldValue) {
            $(this).closest('.form-group').addClass('has-warning')
            $(this).next('.form-control-feedback').removeClass('hidden');
        } else {
            $(this).closest('div.form-group').removeClass('has-warning')
            $(this).next('span.form-control-feedback').addClass('hidden');
        }
    });
});

$(document).ajaxStart(function() { Pace.restart(); });

function showDeleteDialog(title, body, element) {
    var config = {
        /**
         * @required String|Element
         */
        message: body,

        /**
         * @optional String|Element
         * adds a header to the dialog and places this text in an h4
         */
        title: title,

        /**
         * @optional Function
         * allows the user to dismisss the dialog by hitting ESC, which
         * will invoke this function
         */
        onEscape: function() {},

        /**
         * @optional Boolean
         * @default: true
         * whether the dialog should be shown immediately
         */
        show: true,

        /**
         * @optional Boolean
         * @default: true
         * whether the dialog should be have a backdrop or not
         */
        backdrop: true,

        /**
         * @optional Boolean
         * @default: true
         * show a close button
         */
        closeButton: true,

        /**
         * @optional Boolean
         * @default: true
         * animate the dialog in and out (not supported in < IE 10)
         */
        animate: true,

        /**
         * @optional String
         * @default: null
         * an additional class to apply to the dialog wrapper
         */
        className: "modal-danger",

        /**
         * @optional Object
         * @default: {}
         * any buttons shown in the dialog's footer
         */
        buttons: {

            /**
             * this usage demonstrates that if no label property is
             * supplied in the object, the key is used instead
             */
            "Danger!": {
                className: "btn-outline",
                callback: function() {
                    eval('var func = ' + $(element).attr('data-confirmation-callback'));

                    func(element);
                }
            },
        }
    }

    bootbox.dialog(config);
}
