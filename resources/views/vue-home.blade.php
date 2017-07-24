<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="description" content="">
    <meta name="author" content="">   
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
    <title>{{ config('app.name', 'Simple Notebooks LaraVue App') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="./css/app.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div id="app">
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" tag="li" class="active"><router-link to="/">Home</router-link></li>
            <li role="presentation"><router-link to="/about">About</router-link></li>
            <li role="presentation"><router-link to="/contact">Contact</router-link></li>
          </ul>
        </nav>
        <h3 class="text-muted">{{ config('app.name') }}</h3>
      </div>

      {{--  <div class="jumbotron">  --}}
        {{--  <h1>Jumbotron heading</h1>  --}}
        <router-view></router-view>
      {{--  </div>  --}}

      {{--  <div class="row marketing">
        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
         
        </div>

        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          
        </div>
      </div>  --}}

      <footer class="footer">
        <p>&copy; {{ date('Y') }}. {{ config('app.name') }}</p>
      </footer>

    </div> <!-- /container -->
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/app.js"></script>
  </body>
</html>
