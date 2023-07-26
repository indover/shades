const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or subdirectory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './assets/app.js')
    .addEntry('bootstrap', './assets/js/bootstrap.min.js')
    .addEntry('custom', './assets/js/custom.js')
    .addEntry('imagesloaded', './assets/js/imagesloaded.pkgd.min.js')
    .addEntry('isotope', './assets/js/isotope.pkgd.min.js')
    .addEntry('ajaxchimp', './assets/js/jquery.ajaxchimp.min.js')
    .addEntry('appear', './assets/js/jquery.appear.js')
    .addEntry('easing', './assets/js/jquery.easing.js')
    .addEntry('flexslider', './assets/js/jquery.flexslider.js')
    .addEntry('magnific', './assets/js/jquery.magnific-popup.min.js')
    .addEntry('scrollto', './assets/js/jquery.scrollto.js')
    .addEntry('validate', './assets/js/jquery.validate.min.js')
    .addEntry('vide', './assets/js/jquery.vide.min.js')
    .addEntry('jquery', './assets/js/jquery-3.6.0.min.js')
    .addEntry('materialize', './assets/js/materialize.js')
    .addEntry('menu', './assets/js/menu.js')
    .addEntry('modernizr', './assets/js/modernizr.custom.js')
    .addEntry('carousel', './assets/js/owl.carousel.min.js')
    .addEntry('wow', './assets/js/wow.js')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // configure Babel
    // .configureBabel((config) => {
    //     config.plugins.push('@babel/a-babel-plugin');
    // })

    // enables and configure @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })

    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    // .autoProvidejQuery()
    // .autoProvideVariables({
    //     $: 'jquery',
    //     jQuery: 'jquery',
    //     'window.jQuery': 'jquery'
    // })
    // .enableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();
