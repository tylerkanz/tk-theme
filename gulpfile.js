var gulp = require('gulp');
var concat = require('gulp-concat');
const sass = require('gulp-sass')(require('sass'));

//compile scss into css
function style() {
    // 1. where is scss file
    return gulp.src('./sass/*.scss')
    // 2. pass that file through sass compiler
        .pipe(sass())
    // 3. where do I save the compiled CSS?
        .pipe(gulp.dest('./'))
}

exports.style = style;