/**
 * Created by senycorp on 06.06.16.
 */

$(document).ready(function() {

    /**
     * ChangeTrack
     */
    $('input[data-track-changes]').on("change", function() {
        var newValue = $(this).val();
        var oldValue = $(this).attr('data-track-changes');

        if (newValue != oldValue) {
            $(this).closest('.form-group').addClass('has-warning')
            $(this).next('.form-control-feedback').removeClass('hidden');
        } else {
            $(this).closest('div.form-group').removeClass('has-warning')
            $(this).next('span.form-control-feedback').addClass('hidden');
        }
    })
});
