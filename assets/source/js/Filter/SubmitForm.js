FamiljenHbg = FamiljenHbg || {};
FamiljenHbg.Filter = FamiljenHbg.Filter || {};

FamiljenHbg.Filter.SubmitForm = (function ($) {

    var target = '.js-submit-form';

    /**
     * Constructor
     */
    function SubmitForm() {
        if ($(target).length == 1) {
            this.SubmitOnChange();
        }
    }

    /**
     * Submits form when input change
     */
    SubmitForm.prototype.SubmitOnChange = function () {
        $(target + ' input').on('change', function() {
            $(target).addClass('is-disabled');
            $(target).submit();
        });
    };

    return new SubmitForm();

})(jQuery);
