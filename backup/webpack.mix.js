const mix = require("laravel-mix");
mix.setPublicPath("public");
mix.setResourceRoot("../");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
    ])


if (mix.inProduction()) {
    mix.version();
}
