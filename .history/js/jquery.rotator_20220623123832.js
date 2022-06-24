(function($) {
    $.fn.rotator = function(delay, child) {
        //set curImage val
        var currImg = 0;
        var currIt = true;
        //set array of images
        var ss = $('#slideshow').children(child);
        var ssize = ss.size();
        setInterval(function() {
            if (currIt) {
                $(ss[currImg]).css('opacity', '1');
                currIt = !currIt;
            } else if (!currIt) {
                $(ss[currImg]).css('opacity', '0');
                $(ss[currImg + 1]).css('opacity', '1');
                currIt = !currIt;
                currImg++;
            }
            //reset
            if (currImg >= ssize) {
                currImg = 0;
                $(ss[currImg]).css('opacity', '1');
            }
        }, delay);
        return this;
    };
})(jQuery);