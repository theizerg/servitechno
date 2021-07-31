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


mix.styles([
    'node_modules/otika/assets/css/app.min.css',
    'node_modules/otika/assets/css/style.css',
    'node_modules/@mdi/font/css/materialdesignicons.css',
    'node_modules/toastr/build/toastr.min.css',
    'node_modules/otika/assets/bundles/datatables/datatables.min.css',
    'node_modules/otika/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
    'node_modules/icheck/skins/square/blue.css',
    'node_modules/@dlghq/pace-progress/themes/blue/pace-theme-minimal.css',
    'node_modules/otika/assets/css/components.css',

    ], 'public/css/app.css');


mix.scripts([
    'node_modules/otika/assets/js/app.min.js',
    'node_modules/otika/assets/js/scripts.js',
    'node_modules/otika/assets/bundles/apexcharts/apexcharts.min.js',
    'node_modules/toastr/toastr.js',
    'node_modules/otika/assets/bundles/datatables/datatables.min.js',
    'node_modules/otika/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/dataTables.buttons.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/buttons.flash.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/jszip.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/pdfmake.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/vfs_fonts.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/buttons.print.min.js',
    'node_modules/icheck/icheck.js',

    

], 'public/js/app.js');
