; (function ($) {
    $(document).ready(function () {
        
        $('#footer .menu').addClass('footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block');
        $('#footer .gallery').addClass('row row-10 gutters-10');
        $('#footer .gallery').attr('data-lightgallery', 'group');
        $('#footer .gallery-item').addClass('col-4 col-sm-2 col-lg-4');
        $('#footer .gallery-item a').addClass('thumbnail-minimal');
        $('#footer .gallery-item a').attr('data-lightgallery', 'item');
        $('#footer .gallery-item a').on('click', function (e) { e.preventDefault(); });


        $('.pagination-wrap ul').addClass('pagination');
        $('.pagination-wrap ul li').addClass('page-item');
        $('.pagination-wrap ul li:first-child').addClass('page-item-control');
        $('.pagination-wrap ul li:last-child').addClass('page-item-control');
        $('.pagination-wrap ul li a, .pagination-wrap ul li span').addClass('page-link');
        $('.pagination-wrap ul li .current').parent('li').addClass('active');


    });
})(jQuery);