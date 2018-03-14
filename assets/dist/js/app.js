var FamiljenHbg;

FamiljenHbg = FamiljenHbg || {};
FamiljenHbg.newTab = FamiljenHbg.newTab || {};

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
        if($(item).attr('href').toLowerCase().indexOf("familjenhelsingborg.se") != "-1") {
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
            $(target).submit();
        });
    };

    return new SubmitForm();

})(jQuery);

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsIm5ld1RhYi9Sc3NGZWVkLmpzIiwibmV3VGFiL1NvY2lhbE1lZGlhLmpzIiwiRmlsdGVyL1N1Ym1pdEZvcm0uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQ0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN4Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzVCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBGYW1pbGplbkhiZztcbiIsIkZhbWlsamVuSGJnID0gRmFtaWxqZW5IYmcgfHwge307XG5GYW1pbGplbkhiZy5uZXdUYWIgPSBGYW1pbGplbkhiZy5uZXdUYWIgfHwge307XG5cbkZhbWlsamVuSGJnLm5ld1RhYi5Sc3NGZWVkID0gKGZ1bmN0aW9uICgkKSB7XG5cbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvclxuICAgICAqL1xuICAgIGZ1bmN0aW9uIFJzc0ZlZWQoKSB7XG4gICAgICAgIGl0ZW1MaXN0ID0gJChcIi5yc3MtZmVlZCBsaSBhXCIpO1xuXG4gICAgICAgIGlmKGl0ZW1MaXN0Lmxlbmd0aCkge1xuICAgICAgICAgICAgaXRlbUxpc3QuZWFjaChmdW5jdGlvbihpbmRleCwgaXRlbSkge1xuICAgICAgICAgICAgICAgIGlmKHRoaXMuaXNFeHRlcm5hbExpbmsoaXRlbSkpIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5hZGRCbGFuayhpdGVtKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LmJpbmQodGhpcykpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQ2hlY2sgaWYgaXMgZXh0ZXJuYWxcbiAgICAgKi9cbiAgICBSc3NGZWVkLnByb3RvdHlwZS5pc0V4dGVybmFsTGluayA9IGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgIGlmKCQoaXRlbSkuYXR0cignaHJlZicpLnRvTG93ZXJDYXNlKCkuaW5kZXhPZihcImZhbWlsamVuaGVsc2luZ2Jvcmcuc2VcIikgIT0gXCItMVwiKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfTtcblxuICAgIC8qKlxuICAgICAqIEFkZCBibGFuayBhdHRyaWJ1dGUgdG8gbGlua1xuICAgICAqL1xuICAgIFJzc0ZlZWQucHJvdG90eXBlLmFkZEJsYW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgJChpdGVtKS5hdHRyKCd0YXJnZXQnLCAnX2JsYW5rJyk7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgUnNzRmVlZCgpO1xuXG59KShqUXVlcnkpO1xuIiwiRmFtaWxqZW5IYmcgPSBGYW1pbGplbkhiZyB8fCB7fTtcbkZhbWlsamVuSGJnLm5ld1RhYiA9IEZhbWlsamVuSGJnLm5ld1RhYiB8fCB7fTtcblxuRmFtaWxqZW5IYmcubmV3VGFiLlNvY2lhbE1lZGlhID0gKGZ1bmN0aW9uICgkKSB7XG5cbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvclxuICAgICAqL1xuICAgIGZ1bmN0aW9uIFNvY2lhbE1lZGlhKCkge1xuICAgICAgICBpdGVtTGlzdCA9ICQoXCIuc29jaWFsLWl0ZW0gYVwiKTtcblxuICAgICAgICBpZihpdGVtTGlzdC5sZW5ndGgpIHtcbiAgICAgICAgICAgIGl0ZW1MaXN0LmVhY2goZnVuY3Rpb24oaW5kZXgsIGl0ZW0pIHtcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEJsYW5rKGl0ZW0pO1xuICAgICAgICAgICAgfS5iaW5kKHRoaXMpKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIEFkZCBibGFuayBhdHRyaWJ1dGUgdG8gbGlua1xuICAgICAqL1xuICAgIFNvY2lhbE1lZGlhLnByb3RvdHlwZS5hZGRCbGFuayA9IGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgICQoaXRlbSkuYXR0cigndGFyZ2V0JywgJ19ibGFuaycpO1xuICAgIH07XG5cbiAgICByZXR1cm4gbmV3IFNvY2lhbE1lZGlhKCk7XG5cbn0pKGpRdWVyeSk7XG4iLCJGYW1pbGplbkhiZyA9IEZhbWlsamVuSGJnIHx8IHt9O1xuRmFtaWxqZW5IYmcuRmlsdGVyID0gRmFtaWxqZW5IYmcuRmlsdGVyIHx8IHt9O1xuXG5GYW1pbGplbkhiZy5GaWx0ZXIuU3VibWl0Rm9ybSA9IChmdW5jdGlvbiAoJCkge1xuXG4gICAgdmFyIHRhcmdldCA9ICcuanMtc3VibWl0LWZvcm0nO1xuXG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3JcbiAgICAgKi9cbiAgICBmdW5jdGlvbiBTdWJtaXRGb3JtKCkge1xuICAgICAgICBpZiAoJCh0YXJnZXQpLmxlbmd0aCA9PSAxKSB7XG4gICAgICAgICAgICB0aGlzLlN1Ym1pdE9uQ2hhbmdlKCk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBTdWJtaXRzIGZvcm0gd2hlbiBpbnB1dCBjaGFuZ2VcbiAgICAgKi9cbiAgICBTdWJtaXRGb3JtLnByb3RvdHlwZS5TdWJtaXRPbkNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0YXJnZXQgKyAnIGlucHV0Jykub24oJ2NoYW5nZScsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0YXJnZXQpLnN1Ym1pdCgpO1xuICAgICAgICB9KTtcbiAgICB9O1xuXG4gICAgcmV0dXJuIG5ldyBTdWJtaXRGb3JtKCk7XG5cbn0pKGpRdWVyeSk7XG4iXX0=
