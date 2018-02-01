FamiljenHbg = FamiljenHbg || {};
FamiljenHbg.newTab = FamiljenHbg.newTab || {};

FamiljenHbg.newTab.SocialMedia = (function ($) {

    /**
     * Constructor
     */
    function SocialMedia() {
        itemList = $(".social-item a");

        if(itemList.length) {
            itemList.each(function(index, item) {
                this.addBlank(item);
            }.bind(this));
        }
    }

    /**
     * Add blank attribute to link
     */
    SocialMedia.prototype.addBlank = function (item) {
        $(item).attr('target', '_blank');
    };

    return new SocialMedia();

})(jQuery);
