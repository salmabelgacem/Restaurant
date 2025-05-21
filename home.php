<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html"); // Redirige vers login si pas connecté
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Food Website</title>
        <link rel="stylesheet" href="restou.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <nav>
    <ul>
      <li>Welcome, <?php echo htmlspecialchars($_SESSION['user_email']); ?></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    </nav>
        <section id="Home">
            <nav>
                <div class="logo">
                    <img src="image/logo.png">
                </div>
                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#About">About</a></li>
                    <li><a href="#Menu">Menu</a></li>
                    <li><a href="orders.php">My Orders</a></li>
                    <li><a href="#Review">Review</a></li>
                    <li><a href="#Order">Order</a></li>
                </ul>
                <div class="icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </nav>
              
            <div class="main">
                <div class="men_text">
                    <h1>Get fresh <span>Food</span><br>in an Easy Way</h1>
                </div>
                <div class="main_image">
                    <img src="image/main_img.png">
                </div>
            </div>
            <p>
                Enjoy delicious and freshly prepared meals delivered straight to your doorstep. 
                We ensure top-quality ingredients and quick service to make your dining experience exceptional.
                Order now and taste the difference!
            </p>
            <div class="main_btn">
                <a href="#">Order Now</a>
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </section>
        
        
        <div class="about" id="About">
            <div class="about_main">
                <div class="image">
                    <img src="image/Food-Plate.png">
                </div>
                <div class="about_text">
                    <h1><span>About</span> Us</h1>
                    <h3>Why Choose Us?</h3>
                    <p>
                        We are committed to bringing you high-quality meals made with fresh ingredients. 
                        Our chefs carefully prepare each dish to ensure great taste and satisfaction. 
                        With fast delivery and a wide range of menu options, we make sure that you get the best food experience every time. 
                        Give us a try and enjoy the flavors of excellence!
                    </p>
                </div>
            </div>
            <a href="#" class="about_btn">Order Now</a>
        </div>
        
        
        <div class="menu" id="Menu">
            <h1>Our<span>Menu</span></h1>
    
            <div class="menu_box">
              
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/buger.jpg" alt="Burger">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Burger</h2>
                        <p>
                            Un burger classique avec un steak de boeuf, fromage fondant, laitue croquante et sauce maison. Parfait pour les amateurs de fast-food !
                        </p>
                        <h3>20.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order1">Order Now</a>
                    </div>
                </div>
    
                
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/pasta.jpg" alt="Pasta">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Pasta</h2>
                        <p>
                            Des pâtes al dente accompagnées d'une sauce tomate maison, avec des herbes fraîches et du fromage râpé. Un plat réconfortant et savoureux.
                        </p>
                        <h3>10.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order2">Order Now</a>
                    </div>
                </div>
    
               
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/lasagna.webp" alt="Lasagna">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Lasagna</h2>
                        <p>
                            Une lasagne maison avec des couches de pâtes, de viande hachée, de sauce béchamel crémeuse et du fromage fondant, cuite à la perfection.
                        </p>
                        <h3>60.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order3">Order Now</a>
                    </div>
                </div>
    
                
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/chocolate_Drink.jpg" alt="Chocolate Drink">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Chocolate Drink</h2>
                        <p>
                            Une boisson chaude au chocolat crémeux et riche, idéale pour se réchauffer pendant les journées fraîches ou pour satisfaire une envie sucrée.
                        </p>
                        <h3>10.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order4">Order Now</a>
                    </div>
                </div>
    
               
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/pizza.jpg" alt="Pizza">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Pizza</h2>
                        <p>
                            Une pizza classique avec une pâte fine, de la sauce tomate fraîche, du fromage mozzarella fondant et des garnitures au choix. À partager ou à savourer seul !
                        </p>
                        <h3>15.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order5">Order Now</a>
                    </div>
                </div>
    
               
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/Hot_dog.jpg" alt="Hot Dog">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Hot Dog</h2>
                        <p>
                            Un hot dog juteux avec une saucisse grillée, de la moutarde, du ketchup et des oignons croustillants. Un encas savoureux et rapide.
                        </p>
                        <h3>15.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order6">Order Now</a>
                    </div>
                </div>
    
               
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/juse.jpg" alt="Juice">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Juice</h2>
                        <p>
                            Un jus de fruits frais, 100% naturel, préparé avec des fruits de saison pour un goût frais et revitalisant.
                        </p>
                        <h3>7.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order7">Order Now</a>
                    </div>
                </div>
    
                <div class="menu_card">
                    <div class="menu_image">
                        <img src="image/biryani.webp" alt="Biryani">
                    </div>
                    <div class="small_card">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="menu_info">
                        <h2>Biryani</h2>
                        <p>
                            Un plat épicé d'origine indienne avec du riz basmati parfumé, des épices aromatiques et de la viande savoureuse, un véritable régal pour les amateurs de plats exotiques.
                        </p>
                        <h3>10.00 TND</h3>
                        <div class="menu_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="menu_btn" id="order8">Order Now</a>
                    </div>
                </div>
    
    
            </div>
        </div>
    
       
        

        
        
    
        
        
        
        <div class="review" id="Review">
            <h1>Customer<span>Review</span></h1>
        
            <div class="review_box">
                <div class="review_card">
        
                    <div class="review_profile">
                        <img src="image/cu1.jpg">
                    </div>
        
                    <div class="review_text">
                        <h2 class="name">Hend Sabri</h2>
        
                        <div class="review_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
        
                        <div class="review_social">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
        
                        <p>
                            "I absolutely love the food here! The pizza is always fresh and delicious, with the perfect amount of cheese and toppings. 
                            I also highly recommend the chocolate crepes, they are a dessert I crave regularly. Excellent service as well!"
                        </p>
        
                    </div>
        
                </div>
        
                <div class="review_card">
        
                    <div class="review_profile">
                        <img src="image/cu2.jpg">
                    </div>
        
                    <div class="review_text">
                        <h2 class="name">Ons Jaber</h2>
        
                        <div class="review_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
        
                        <div class="review_social">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
        
                        <p>
                            "The cupcakes here are to die for! I especially loved the chocolate cupcake with rich frosting. I always feel 
                            welcomed and taken care of when I visit. A cozy spot to enjoy a treat with friends."
                        </p>
        
                    </div>
        
                </div>
        
                <div class="review_card">
        
                    <div class="review_profile">
                        <img src="image/cu3.jpg">
                    </div>
        
                    <div class="review_text">
                        <h2 class="name">Dhafer Abidin</h2>
        
                        <div class="review_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
        
                        <div class="review_social">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
        
                        <p>
                            "The food here is consistently amazing. I tried their blueberry cake for the first time and it was light, 
                            fluffy, and packed with flavor. Definitely my new favorite place for dessert!"
                        </p>
        
                    </div>
        
                </div>
        
                <div class="review_card">
        
                    <div class="review_profile">
                        <img src="image/cu4.jpg">
                    </div>
        
                    <div class="review_text">
                        <h2 class="name">Yasin Ben Gamra</h2>
        
                        <div class="review_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
        
                        <div class="review_social">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
        
                        <p>
                            "My family loves the pizzas here! The crust is always crispy, the cheese is perfectly melted, and they offer 
                            so many great topping options. I always leave satisfied!"
                        </p>
        
                    </div>
        
                </div>
        
            </div>
        
        </div>
        
       
    
        <div class="order" id="Order">
            <h1><span>Order</span>Now</h1>
        
            <div class="order_main">
        
                <div class="order_image">
                    <img src="image/order_image.png">
                </div>
        
                <form id="orderForm" action="order_process.php" method="POST">
                    <div class="input">
                        <p>Name</p>
                        <input type="text" name="name" placeholder="your name" required>
                    </div>
                
                    <div class="input">
                        <p>Email</p>
                        <input type="email" name="email" placeholder="your email" required>
                    </div>
                
                    <div class="input">
                        <p>Number</p>
                        <input type="text" name="number" placeholder="your number" required>
                    </div>
                
                    <div class="input">
                        <p>How Much</p>
                        <input type="number" name="orderCount" placeholder="how many orders" required>
                    </div>
                
                    <div class="input">
                        <p>You Order</p>
                        <input type="text" name="foodName" placeholder="food name" required>
                    </div>
                
                    <div class="input">
                        <p>Address</p>
                        <input type="text" name="address" placeholder="your address" required>
                    </div>
                
                    <button type="submit" class="order_btn">Order Now</button>
                   
                      
                </form>
                
            </div>
        
        </div>
        
       
        <div class="team">
            <h1>Our<span>Team</span></h1>
    
            <div class="team_box">
                <div class="profile">
                    <img src="">
    
                    <div class="info">
                        <h2 class="name">Hadyl Ben Taher</h2>
                        <p class="bio"> passionate about French gastronomy.</p>
    
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
    
                    </div>
    
                </div>
    
                <div class="profile">
                    <img src="">
    
                    <div class="info">
                        <h2 class="name">Salma Belgacem</h2>
                        <p class="bio">an expert in Oriental cuisinet.</p>
    
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
    
                    </div>
    
                </div>
    
                <div class="profile">
                    <img src="">
    
                    <div class="info">
                        <h2 class="name">Jihen Rezgi</h2>
                        <p class="bio">a talented pastry chef.</p>
    
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
    
                    </div>
    
                </div>
    
                <div class="profile">
                    <img src="">
    
                    <div class="info">
                        <h2 class="name">Narjes Harzli</h2>
                        <p class="bio">an innovator in fusion cuisine.</p>
    
                        <div class="team_icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    
        
       

    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Tunisia Mall, Berge de Lac</p>
                <p>La Marsa</p>
                <p>Sidi Bou Said</p>
                <p>Manar</p>
                <p>Sfax</p>
            </div>
            
            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>About</p>
                <p>Menu</p>
                <p>Gallary</p>
                <p>Order</p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+216 51767449 </p>
                <p>+216 21924218</p>
                <p>narjesharzli3@gmail.com</p>
                <p>foodshop123@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>GLOVO</p>
                <p>Rapido</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

       

    </footer>

    

    </body>
</html>