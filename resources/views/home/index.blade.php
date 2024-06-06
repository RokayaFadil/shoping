<!DOCTYPE html>
<html>
<head>
    <title>My shop</title>

    <link rel="stylesheet" href="CSS/index.css"/>
     <link rel="stylesheet" href="CSS/medi.css"/>
    <link rel="stylesheet" href="CSS/jquery.bxslider.css" type="text/css" /> 
</head>
<body>

    <div id="wrapper">
         <div id="haeder">
             <div id="subheader">
             <div class="container">
                 <p> مركز التسوق الالكتروني الاول </p>
                 <a href="#">Download App</a>
                 <a href="#">help</a>
             </div>

             <div id="main-header">
                <logo id="logo">
                    <span id="a">DODO</span>
                    <span id="b">shop</span>
                </logo>

                <div id="search">
                    <form action="{{ route('search.perform') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="query" class="search-area" placeholder="Search for products...">
                        </div>
                        <button type="submit" class="search-btn">SEARCH</button>
                    </form>
                    {{-- <input class="search-area" type="text" name="text" placeholder="Search"/>
                    <input class="search-btn" type="submit" name="submit" value="SEARCH"/> --}}
                    
                </div>
             <div id="user-menu">
                 <li><a href="{{route('cart.index')}}">Cart</a></li>
                 <li><a href="{{route('login')}}">Login</a></li>
                 
             </div>
        
            </div>
            </div>
         </div>

         {{-- <div id="navigation">
             <nav>
                 <a href="#">Home</a>
                 <a href="#">New aeeivals</a>
                 <a href="#">Deals</a>
                 <a href="#">Elctronics</a>
                 <a href="#">Products</a>
                 <a href="#">Accessores</a>
                 <a href="#">Oreder</a>
             </nav>
         </div> --}}

          <div id="slider">
              <ul class="bxslider">
                  <li><img src="img/1.jpg"></li>
                  <li><img src="img/2.jpg"></li>
                  <li><img src="img/4.png"></li>
                  <li><img src="img/6.jpg"></li>
                  <li><img src="img/7.jpg"></li>
              </ul>
          </div>
          <div class="container">
              <div id="catogry">
                  <h2>الفئات</h2>
              </div>
              @foreach ($categories as $categorie)
              
              <a href="{{route('shop.show', $categorie->id)}}">
                  <div class="catbox">
                      <img src="{{$categorie->imagecategorie}}" alt="phones">
                      <h4>
                      <span>{{$categorie->namecategorie}}</span>
                    </h4>
                  </div>
              </a>
              @endforeach
 

    <div class="container">
        <div id="catogry">
            <h2>Products</h2>
        </div>
        @foreach ($products as $product )
    <div class="prod-container">

        <div class="prod-box">
            <img src="{{$product->imageproduct}}">
            <div class="prod-trans">
            <div class="prod-fetuer">
                <p>{{$product->nameproduct}}</p>
                <p>{{$product->price}}$</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button  type="submit">Add to Cart</button>
                </form>
               
            </div>
            </div>
          </div>
        </div>
        @endforeach
        

        <div class="container">
            <div id="catogry">
                <h2>Offers</h2>
            </div>

            <div class="offer">
                <a href="#">
                    <img src="img/coca.jpg">
                </a>
            </div>
            <div class="offer">
                <a href="#">
                    <img src="img/liz.jpg">
                </a>
            </div>
            <div class="offer">
                <a href="#">
                    <img src="img/bmw.jfif">
                </a>
            </div>
      </div>
     </div>
       <div id="footer">
           <div class="container">
               <div class="footer-sup-1">
                 <h2>MY shop</h2>
                 <p>The shop mostly sells the daily necessaries like the canned food, toiletries, cosmetics, fruits, groceries, vegetables, dairy products, fish, packaged food, various types of meats like beef, chicken, soft beverages like juice and the list goes on. 

                 <span><a href="#">Read more</a></span>
                </p>
               </div>
           </div>
           <div class="footer-sup-2">
               <h2>Important Links</h2>
               <ul>
                   <li><a href="#">Home</a></li>
                   <li><a href="#">New arrivals</a></li>
                   <li><a href="#">Deals</a></li>
                   <li><a href="#">Electronics</a></li>
                   <li><a href="#">Clothes</a></li>
                   <li><a href="#">Order</a></li>
               </ul>
           </div>
           <div class="footer-sup-2">
            <h2>Social Links</h2>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Googel</a></li>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        <div class="footer-sup-3">
            <h2>Subscribe Us :</h2>
            <input type="text" name="subs" placeholder="Wriet here your E-mail" class="subs">
            <input type="submit" name="submit-btn" value="SUBSCRIBE" class="sup-btn">
            <p class="sup-p">Enter your Email to get our notification</p>
        </div>
       </div>






    </div>

    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/my.js"></script>
</body>
</html>