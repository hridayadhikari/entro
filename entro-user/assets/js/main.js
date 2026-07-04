
/* ============================================================
   Navbar Toggler Icon Handler
   - Listens for clicks on the hamburger button
   - Removes the "X" icon class when the menu is closed
   ============================================================ */
function navbarTogglerIcon() {
    $('.navbar-toggler[data-toggle=collapse]').click(function () {
        /* If icon is NOT bars (fa-bars), remove the X (fa-times) icon */
        if ($(".navbar-toggler[data-bs-toggle=collapse] i").hasClass('fa-bars')) {
            // menu is opening — do nothing here
        } else {
            $(".navbar-toggler[data-bs-toggle=collapse] i").removeClass("fa-times");
        }
    });
}
navbarTogglerIcon();

/* ============================================================
   Mobile Nav Clone
   - Clones the desktop nav links into the mobile sidebar panel
   - When a nav link is clicked inside the mobile panel:
     1. Removes "active" from all nav links
     2. Hides the mobile overlay
     3. Adds "active" to the clicked link
   ============================================================ */
function cloneNavForMobile() {
    /* Clone every element with class .cloned-nav-source and append into .mobile-nav-body */
    $('.cloned-nav-source').each(function () {
        var $this = $(this);
        $this.clone().attr('class', 'navbar-nav ml-auto').appendTo('.mobile-nav-body');
    });

    /* Handle link click inside the mobile overlay */
    $('.mobile-nav-overlay .nav-link').click(function () {
        $(".nav-link").removeClass("active");          // clear all active states
        $('.mobile-nav-overlay').removeClass('show');  // close the mobile panel
        $(this).toggleClass('active');                 // mark clicked link as active
    });
}
cloneNavForMobile();

/* ============================================================
   Fancybox Gallery Initialization
   - Enables image/video lightbox on elements with [data-fancybox]
   - Options: protect content, show specific toolbar buttons
   ============================================================ */
function initFancybox() {
    $('[data-fancybox]').fancybox({
        protect: true,        // disable right-click on images
        buttons: [
            "fullScreen",
            "thumbs",
            "share",
            "slideShow",
            "close"
        ],
        image: {
            preload: false    // don't preload adjacent images
        },
    });
}
initFancybox();

/* ============================================================
   Testimonial Slider (Slick)
   - Auto-playing fade slider, 1 slide at a time
   - Responsive breakpoints all show 1 slide
   ============================================================ */
$('.testimonial-slider').slick({
    centerMode: true,
    centerPadding: '0px',
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    speed: 1000,
    fade: true,                // use fade transition instead of slide
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1500,
            settings: { slidesToShow: 1 }
        },
        {
            breakpoint: 992,
            settings: { slidesToShow: 1 }
        },
        {
            breakpoint: 480,
            settings: { slidesToShow: 1 }
        }
    ]
});

/* ============================================================
   Load More / Explore More Button Logic
   - updateSliceShow()  : returns how many items to show/load
     based on current window width
   - load_more()        : hides all items, shows the first N,
     and reveals a "load more" button if items are still hidden;
     on button click, reveals the next batch with slideDown()
   ============================================================ */
function updateSliceShow() {
    var windowWidth = $(window).width();
    var defaultShow, sliceShow;

    if (windowWidth < 768) {
        defaultShow = 1;
        sliceShow   = 1;
    } else if (windowWidth < 992) {
        defaultShow = 2;
        sliceShow   = 2;
    } else if (windowWidth < 1200) {
        defaultShow = 4;
        sliceShow   = 2;
    } else {
        defaultShow = 4;
        sliceShow   = 2;
    }

    return [sliceShow, defaultShow];
}

function load_more(sectionName, itemSelector, btnParentClass, btnId, defaultShow, sliceShow) {
    /* Hide all items and the load-more button initially */
    $(itemSelector).css("display", "none");
    $(sectionName + " " + btnParentClass).css("display", "none");

    /* Show only the first N items */
    $(itemSelector).slice(0, defaultShow).fadeIn();

    /* If more items are hidden, show the load-more button */
    if ($(itemSelector + ":hidden").length !== 0) {
        $(sectionName + " " + btnParentClass).css("display", "flex");

        /* On button click, reveal the next batch */
        $(btnId).off("click").on("click", function (e) {
            e.preventDefault();
            $(itemSelector + ":hidden").slice(0, sliceShow).slideDown(500);

            /* Hide button once all items are visible */
            if ($(itemSelector + ":hidden").length === 0) {
                $(sectionName + " " + btnParentClass).css("display", "none");
            }
        });
    }
}

/* Run load_more on DOM ready and on window resize */
$(document).ready(function () {
    var sliceDefault, sliceShow;
    [sliceShow, sliceDefault] = updateSliceShow();

    /* Re-calculate on window resize */
    $(window).on("resize", function () {
        [sliceShow, sliceDefault] = updateSliceShow();
        load_more(".blog-section", ".blog",    ".blog-load-more-btn",    "#blog-load-more",    sliceDefault, sliceShow);
        load_more(".blog-section", ".popular", ".popular-load-more-btn", "#popular-load-more", sliceDefault, sliceShow);
    });

    /* Initial call */
    load_more(".blog-section", ".blog",    ".blog-load-more-btn",    "#blog-load-more",    sliceDefault, sliceShow);
    load_more(".blog-section", ".popular", ".popular-load-more-btn", "#popular-load-more", sliceDefault, sliceShow);
});
