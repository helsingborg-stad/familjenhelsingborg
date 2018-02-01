var FamiljenHbg;

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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsIm5ld1RhYi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FDREE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgRmFtaWxqZW5IYmc7XG4iLCJGYW1pbGplbkhiZyA9IEZhbWlsamVuSGJnIHx8IHt9O1xuRmFtaWxqZW5IYmcubmV3VGFiID0gRmFtaWxqZW5IYmcubmV3VGFiIHx8IHt9O1xuXG5GYW1pbGplbkhiZy5uZXdUYWIuU29jaWFsTWVkaWEgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIC8qKlxuICAgICAqIENvbnN0cnVjdG9yXG4gICAgICovXG4gICAgZnVuY3Rpb24gU29jaWFsTWVkaWEoKSB7XG4gICAgICAgIGl0ZW1MaXN0ID0gJChcIi5zb2NpYWwtaXRlbSBhXCIpO1xuXG4gICAgICAgIGlmKGl0ZW1MaXN0Lmxlbmd0aCkge1xuICAgICAgICAgICAgaXRlbUxpc3QuZWFjaChmdW5jdGlvbihpbmRleCwgaXRlbSkge1xuICAgICAgICAgICAgICAgIHRoaXMuYWRkQmxhbmsoaXRlbSk7XG4gICAgICAgICAgICB9LmJpbmQodGhpcykpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgU29jaWFsTWVkaWEucHJvdG90eXBlLmFkZEJsYW5rID0gZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgJChpdGVtKS5hdHRyKCd0YXJnZXQnLCAnX2JsYW5rJyk7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgU29jaWFsTWVkaWEoKTtcblxufSkoalF1ZXJ5KTtcblxuXG5GYW1pbGplbkhiZy5uZXdUYWIuUnNzRmVlZCA9IChmdW5jdGlvbiAoJCkge1xuXG4gICAgLyoqXG4gICAgICogQ29uc3RydWN0b3JcbiAgICAgKi9cbiAgICBmdW5jdGlvbiBSc3NGZWVkKCkge1xuICAgICAgICBpdGVtTGlzdCA9ICQoXCIucnNzLWZlZWQgbGkgYVwiKTtcblxuICAgICAgICBpZihpdGVtTGlzdC5sZW5ndGgpIHtcbiAgICAgICAgICAgIGl0ZW1MaXN0LmVhY2goZnVuY3Rpb24oaW5kZXgsIGl0ZW0pIHtcbiAgICAgICAgICAgICAgICBpZih0aGlzLmlzRXh0ZXJuYWxMaW5rKGl0ZW0pKSB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMuYWRkQmxhbmsoaXRlbSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfS5iaW5kKHRoaXMpKTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIENoZWNrIGlmIGlzIGV4dGVybmFsXG4gICAgICovXG4gICAgUnNzRmVlZC5wcm90b3R5cGUuaXNFeHRlcm5hbExpbmsgPSBmdW5jdGlvbiAoaXRlbSkge1xuICAgICAgICBpZigkKGl0ZW0pLmF0dHIoJ2hyZWYnKS50b0xvd2VyQ2FzZSgpLmluZGV4T2YoXCJoZWxzaW5nYm9yZy5zZVwiKSAhPSBcIi0xXCIpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgLyoqXG4gICAgICogQWRkIGJsYW5rIGF0dHJpYnV0ZSB0byBsaW5rXG4gICAgICovXG4gICAgUnNzRmVlZC5wcm90b3R5cGUuYWRkQmxhbmsgPSBmdW5jdGlvbiAoaXRlbSkge1xuICAgICAgICAkKGl0ZW0pLmF0dHIoJ3RhcmdldCcsICdfYmxhbmsnKTtcbiAgICB9O1xuXG4gICAgcmV0dXJuIG5ldyBSc3NGZWVkKCk7XG5cbn0pKGpRdWVyeSk7XG4iXX0=
