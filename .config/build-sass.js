/**
 * Sass build script.
 * Converts src/assets/css/*.scss without an underscore prefix to src/assets/css/*.css.
 */
import sass from 'node-sass';
import fs from 'fs';
import glob from 'glob';

const isProduction = process.env.NODE_ENV === 'production';

// Get all of the *.scss files in src/assets/css whose name doesn't start with an underscore.
const files = glob.sync( 'src/assets/css/!(_)*.scss' );
for ( let i = 0; i < files.length; i++ ) {
	const file = files[ i ];
	const outFile = file.replace( '.scss', '.css' );
	sass.render(
		{
			file: file,
			outFile: outFile,
			sourceMap: isProduction ? false : true,
			outputStyle: isProduction ? 'compressed' : 'expanded',
			sourceMapContents: isProduction ? false : true,
			sourceMapEmbed: isProduction ? false : true,
		},
		function ( error, result ) {
			if ( ! error ) {
				fs.writeFile( outFile, result.css, function ( err ) {
					if ( ! err ) {
						console.log( `${ file } > ${ outFile }` );
					} else {
						console.log(
							`Error writing Sass file ${ file } to ${ outFile }: ${ err }`
						);
					}
				} );
			} else {
				console.log(
					`Error writing Sass file ${ file } to ${ outFile }: ${ error }`
				);
			}
		}
	);
}
