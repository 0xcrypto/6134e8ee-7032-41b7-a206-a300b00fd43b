$.FleetCart = {};

/* ----------------------------------
   - FleetCart Options -
   ---------------------------------- */
$.FleetCart.options = {
    animationSpeed: 300,
    // Sidebar push menu toggle button selector
    sidebarToggleSelector: '[data-toggle=\'offcanvas\']',
    // Activate sidebar push menu
    sidebarPushMenu: true,
    // BoxRefresh Plugin
    enableBoxRefresh: true,
    // Bootstrap.js tooltip
    enableBSToppltip: true,
    BSTooltipSelector: '[data-toggle=\'tooltip\']',
    // Control Sidebar Tree views
    //enableControlTreeView: true,
    enableHorizontalMenu: true,
    // The standard screen sizes that bootstrap uses.
    screenSizes: {
        xs: 480,
        sm: 768,
        md: 992,
        lg: 1200,
    },
};

/* ----------------------------------
   - Implementation -
   ---------------------------------- */
$(function () {
    // Easy access to options
    var o = $.FleetCart.options;

    // Set up the object
    _init();

    // Activate layout
    $.FleetCart.layout.activate();

    // Enable sidebar tree view controls
    if (o.enableControlTreeView) {
        $.FleetCart.tree('.sidebar');
    }

    // Activate sidebar push menu
    if (o.sidebarPushMenu) {
        $.FleetCart.pushMenu.activate(o.sidebarToggleSelector);
    }

    // Activate Bootstrap tooltip
    if (o.enableBSToppltip) {
        $('body').tooltip({
            selector: o.BSTooltipSelector,
            container: 'body',
        });
    }

    if(o.enableHorizontalMenu){
        $("#respMenu").horizontalMenu({
            resizeWidth: '1024', // Set the same in Media query
            animationSpeed: 'fast', //slow, medium, fast
            accoridonExpAll: false //Expands all the accordion menu on click
        });
    }
});

/* ----------------------------------
   - Initialize the FleetCart Object -
   ---------------------------------- */
function _init() {

    // Layout
    $.FleetCart.layout = {
        activate: function () {
            var _this = this;
            _this.fix();

            $(window, '.wrapper').resize(function () {
                _this.fix();
            });
        },
        fix: function () {
            var window_height = $(window).height();

            $('.wrapper').css('min-height', window_height + 'px');
        }
    };

    // PushMenu
    $.FleetCart.pushMenu = {
        activate: function (toggleBtn) {
            var screenSizes = $.FleetCart.options.screenSizes;

            $(document).on('click', toggleBtn, function (e) {
                e.preventDefault();

                if ($(window).outerWidth() > (screenSizes.md - 1)) {
                    if ($('body').hasClass('sidebar-collapse')) {
                        $('body').removeClass('sidebar-collapse').trigger('expanded.pushMenu');

                        return;
                    }

                    $('body').addClass('sidebar-collapse').trigger('collapsed.pushMenu');

                    return;
                }

                if ($('body').hasClass('sidebar-open')) {
                    $('body').removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');

                    return;
                }

                $('body').addClass('sidebar-open').trigger('expanded.pushMenu');
            });

            $(window).on('resize', function () {
                if ($(window).outerWidth() > (screenSizes.md - 1)) {
                    return;
                } else {
                    $('body').removeClass('sidebar-collapse');
                }
            });

            $('.content-wrapper').click(function () {
                if ($(window).width() <= (screenSizes.md - 1) && $('body').hasClass('sidebar-open')) {
                    $('body').removeClass('sidebar-open');
                }
            });
        }
    };

    // Tree
    $.FleetCart.tree = function (menu) {
        var animationSpeed = $.FleetCart.options.animationSpeed;

        $(document).off('click', menu + ' li a')
            .on('click', menu + ' li a', function (e) {
                var self = $(this);
                var checkElement = self.next();
                var activeElement = self.closest('.sidebar-menu').find('.active');

                if (checkElement.is('.treeview-menu')) {
                    self.closest('.sidebar-menu').find('.selected').removeClass('selected');

                    e.preventDefault();
                }

                if (self.parent().is('.active')) {
                    activeElement.toggleClass('closed');
                } else {
                    activeElement.addClass('closed');
                }

                if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible')) && (!$('body').hasClass('sidebar-collapse'))) {
                    self.parent().removeClass('selected');

                    checkElement.slideUp(animationSpeed);
                }

                else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                    var ul = self.parents('ul').first().find('ul:visible').slideUp(animationSpeed);

                    self.parent().addClass('selected');
                    checkElement.slideDown(animationSpeed);
                }
            });
    };

}

/* ----------------------------------
   - Box Refresh Button -
   ---------------------------------- */
(function ($) {
    $.fn.boxRefresh = function (options) {
        var settings = $.extend({
            trigger: '.refresh-btn',
            source: '',
            onLoadStart: function (box) {
                return box;
            },
            onLoadDone: function (box) {
                return box;
            },
        }, options);

        var overlay = $('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');

        return this.each(function () {
            if (settings.source === '') {
                if (window.console) {
                    window.console.log('Please specify a source first - boxRefresh()');
                }

                return;
            }

            var box = $(this);
            var rBtn = box.find(settings.trigger).first();

            rBtn.on('click', function (e) {
                e.preventDefault();
                start(box);

                box.find('.box-body').load(settings.source, function () {
                    done(box);
                });
            });
        });

        function start(box) {
            box.append(overlay);
            settings.onLoadStart.call(box);
        }

        function done(box) {
            box.find(overlay).remove();
            settings.onLoadDone.call(box);
        }
    };

    $.fn.horizontalMenu = function (options) {

        //plugin's default options
        var defaults = {
            resizeWidth: '1024',
            animationSpeed: 'fast',
            accoridonExpAll: false
        };

        //Variables
        var options = $.extend(defaults, options),
            opt = options,
            $resizeWidth = opt.resizeWidth,
            $animationSpeed = opt.animationSpeed,
            $expandAll = opt.accoridonExpAll,
            $horizontalMenu = $(this),
            $menuStyle = $(this).attr('data-menu-style');

        // Initilizing        
        $horizontalMenu.find('ul').addClass("sub-menu");
       // $horizontalMenu.find('ul').siblings('a').append('<span class="arrow "></span>');
        if ($menuStyle == 'accordion') { $(this).addClass('collapse'); }

        // Window resize on menu breakpoint 
        if ($(window).innerWidth() <= $resizeWidth) {
            menuCollapse();
        }
        $(window).resize(function () {
            menuCollapse();
        });

        // Menu Toggle
        function menuCollapse() {
            var w = $(window).innerWidth();
            if (w <= $resizeWidth) {
                $horizontalMenu.find('li.menu-active').removeClass('menu-active');
                $horizontalMenu.find('ul.slide').removeClass('slide').removeAttr('style');
                $horizontalMenu.addClass('collapse hide-menu');
                $horizontalMenu.attr('data-menu-style', '');
                $('.menu-toggle').show();
            } else {
                $horizontalMenu.attr('data-menu-style', $menuStyle);
                $horizontalMenu.removeClass('collapse hide-menu').removeAttr('style');
                $('.menu-toggle').hide();
                if ($horizontalMenu.attr('data-menu-style') == 'accordion') {
                    $horizontalMenu.addClass('collapse');
                    return;
                }
                $horizontalMenu.find('li.menu-active').removeClass('menu-active');
                $horizontalMenu.find('ul.slide').removeClass('slide').removeAttr('style');
            }
        }

        //ToggleBtn Click
        $('#menu-btn').click(function () {
            $horizontalMenu.slideToggle().toggleClass('hide-menu');
        });


        // Main function 
        return this.each(function () {
            // Function for Horizontal menu on mouseenter
            $horizontalMenu.on('mouseover', '> li a', function () {
                if ($horizontalMenu.hasClass('collapse') === true) {
                    return false;
                }
               // $(this).off('click', '> li a');
                $(this).parent('li').siblings().children('.sub-menu').stop(true, true).slideUp($animationSpeed).removeClass('slide').removeAttr('style').stop();
                $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                return;
            });
            $horizontalMenu.on('mouseleave', 'li', function () {
                if ($horizontalMenu.hasClass('collapse') === true) {
                    return false;
                }
                $(this).off('click', '> li a');
                $(this).removeClass('menu-active');
                $(this).children('ul.sub-menu').stop(true, true).slideUp($animationSpeed).removeClass('slide').removeAttr('style');
                return;
            });
            //End of Horizontal menu function

            // Function for Vertical/Responsive Menu on mouse click
            $horizontalMenu.on('click', '> li a', function () {
                if ($horizontalMenu.hasClass('collapse') === false) {
                    //return false;
                }
                $(this).off('mouseover', '> li a');
                if ($(this).parent().hasClass('menu-active')) {
                    $(this).parent().children('.sub-menu').slideUp().removeClass('slide');
                    $(this).parent().removeClass('menu-active');
                } else {
                    if ($expandAll == true) {
                        $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                        return;
                    }
                    $(this).parent().siblings().removeClass('menu-active');
                    $(this).parent('li').siblings().children('.sub-menu').slideUp().removeClass('slide');
                    $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                }
            });
            //End of responsive menu function

        });
        //End of Main function
    }

})(jQuery);
