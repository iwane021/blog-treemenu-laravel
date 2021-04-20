$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'fas fa-minus';
      var closedClass = 'fas fa-plus';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function (index) {
            var branch = $(this);
            branch.prepend('<i class="'+closedClass+'"></i>');
            branch.addClass('branch');
            branch.attr('data-id', index);
            branch.on('click', function (e) {
                var idx = $(this).data("id");
                var ts = document.getElementsByClassName("branch")[idx].childNodes[0];
                if (this == e.target || e.target == ts) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(closedClass + " " + openedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();