const { src, dest, watch, parallel } = require('gulp');

// CSS
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

// Images
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');

// Javascript
const terser = require('gulp-terser-js');
const concat = require('gulp-concat');
const rename = require('gulp-rename');

// Webpack
const webpack = require('webpack-stream');

const PATHS = {
	SCSS: 'src/scss/**/*.scss',
	JS: 'src/js/**/*.js',
	IMAGES: 'src/img/**/*',
};

const OUTPUT_DIR = './public/build';

function css() {
	return src(PATHS.SCSS)
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(`${OUTPUT_DIR}/css`));
}
function javascript() {
	return src(PATHS.JS)
		.pipe(
			webpack({
				module: {
					rules: [
						{
							test: /\.css$/i,
							use: ['style-loader', 'css-loader'],
						},
					],
				},
				mode: 'production',
				watch: true,
				entry: './src/js/app.js',
			})
		)
		.pipe(sourcemaps.init())
		.pipe(terser())
		.pipe(sourcemaps.write('.'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(dest(`${OUTPUT_DIR}/js`));
}

function images() {
	return src(PATHS.IMAGES)
		.pipe(cache(imagemin({ optimizationLevel: 3 })))
		.pipe(dest(`${OUTPUT_DIR}/img`));
}

function versionWebp(done) {
	src(`${PATHS.IMAGES}.{png,jpg}`)
		.pipe(webp({ quality: 50 }))
		.pipe(dest(`${OUTPUT_DIR}/img`));
	done();
}

function versionAvif(done) {
	src(`${PATHS.IMAGES}.{png,jpg}`)
		.pipe(avif({ quality: 50 }))
		.pipe(dest(`${OUTPUT_DIR}/img`));
	done();
}

function watchFiles(done) {
	watch(PATHS.SCSS, css);
	watch(PATHS.JS, javascript);
	watch(PATHS.IMAGES, images);
	watch(PATHS.IMAGES, versionWebp);
	watch(PATHS.IMAGES, versionAvif);
	done();
}

exports.css = css;
exports.js = javascript;
exports.images = images;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.default = parallel(
	css,
	images,
	versionWebp,
	versionAvif,
	javascript,
	watchFiles
);
