/**
 * Jquery for the navigation
 * Handles toggling the navigation menu for small screens
 */
( function( $ ) {
	
	'use strict';

    // add submenu dropdown Toggle button.
    if( $( '.main-menu li.menu-item-has-children ul' ).length ){
        $( '.main-menu li.menu-item-has-children' ).append( '<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>' );

        // Dropdown submenue mobile.
        // Click on btn element.
        $( '.main-menu li.menu-item-has-children .dropdown-btn' ).on( 'click', function() {
            $(this).prev( 'ul' ).slideToggle( 500 );
            if( $(this).find( 'span' ).hasClass( 'fa-angle-down' ) ){
                $(this).find( 'span' ).removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
            }else{
                $(this).find( 'span' ).removeClass( 'fa-angle-up' ).addClass( 'fa-angle-down' );
            }
        });

        // Dropdown submenue mobile.
        // Click on a element.
        $( '.main-menu li.menu-item-has-children > a' ).on( 'click', function(e) {
            e.preventDefault();
            $(this).next( 'ul' ).slideToggle( 500 );
            var dropdownbtn = $(this).closest( 'li' ).find( '.dropdown-btn' ).find( 'span' );
            if( dropdownbtn.hasClass( 'fa-angle-down' ) ){
                dropdownbtn.removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
            }else{
                dropdownbtn.removeClass( 'fa-angle-up' ).addClass( 'fa-angle-down' );
            }
        });
    }

    /**
     * Start Check devide and resize the screen
     */
    $(document).ready(function () {

        // check size on resize the window.
        $(window).on('resize', function () {
            checkScreenSize();
        });
    
        // Start check on load.
        checkScreenSize();
    
        /**
         * Check windows screen size
         * mobile check
         */
        function checkScreenSize(){
            var newWindowWidth = $(window).width();
            if ( newWindowWidth > 767 ) {
                checkScrollheight();
            }
        }

        /**
         * Check scroll height and add or remove nav animation
         */
        function checkScrollheight(){
            $(window).scroll(function () {

                if ( $(this).scrollTop() > 100 ) {
                    $( '.navbar-main' ).css( 'min-height', '0' ).css( 'padding', '0' );
                } else {
                    $( '.navbar-main' ).css( 'min-height', '125px' ).css( 'padding', '.5rem 1rem' );
                }
    
            });
        }

    });

})( window.jQuery );