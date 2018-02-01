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


FamiljenHbg.newTab.RssFeed = (function ($) {

    /**
     * Constructor
     */
    function RssFeed() {
        itemList = $(".rss-feed li a");

        if(itemList.length) {
            itemList.each(function(index, item) {
                if(this.isExternalLink(item)) {
                    this.addBlank(item);
                }
            }.bind(this));
        }
    }

    /**
     * Check if is external
     */
    RssFeed.prototype.isExternalLink = function (item) {
        if($(item).attr('href').toLowerCase().indexOf("helsingborg.se") != "-1") {
            return false;
        }
        return true;
    };

    /**
     * Add blank attribute to link
     */
    RssFeed.prototype.addBlank = function (item) {
        $(item).attr('target', '_blank');
    };

    return new RssFeed();

})(jQuery);
