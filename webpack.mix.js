const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);


mix
    // .js("resources/js/app.js", "public/js/app.js")
    // .js("resources/js/bootstrap.js", "public/js/app.js")
    // .js("resources/js/main.js", "public/js/app.js")
    // .js("resources/js/sb-admin-2.min.js", "public/js/app.js")



    // .js("resources/js/jquery-3.5.1.min.js", "public/js/app.js")
    // .js("resources/js/bootstrap.min.js", "public/js/app.js")

    .styles([
        "resources/css/bootstrap.min.css",
        "resources/css/pricing.css",
        "resources/css/form.css",
        "resources/css/all.css",
        "resources/css/style.css",
        "resources/fonts/font-awesome-4.7.0/css/font-awesome.min.css",
        "resources/vendor/animate/animate.css",
        "resources/vendor/css-hamburgers/hamburgers.min.css",
        "resources/vendor/select2/select2.min.css",
        "resources/css/form-util.css",
        "resources/css/form-main.css",
        "resources/css/main.css",
        "resources/css/sb-admin-2.min.css",
        "resources/css/tradeDetails.css",
        "resources/css/userDetail.css",
        "resources/css/util.css"

    ], "public/css/app.css")
    .scripts([
        "resources/vendor/jquery/jquery-3.2.1.min.js",
        "resources/vendor/bootstrap/js/popper.js",
        "resources/vendor/bootstrap/js/bootstrap.min.js",
        "resources/vendor/select2/select2.min.js",
        "resources/vendor/tilt/tilt.jquery.min.js",
        "resources/js/js.js",
        "resources/js/main.js"
    ], "public/js/app.js")


    // .js("resources/vendor/jquery/jquery-3.2.1.min.js", "public/js/app.js")
    // .js("resources/vendor/bootstrap/js/popper.js", "public/js/app.js")
    // .js("resources/vendor/bootstrap/js/bootstrap.min.js", "public/js/app.js")
    // .js("resources/vendor/select2/select2.min.js", "public/js/app.js")
    // .js("resources/vendor/tilt/tilt.jquery.min.js", "public/js/app.js")
    // .js("resources/js/main.js", "public/js/app.js")


    // .postCss("resources/css/bootstrap.min.css", "public/css/app.css")
    // // .postCss("resources/css/style.css", "public/css/app.css")
    // .postCss("resources/css/pricing.css", "public/css/app.css")
    // .postCss("resources/css/form.css", "public/css/app.css")
    // .postCss("resources/css/style.css", "public/css/app.css")
    // .postCss("resources/fonts/font-awesome-4.7.0/css/font-awesome.min.css", "public/css/app.css")
    // .postCss("resources/vendor/animate/animate.css", "public/css/app.css")
    // .postCss("resources/vendor/css-hamburgers/hamburgers.min.css", "public/css/app.css")
    // .postCss("resources/vendor/select2/select2.min.css", "public/css/app.css")
    // .postCss("resources/css/form-util.css", "public/css/app.css")
    // .postCss("resources/css/form-main.css", "public/css/app.css")
    // .postCss("resources/css/main.css", "public/css/app.css")
    // // .postCss("resources/css/form-main.css", "public/css/app.css")
    // // .postCss("resources/css/form-util.css", "public/css/app.css")
    // // .postCss("resources/css/form.css", "public/css/app.css")
    // // .postCss("resources/css/pricing.css", "public/css/app.css")
    // .postCss("resources/css/sb-admin-2.min.css", "public/css/app.css")
    // .postCss("resources/css/tradeDetails.css", "public/css/app.css")
    // .postCss("resources/css/userDetail.css", "public/css/app.css")
    // .postCss("resources/css/util.css", "public/css/app.css")
    ;