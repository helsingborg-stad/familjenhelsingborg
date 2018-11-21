var FamiljenHbg;

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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsIkZpbHRlci9TdWJtaXRGb3JtLmpzIiwibmV3VGFiL1Jzc0ZlZWQuanMiLCJuZXdUYWIvU29jaWFsTWVkaWEuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQ0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzdCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeENBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIEZhbWlsamVuSGJnO1xuIiwiRmFtaWxqZW5IYmcgPSBGYW1pbGplbkhiZyB8fCB7fTtcbkZhbWlsamVuSGJnLkZpbHRlciA9IEZhbWlsamVuSGJnLkZpbHRlciB8fCB7fTtcblxuRmFtaWxqZW5IYmcuRmlsdGVyLlN1Ym1pdEZvcm0gPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIHZhciB0YXJnZXQgPSAnLmpzLXN1Ym1pdC1mb3JtJztcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gU3VibWl0Rm9ybSgpIHtcbiAgICAgICAgaWYgKCQodGFyZ2V0KS5sZW5ndGggPT0gMSkge1xuICAgICAgICAgICAgdGhpcy5TdWJtaXRPbkNoYW5nZSgpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogU3VibWl0cyBmb3JtIHdoZW4gaW5wdXQgY2hhbmdlXG4gICAgICovXG4gICAgU3VibWl0Rm9ybS5wcm90b3R5cGUuU3VibWl0T25DaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICQodGFyZ2V0ICsgJyBpbnB1dCcpLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGFyZ2V0KS5hZGRDbGFzcygnaXMtZGlzYWJsZWQnKTtcbiAgICAgICAgICAgICQodGFyZ2V0KS5zdWJtaXQoKTtcbiAgICAgICAgfSk7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgU3VibWl0Rm9ybSgpO1xuXG59KShqUXVlcnkpO1xuIiwiRmFtaWxqZW5IYmcgPSBGYW1pbGplbkhiZyB8fCB7fTtcbkZhbWlsamVuSGJnLm5ld1RhYiA9IEZhbWlsamVuSGJnLm5ld1RhYiB8fCB7fTtcblxuRmFtaWxqZW5IYmcubmV3VGFiLlJzc0ZlZWQgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gUnNzRmVlZCgpIHtcbiAgICAgICAgaXRlbUxpc3QgPSAkKFwiLnJzcy1mZWVkIGxpIGFcIik7XG5cbiAgICAgICAgaWYoaXRlbUxpc3QubGVuZ3RoKSB7XG4gICAgICAgICAgICBpdGVtTGlzdC5lYWNoKGZ1bmN0aW9uKGluZGV4LCBpdGVtKSB7XG4gICAgICAgICAgICAgICAgaWYodGhpcy5pc0V4dGVybmFsTGluayhpdGVtKSkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLmFkZEJsYW5rKGl0ZW0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0uYmluZCh0aGlzKSk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBDaGVjayBpZiBpcyBleHRlcm5hbFxuICAgICAqL1xuICAgIFJzc0ZlZWQucHJvdG90eXBlLmlzRXh0ZXJuYWxMaW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgaWYoJChpdGVtKS5hdHRyKCdocmVmJykudG9Mb3dlckNhc2UoKS5pbmRleE9mKFwiZmFtaWxqZW5oZWxzaW5nYm9yZy5zZVwiKSAhPSBcIi0xXCIpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgUnNzRmVlZC5wcm90b3R5cGUuYWRkQmxhbmsgPSBmdW5jdGlvbiAoaXRlbSkge1xuICAgICAgICAkKGl0ZW0pLmF0dHIoJ3RhcmdldCcsICdfYmxhbmsnKTtcbiAgICB9O1xuXG4gICAgcmV0dXJuIG5ldyBSc3NGZWVkKCk7XG5cbn0pKGpRdWVyeSk7XG4iLCJGYW1pbGplbkhiZyA9IEZhbWlsamVuSGJnIHx8IHt9O1xuRmFtaWxqZW5IYmcubmV3VGFiID0gRmFtaWxqZW5IYmcubmV3VGFiIHx8IHt9O1xuXG5GYW1pbGplbkhiZy5uZXdUYWIuU29jaWFsTWVkaWEgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gU29jaWFsTWVkaWEoKSB7XG4gICAgICAgIGl0ZW1MaXN0ID0gJChcIi5zb2NpYWwtaXRlbSBhXCIpO1xuXG4gICAgICAgIGlmKGl0ZW1MaXN0Lmxlbmd0aCkge1xuICAgICAgICAgICAgaXRlbUxpc3QuZWFjaChmdW5jdGlvbihpbmRleCwgaXRlbSkge1xuICAgICAgICAgICAgICAgIHRoaXMuYWRkQmxhbmsoaXRlbSk7XG4gICAgICAgICAgICB9LmJpbmQodGhpcykpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgU29jaWFsTWVkaWEucHJvdG90eXBlLmFkZEJsYW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgJChpdGVtKS5hdHRyKCd0YXJnZXQnLCAnX2JsYW5rJyk7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgU29jaWFsTWVkaWEoKTtcblxufSkoalF1ZXJ5KTtcbiJdfQ==
