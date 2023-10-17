/**
 * Script loaded by the plugin's Assets class.
 * Your use case may not require it.
 */
( function () {
	// Now your JavaScript is protected from the global runtime scope.
	const message =
		'Your plugin is loaded!<br>Click to dismiss and it will not show up on the next page load.<div class="demotempplugin-file-list">Files:<ol><li>demotempplugin/assets/js/public.js</li><li>demotempplugin/assets/css/public.css</li><li>demotempplugin/src/class-init.php:39</li></ol></div>';

	// Parent element.
	const hidden = localStorage.getItem( 'demotempplugin-hidden' );
	const element = document.createElement( 'div' );
	if ( hidden ) {
		element.style.display = 'none';
	}
	element.id = 'demotempplugin';
	element.addEventListener( 'click', function () {
		element.style.display = 'none';
		localStorage.setItem( 'demotempplugin-hidden', true );
	} );

	// Child element.
	const content = document.createElement( 'div' );
	content.innerHTML = message;
	content.classList.add( 'demotempplugin-message' );
	content.addEventListener( 'click', function () {
		element.style.display = 'none';
	} );

	// Add elements to page.
	element.appendChild( content );
	document.body.appendChild( element );
} )();
