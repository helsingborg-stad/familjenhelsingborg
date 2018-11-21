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
            $(target).addClass('is-disabled');
            $(target).submit();
        });
    };

    return new SubmitForm();

})(jQuery);

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsIm5ld1RhYi9Sc3NGZWVkLmpzIiwibmV3VGFiL1NvY2lhbE1lZGlhLmpzIiwiRmlsdGVyL1N1Ym1pdEZvcm0uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQ0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN4Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzVCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIEZhbWlsamVuSGJnO1xuIiwiRmFtaWxqZW5IYmcgPSBGYW1pbGplbkhiZyB8fCB7fTtcbkZhbWlsamVuSGJnLm5ld1RhYiA9IEZhbWlsamVuSGJnLm5ld1RhYiB8fCB7fTtcblxuRmFtaWxqZW5IYmcubmV3VGFiLlJzc0ZlZWQgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gUnNzRmVlZCgpIHtcbiAgICAgICAgaXRlbUxpc3QgPSAkKFwiLnJzcy1mZWVkIGxpIGFcIik7XG5cbiAgICAgICAgaWYoaXRlbUxpc3QubGVuZ3RoKSB7XG4gICAgICAgICAgICBpdGVtTGlzdC5lYWNoKGZ1bmN0aW9uKGluZGV4LCBpdGVtKSB7XG4gICAgICAgICAgICAgICAgaWYodGhpcy5pc0V4dGVybmFsTGluayhpdGVtKSkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLmFkZEJsYW5rKGl0ZW0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0uYmluZCh0aGlzKSk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICAvKipcbiAgICAgKiBDaGVjayBpZiBpcyBleHRlcm5hbFxuICAgICAqL1xuICAgIFJzc0ZlZWQucHJvdG90eXBlLmlzRXh0ZXJuYWxMaW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgaWYoJChpdGVtKS5hdHRyKCdocmVmJykudG9Mb3dlckNhc2UoKS5pbmRleE9mKFwiZmFtaWxqZW5oZWxzaW5nYm9yZy5zZVwiKSAhPSBcIi0xXCIpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgUnNzRmVlZC5wcm90b3R5cGUuYWRkQmxhbmsgPSBmdW5jdGlvbiAoaXRlbSkge1xuICAgICAgICAkKGl0ZW0pLmF0dHIoJ3RhcmdldCcsICdfYmxhbmsnKTtcbiAgICB9O1xuXG4gICAgcmV0dXJuIG5ldyBSc3NGZWVkKCk7XG5cbn0pKGpRdWVyeSk7XG4iLCJGYW1pbGplbkhiZyA9IEZhbWlsamVuSGJnIHx8IHt9O1xuRmFtaWxqZW5IYmcubmV3VGFiID0gRmFtaWxqZW5IYmcubmV3VGFiIHx8IHt9O1xuXG5GYW1pbGplbkhiZy5uZXdUYWIuU29jaWFsTWVkaWEgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gU29jaWFsTWVkaWEoKSB7XG4gICAgICAgIGl0ZW1MaXN0ID0gJChcIi5zb2NpYWwtaXRlbSBhXCIpO1xuXG4gICAgICAgIGlmKGl0ZW1MaXN0Lmxlbmd0aCkge1xuICAgICAgICAgICAgaXRlbUxpc3QuZWFjaChmdW5jdGlvbihpbmRleCwgaXRlbSkge1xuICAgICAgICAgICAgICAgIHRoaXMuYWRkQmxhbmsoaXRlbSk7XG4gICAgICAgICAgICB9LmJpbmQodGhpcykpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgU29jaWFsTWVkaWEucHJvdG90eXBlLmFkZEJsYW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgJChpdGVtKS5hdHRyKCd0YXJnZXQnLCAnX2JsYW5rJyk7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgU29jaWFsTWVkaWEoKTtcblxufSkoalF1ZXJ5KTtcbiIsIkZhbWlsamVuSGJnID0gRmFtaWxqZW5IYmcgfHwge307XG5GYW1pbGplbkhiZy5GaWx0ZXIgPSBGYW1pbGplbkhiZy5GaWx0ZXIgfHwge307XG5cbkZhbWlsamVuSGJnLkZpbHRlci5TdWJtaXRGb3JtID0gKGZ1bmN0aW9uICgkKSB7XG5cbiAgICB2YXIgdGFyZ2V0ID0gJy5qcy1zdWJtaXQtZm9ybSc7XG5cbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvclxuICAgICAqL1xuICAgIGZ1bmN0aW9uIFN1Ym1pdEZvcm0oKSB7XG4gICAgICAgIGlmICgkKHRhcmdldCkubGVuZ3RoID09IDEpIHtcbiAgICAgICAgICAgIHRoaXMuU3VibWl0T25DaGFuZ2UoKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIFN1Ym1pdHMgZm9ybSB3aGVuIGlucHV0IGNoYW5nZVxuICAgICAqL1xuICAgIFN1Ym1pdEZvcm0ucHJvdG90eXBlLlN1Ym1pdE9uQ2hhbmdlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAkKHRhcmdldCArICcgaW5wdXQnKS5vbignY2hhbmdlJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKHRhcmdldCkuYWRkQ2xhc3MoJ2lzLWRpc2FibGVkJyk7XG4gICAgICAgICAgICAkKHRhcmdldCkuc3VibWl0KCk7XG4gICAgICAgIH0pO1xuICAgIH07XG5cbiAgICByZXR1cm4gbmV3IFN1Ym1pdEZvcm0oKTtcblxufSkoalF1ZXJ5KTtcbiJdfQ==
