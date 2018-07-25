
@extends('layouts.navUser', ['title' => 'Fifa 18'])

{{-- Page Accueil--}}
@section('accueilUser')

<div id="accueil" class="container-fluid">
  
  {{-- Colonne de Gauche --}}
  
  {{-- Resultats --}}
      <div class="col-sm-3 resultat">
      <img class="img-fluid resultats" src="img/image.jpg" alt="resultat">
      <img class="img-fluid resultats" src="img/image.jpg" alt="resultat">
      <img class="img-fluid resultats" src="img/image.jpg" alt="resultat">
      </div>
      
  {{-- Carroussel Centre --}}
  <div class="col-sm-6">
    <div id="myCarousel" class="carousel slide container" data-ride="carousel">
 
      <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="item active">
          <img src="img/LaSource.png" alt="" style="width:auto; margin: 0 auto;">
        </div>
        <div class="item">
          <img src="img/LaSource.png" alt="" style="width:auto; margin: 0 auto;">
        </div>

        <div class="item">
          <img src="img/LaSource.png" alt="" style="width:auto; margin: 0 auto;">
        </div>
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
  
  
  
  {{-- Articles --}}
  
  @foreach($posts as $post)
    @include('partials.post' , ["post" => $post])
  @endforeach

  {{ $posts->links() }}

  </div>
  
 {{-- API Twitter --}}
    <div class="col-sm-3 tweet">
    
      <?php	require "../vendor/autoload.php";
      use Abraham\TwitterOAuth\TwitterOAuth;
      use Twitter\Text\Autolink;


      $oauth = new TwitterOAuth("7Bt8KWEXOfss2sMH8ro66AcfN","KoMck6iiwxaZGuFYk5ENaL0EHZK33Yc2aV60A68w59ILlwAalL");
      $accessToken = $oauth->oauth2('oauth2/token' , ['grant_type' => 'client_credentials']);
      $twitter = new TwitterOAuth("7Bt8KWEXOfss2sMH8ro66AcfN","KoMck6iiwxaZGuFYk5ENaL0EHZK33Yc2aV60A68w59ILlwAalL" , null, $accessToken->access_token);

      $tweets = $twitter->get('statuses/user_timeline', 
      ['screen_name' => 'keiitarosan',
      'exclude_replies' => true,
          'count' => 50
      ]);

      $autolink = Autolink::create();
      ?>

      <h2>Nos Derniers Tweets</h2>

      <ul class="white">
        
        <?php foreach(array_slice($tweets, 0, 5) as $tweet): ?>

        <li> <?= $autolink->autoLink($tweet->text); ?>,
        <small>
        <time class="timeago" datetime="<?= date("c",strtotime($tweet->created_at)); ?>"></time>
        </small>
        </li>

        <?php endforeach; ?>

      </ul>

      <h2 class="part" style="color: black;">Nos Partenaires</h2>
        <div id="carouselPart" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">

            <div class="item active">
              <img src="img/LaSource.png" alt="" style="width:300px; margin: 0 auto;">
            </div>

            <div class="item">
              <img src="img/LaSource.png" alt="" style="width:300px; margin: 0 auto;">
            </div>

            <div class="item">
              <img src="img/LaSource.png" alt="" style="width:300px; margin: 0 auto;">
            </div>

                </div>
            </div>
        </div>
    </div>

@stop

{{-- Partenaires - Sponsors --}}
@section('sponsors')

    <div id="sponsors">
        <h1><strong>Nos Partenaires et Sponsors</strong></h1>
        {{--DayShop--}}
        <div class="media Day">
            <h2>DayShop</h2>
            <hr  style="width:100%; border-color: #0c0c0c" >
            <a href="http://dayshop.fr/"><img class="dayshop img-fluid"  src="img/DayShop.png" alt=""></a>
            <div class="media-body">
                <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
        </div>
        {{--Engage--}}
        <div class="media Eng">
            <h2>eNgage</h2>
            <hr style="width:100%; border-color: #0c0c0c">
            <a href="https://www.engage.gg/fr/"><img class="engage img-fluid"  src="img/Engage.png" alt=""></a>
            <div class="media-body">
                <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
        </div>
        {{--LaSource--}}
        <div class="media LaSo">
            <h2>La Source</h2>
            <hr style="width:100%; border-color: #0c0c0c">
            <a  href="https://la-source.co/"><img class="lasource img-fluid" src="img/LaSource.png" alt="Generic placeholder image"></a>
            <div class="media-body">
                <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
        </div>
    </div>
@stop

{{-- Line Up --}}
@section('lineup')
    <div id="lineup">

        <h1><strong>Nos Line up</strong></h1>

        <div class="jeu">
            <nav class="jeux">
                <ul>
                    <li><a href="{{url('COD')}}"><img class="img-fluid jMenu" src="img/cod.png"></a></li>
                    <li><a href="{{url('Fortnite')}}"><img class="img-fluid jMenu" src="img/fortnite.png"></a></li>
                    <li><a href="{{url('LoL')}}"><img class="img-fluid jMenu" src="img/lol.png"></a></li>
                    <li><a href="{{url('Fifa')}}"><img class="img-fluid jMenu" src="img/fifa.png"></a></li>
                    <li><a href="{{url('Overwatch')}}"><img class="img-fluid jMenu" src="img/ovw.png"></a></li>
                </ul>
            </nav>
        </div>
    </div>
@stop

{{-- Contact --}}

@section('contact')
    <div id="overlay">
        <div class="form-style-8 contact">
            <h2>Contactez nous !</h2>
            <form method="post" action="mail.php">
                <input type="hidden" name="subject" value="Formulaire de contact">
                <input type="hidden" name="access" value="stopspam">
                <input type="text" name="name" placeholder="Nom - Prénom" maxlength="30" required="" />
                <input type="text" name="object" placeholder="Objet" maxlength="30" required="" />
                <input type="email" name="mail" placeholder="Email" required="" />
                <textarea rows="2" name="message" cols="2" placeholder="Message" onkeyup="adjust_textarea(this)" required=""></textarea>
                <input class="contact" type="submit" value="Envoyer !" />
                <p>contact@orion-gamain.eu - 06.06.06.06.06 </p>
            </form>
        </div>
    </div>
@stop


{{-- Footer --}}

@section('footer')
    <!-- Footer -->
    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark mt-4" style="color: white;">

        <div style="background-color: #BB0606">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">Get connected with us on social networks!</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fa fa-facebook white-text mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fa fa-twitter white-text mr-4"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                            <i class="fa fa-google-plus white-text mr-4"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fa fa-linkedin white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fa fa-instagram white-text"> </i>
                        </a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5" style="background-color: #0c0c0c; width: 100%; ">

            <!-- Grid row -->
            <div class="row mt-3" style="background-color: #0c0c0c">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">Company name</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; ">
                    <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p>
                        <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
@stop
