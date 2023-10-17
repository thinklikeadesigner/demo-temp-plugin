/**
 * External dependencies
 */
import { test, expect } from '@playwright/test';

test( 'should add a file list to the page using JavaScript', async ( {
	page,
}, testInfo ) => {
	await page.goto( '/' );
	const container = await page.$( '#demotempplugin' );
	const list = await container.$( 'ol' );
	const items = await list.$$( 'li' );
	expect( items.length ).toBe( 3 );
	expect(
		page.getByText( 'demotempplugin/assets/js/public.js', {
			exact: true,
		} )
	).toBeTruthy();
	expect(
		page.getByText( 'demotempplugin/assets/css/public.css', {
			exact: true,
		} )
	).toBeTruthy();
	expect(
		page.getByText( 'demotempplugin/src/class-init.php:39', {
			exact: true,
		} )
	).toBeTruthy();
} );

test( 'should hide the content when clicked', async ( { page }, testInfo ) => {
	await page.goto( '/' );
	const container = await page.$( '#demotempplugin' );
	await container.click();
	expect( await container.isVisible() ).toBeFalsy();
} );
