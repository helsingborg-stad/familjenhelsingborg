var FamiljenHbg;FamiljenHbg=FamiljenHbg||{},FamiljenHbg.newTab=FamiljenHbg.newTab||{},FamiljenHbg.newTab.RssFeed=function(n){function e(){itemList=n(".rss-feed li a"),itemList.length&&itemList.each(function(n,e){this.isExternalLink(e)&&this.addBlank(e)}.bind(this))}return e.prototype.isExternalLink=function(e){return"-1"==n(e).attr("href").toLowerCase().indexOf("familjenhelsingborg.se")},e.prototype.addBlank=function(e){n(e).attr("target","_blank")},new e}(jQuery),FamiljenHbg=FamiljenHbg||{},FamiljenHbg.newTab=FamiljenHbg.newTab||{},FamiljenHbg.newTab.SocialMedia=function(n){function e(){itemList=n(".social-item a"),itemList.length&&itemList.each(function(n,e){this.addBlank(e)}.bind(this))}return e.prototype.addBlank=function(e){n(e).attr("target","_blank")},new e}(jQuery);