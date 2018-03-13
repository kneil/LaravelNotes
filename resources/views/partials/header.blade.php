<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="/js/app.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>

    @include('partials.nav')
    <div>
      <!--- add some spacing -->
      <div class="top-spacing container header-section top-spacing">
        <div class="row">
        </div>
      </div>
      @include('partials.errors')
      @include('partials.confirmations')
