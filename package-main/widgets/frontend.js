( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	**/

	var DealsGridWithFilterHandler = function( $scope, $ ) {
		// console.log($scope);
    var navItem = $scope.find('.filter-item'),
        listItems = $scope.find('.deals-grid-items');

    navItem.on('click', function(event) {
        event.preventDefault();
        navItem.removeClass('active');
        $(this).addClass('active');

        var href = $(this).attr('href')

        listItems.removeClass('active');
        listItems.each(function() {
            if( href == '#' + $(this).data('term') ) {
                $(this).addClass('active');
            }
        });
    });

 	};

    var TeamsGridWithFilterHandler = function( $scope, $ ) {
		// console.log($scope);
    var navItem = $scope.find('.filter-item'),
        listItems = $scope.find('.teams-grid-items');

    navItem.on('click', function(event) {
        event.preventDefault();
        navItem.removeClass('active');
        $(this).addClass('active');

        var href = $(this).attr('href')

        listItems.removeClass('active');
        listItems.each(function() {
            if( href == '#' + $(this).data('term') ) {
                $(this).addClass('active');
            }
        });
    });

 	};

	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/pj-deals-grid-with-filter.default', DealsGridWithFilterHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pj-teams-grid-with-filter.default', TeamsGridWithFilterHandler );

	} );

} )( jQuery );
