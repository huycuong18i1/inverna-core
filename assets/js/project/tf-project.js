(function($) {
    "use strict";

    var projectOwl = function() {
        if ($().owlCarousel) {
            $('.tf-project-wrap.has-carousel').each(function() {
                var $this = $(this),
                    item = $this.data("column"),
                    item2 = $this.data("column2"),
                    item3 = $this.data("column3"),
                    gap = $this.data("spacer"),
                    prev_icon = $this.data("prev_icon"),
                    next_icon = $this.data("next_icon"),
                    loop = $this.data("loop") === 'yes',
                    arrow = $this.data("arrow") === 'yes',
                    bullets = $this.data("bullets") === 'yes',
                    auto = $this.data("auto") === 'yes',
                    center = $this.data("center") === 'yes';

                $this.find('.owl-carousel').owlCarousel({
                    loop: loop,
                    margin: gap,
                    nav: arrow,
                    center: center,
                    dots: bullets,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 900,
                    autoplayHoverPause: true,
                    navText: [
                        "<i class=\"" + prev_icon + "\"></i>",
                        "<i class=\"" + next_icon + "\"></i>"
                    ],
                    responsive: {
                        0: { items: item3 },
                        768: { items: item2 },
                        1000: { items: item }
                    }
                });
            });
        }
    };

    var filterProject = function() {
        if ($('.project-filter').length) {
            $('.project-filter a').on('click', function(e) {
                e.preventDefault();

                $('.project-filter li').removeClass('active');
                $(this).parent().addClass('active');

                let category = $(this).data('filter').replace('.', '');
                let targetContainer = $('.wrap-project-post');
                let paged = $('.project-filter').data('page');

                $.ajax({
                    url: ajax_object.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'filter_project',
                        category: category,
                        paged: paged
                    },
                    beforeSend: function() {
                        targetContainer.addClass('overlay');
                    },
                    success: function(data) {
                        targetContainer.removeClass('overlay');
                        targetContainer.addClass('wrap-filter');
                        targetContainer.html(data);
                    },
                    error: function() {
                        targetContainer.html('<p>There was an error. Please try again.</p>');
                    },
                });
            });
        }
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-project.default', filterProject);
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-project.default', projectOwl);
    });

})(jQuery);
