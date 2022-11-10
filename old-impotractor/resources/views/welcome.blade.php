<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <title>Impotractor</title>
  </head>

  <body>

    <!-- NAV BAR start -->
    <nav class="dark-transparent pinned z-index-1" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#inicio" class="brand-logo">
          <img class="img-logo" src="{{ asset('images/impotractor/impotractor-light-logo-x2.png') }}"/>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#nosotros">NOSOTROS</a></li>
          <li><a href="#myv">VALORES</a></li>
          <li><a href="#productos">PRODUCTOS</a><li>
          <li><a href="#contacto">CONTACTO</a></li>
          @if (Route::has('login'))
            @if (Auth::check())
              <li><a href="{{ url('/home') }}">CUENTA</a></li>
            @else
              <li><a href="{{ url('/login') }}">INICIO SESI&Oacute;N</a></li>
            @endif
          @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="#nosotros">NOSOTROS</a></li>
          <li><a href="#myv">VALORES</a></li>
          <li><a href="#productos">PRODUCTOS</a><li>
          <li><a href="#contacto">CONTACTO</a></li>
          @if (Route::has('login'))
            @if (Auth::check())
              <li><a href="{{ url('/home') }}">CUENTA</a></li>
            @else
              <li><a href="{{ url('/login') }}">INICIO SESI&Oacute;N</a></li>
            @endif
          @endif
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
    <!-- NAV BAR end -->

    <!-- MAIN MENU start -->
    <div id="index-banner" class="parallax-container">
      <div id="inicio" class="section no-pad-bot">
        <div class="container">
          <br><br>
          <h2 class="header right white-text text-lighten-2 bold-font">Más que repuestos, todo un servicio</h2>
          <div class="row right">
            <h5 class="header col s12 light bold-font">Encuentra lo que buscas con nosotros.</h5>
          </div>
          <br><br>

        </div>
      </div>
      <div class="parallax"><img src="{{ asset('images/impotractor/main-bgx2.jpg') }}" alt="Unsplashed background img 1"></div>
    </div>
    <!-- MAIN MENU end -->

    <!-- ABOUT US start -->
    <div class="container gray-bg" id="nosotros">
      <div class="section">

        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12 m6">
            <div class="icon-block">
              <h2 class="center white-text">Nosotros</h2>
              <p class="light white-text">
                Impotractor S.A., abre sus puertas en agosto de
                2005 como una empresa de importaci&oacute;n, venta
                de herramienta de corte y repuestos
                aftermarket de marcas reconocidas, calidad
                mundial y los mejores precios del mercado y
                espec&iacute;ficamente para maquinaria pesada de
                construcci&oacute;n.<br><br>
                En nuestro trabajo nos enpe&ntilde;amos en hacer las
                cosas con la mejor disponibilidad,
                responsabilidad, eficiencia y honestidad
                ofreciendo de esta manera un valor agregado
                a nuestro servicio, con toda la atenci&oacute;n que
                nuestros clientes se merecen.
              </p>
            </div>
          </div>

          <div class="col s12 m6">
            <div class="icon-block">
              <img class="us-truck-img" src="{{ asset('images/impotractor/truckx2.png') }}" alt="Unsplashed background img 1"/>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- ABOUT US END -->

    <!-- M&V start -->
    <div class="container yellow-bg" id="myv">
      <div>

        <!--   Icon Section   -->
        <div class="row no-bottom-margin">
          <div class="col s12 m6">
            <div class="icon-block">
              <h2 class="center black-text">Misi&oacute;n</h2>
              <p class="light black-text">
                Ser una empresa l&iacute;der en repuestos
                  aftermarket y la opci&oacute;n n&uacute;mero 1 de los
                  clientes por nuestra calidad, valor y
                  ahorro.
              </p>
            </div>
          </div>

          <div class="col s12 m6">
            <div class="icon-block vision">
              <h2 class="center black-text">Visi&oacute;n</h2>
              <p class="light black-text">
                Impotractor S.A. es una empresa l&iacute;der e independiente, con el
                  prop&oacute;sito de satisfacer los requerimientos de repuestos
                  leg&iacute;timos de marcas reconocidas y de calidad a nivel mundial
                  para motor y herramienta de corte espec&iacute;ficamente para
                  maquinaria pesada de construcci&oacute;n.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- M&V end -->

    <!-- PRODUCTS start -->
    <div class="container" id="productos">
      <div class="section no-padding-bottom">

        <div class="row">
          <div class="col s12 center">
            <h3><i class="mdi-content-send brown-text"></i></h3>
            <h4>Productos</h4>
            <div class="row">
              <div class="col s12">
                <ul class="tabs tabs-fixed-width" id="style-4">
                  @foreach($products as $productName => $product)
                    <li class="tab col"><a href="#{{$product['slug']}}">{{ $productName }}</a></li>
                  @endforeach
                </ul>
              </div>
              @foreach($products as $productName => $product)
                <div id="{{$product["slug"]}}" class="col s12">
                  @foreach($product['items'] as $name => $image)
                  <div class="col m3 s12">
                    <div class="card">
                      <div class="card-image">
                        <img src="{{ asset($image) }}">
                      </div>
                      <div class="card-content">
                        <span class="grey-text text-darken-4">{{ $name }}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <div id="asesoria" class="row no-bottom-margin yellow-bg">
          <div class="col s4 m3 l1">
            <img class="product-footer" src="{{ asset('images/impotractor/person.png') }}"></img>
          </div>
          <div class="col s8 m6 left footer-text">
            <h3>¿NECESITAS ASESOR&Iacute;A?</h3>
            <p>CUALQUIER DUDA O PREGUNTA SOLAMENTE MARCA Y RESPONDEREMOS.</p>
          </div>
          <!--
          <div class="col s8 m4 right">
            <button class="footer-btn" type="button">LLAMAR</button>
          </div>
          -->
        </div>

      </div>
    </div>
    <!-- PRODUCTS end -->

    <!-- CONTACT US start -->
    <div class="container gray-bg" id="contacto">
      <div class="section">
        <div class="row">
          <div class="col s12 m6">
            <div class="icon-block white-text">
              <h1>contacto</h1>
              <p>
              6 ave 2-68 z.2 de Mixco, 01057, Guatemala<br/>
              cotizaciones@impotractor.com<br/>
              TEL: 2250-7580, 4672-6104<br/>
              FAX: 2250-5934
              </p>
            </div>
          </div>
          @if (Session::has('mailSent'))
            <span class="help-block">
              <strong>{!! session('mailSent') !!}</strong>
            </span>
          @endif
          <form class="col s12 m6" method="post" action="contactus">
            {!! NoCaptcha::renderJs() !!}
            @if (Session::has('mailNotSent'))
              <span class="help-block">
                <strong>{!! session('mailNotSent') !!}</strong>
              </span>
            @endif
            <div class="row">
              <div class="input-field col s6">
                <input required aria-required='true' id="first_name" name="first_name" type="text" class="validate">
                <label for="first_name">Nombre</label>
              </div>
              <div class="input-field col s6">
                <input required aria-required='true' id="last_name" name="last_name" type="text" class="validate">
                <label for="last_name">Apellido</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required aria-required='true' id="email" name="email" type="email" class="validate">
                <label for="email">E-Mail</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea required aria-required='true' id="message" name="message" class="materialize-textarea"></textarea>
                <label for="message">Mensaje</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 captcha">
                {!! NoCaptcha::display() !!}
              </div>
              <div class="col s12 center">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" id="contacto-form-btn" value="ENVIAR">
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- CONTACT US end -->

    <!-- FOOTER start -->
    <footer class="page-footer yellow-bg">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <img class="footer-logo" src="{{ asset('images/impotractor/impotractor-logo-x2.png') }}"></img>
              </div>
              <div class="col l4 offset-l2 s12">
                Siguenos en
                <a target="_blank" href="https://www.facebook.com/impotractorsa/"><img src="{{ asset('images/impotractor/fb-logox2.png') }}"></img></a>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Text
            </div>
          </div>
        </footer>
    <!-- FOOTER end -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </body>

</html>
