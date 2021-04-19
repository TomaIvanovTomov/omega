<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{setting('site.title')}}</title>
        <meta name="description" content="{{setting('site.description')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css" integrity="sha512-PlmS4kms+fh6ewjUlXryYw0t4gfyUBrab9UB0vqOojV26QKvUT9FqBJTRReoIZ7fO8p0W/U9WFSI4MAdI1Zm+A==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/css/fileinput.min.css" integrity="sha512-iPac4HfczXMa0qW1F34D91WysfdyjgbvopGdZcW0IlTwxgfLrFmxnQFThIASKs72aAHm5WVODsZZMrx+tgE+iw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    </head>
    <body>
    @if($_SERVER['REQUEST_URI'] != "/login" && $_SERVER['REQUEST_URI'] != "/register")
        @include('layouts.header')
    @endif
        @yield('content')
        @if($_SERVER['REQUEST_URI'] != "/login" && $_SERVER['REQUEST_URI'] != "/register")
            @include('layouts.footer')
        @endif
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <scritp src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></scritp>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/js/fileinput.min.js" integrity="sha512-yLD+PqEyjv+TMfhD9sJ2c7hEp10omIrUgEJm+m68/ryVFZJtcQubBNClRmBHqAfiYQfciHQQEAWyTLy5NnrRVw==" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/carousel-thumbs.min.js')}}"></script>
        <script src="{{asset("assets/js/custom.js")}}"></script>
    <!-- Trigger the modal with a button -->
    </body>
</html>

