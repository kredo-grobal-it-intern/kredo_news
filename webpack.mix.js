const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.js('resources/js/app.js', 'public/js').vue()
 .js('resources/js/_login.js', 'public/js')
 .js('resources/js/_ajaxreact.js', 'public/js')
 .js('resources/js/_ajaxbookmark.js', 'public/js')
 .js('resources/js/admin.js', 'public/js')
 .js('resources/js/_ajaxfollow.js', 'public/js')
 .js('resources/js/_profile_tab.js', 'public/js')
 .js('resources/js/_profile_edit.js', 'public/js')
 .js('resources/js/_comment_like.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css')
 .sass('resources/sass/profile.scss', 'public/css')
 .sass('resources/sass/profile_edit.scss', 'public/css')
 .sass('resources/sass/login.scss', 'public/css')
 .sass('resources/sass/register.scss', 'public/css')
 .sass('resources/sass/favorite.scss', 'public/css')
 .sass('resources/sass/search.scss', 'public/css')
 .sass('resources/sass/filtered_page.scss', 'public/css')
 .sass('resources/sass/navbar.scss', 'public/css')
 .sass('resources/sass/footer.scss', 'public/css')
 .sass('resources/sass/top.scss', 'public/css')
 .sass('resources/sass/detail.scss', 'public/css')
 .sass('resources/sass/admin/table.scss', 'public/css/admin')
 .sass('resources/sass/admin/style.scss', 'public/css/admin')
 .sass('resources/sass/admin/navbar.scss', 'public/css/admin')
 .sass('resources/sass/admin/dashboard.scss', 'public/css/admin')
 .sass('resources/sass/admin/create.scss', 'public/css/admin')
 .sass('resources/sass/news_list.scss', 'public/css');

//  mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
