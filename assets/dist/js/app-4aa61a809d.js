var FamiljenHbg;FamiljenHbg=FamiljenHbg||{},FamiljenHbg.Filter=FamiljenHbg.Filter||{},FamiljenHbg.Filter.SubmitForm=function(n){function i(){1==n(e).length&&this.SubmitOnClick()}var e=".js-submit-form";return i.prototype.SubmitOnChange=function(){n(e+" input").on("change",function(){n(e).submit()})},new i}(jQuery),FamiljenHbg=FamiljenHbg||{},FamiljenHbg.newTab=FamiljenHbg.newTab||{},FamiljenHbg.newTab.RssFeed=function(n){function i(){itemList=n(".rss-feed li a"),itemList.length&&itemList.each(function(n,i){this.isExternalLink(i)&&this.addBlank(i)}.bind(this))}return i.prototype.isExternalLink=function(i){return"-1"==n(i).attr("href").toLowerCase().indexOf("familjenhelsingborg.se")},i.prototype.addBlank=function(i){n(i).attr("target","_blank")},new i}(jQuery),FamiljenHbg=FamiljenHbg||{},FamiljenHbg.newTab=FamiljenHbg.newTab||{},FamiljenHbg.newTab.SocialMedia=function(n){function i(){itemList=n(".social-item a"),itemList.length&&itemList.each(function(n,i){this.addBlank(i)}.bind(this))}return i.prototype.addBlank=function(i){n(i).attr("target","_blank")},new i}(jQuery);