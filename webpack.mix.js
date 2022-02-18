const mix = require("laravel-mix");
mix.setPublicPath("public");
mix.setResourceRoot("../");

mix.js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("postcss-import"),
    require("tailwindcss")
  ])
  .sass("resources/sass/app.scss", "public/css");
// .copy("node_modules/@fortawesome/fontawesome-free/webfonts", "public/webfonts");


if (mix.inProduction()) {
  mix.version();
}
