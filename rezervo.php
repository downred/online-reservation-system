<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/rezervo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    </head>
    <?php require_once(__DIR__.'/nav-bar.php'); ?>
    <body>
        <!-- POP-UP FORM -->
        <div class="form-popup" id="popup">
            <h1>Enter the dates of your reservation</h1>
            <form action="">
                <div class="form-container">
                    <div class="date-holder">
                        <p>Nga: <input type="date" id="StartDate"></p>
                        <p>Deri: <input type="date" id="EndDate"></p>
                    </div>
                    <p style="visibility: hidden;" id="error-msg"></p>
                    <div class="button-holder">
                        <button class="cancel" onclick="CloseForm()">Anulo</button>
                        <button class="rezervo-btn" onclick="SubmitFrom()">Rezervo</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="hotel-card-container">
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel1.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                                <h3>H2 Hotel Wien</h3>
                                <p>230 Schönbrunner Straße, 12. Meidling, 1120 Vienna, Austria </p>
                                <p>4.5/5 ★</p>
                        </div>
                        <div class="reserve">
                                <h4>115$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                        </div>                       
                        <div class="desc">
                                <p>Located in Vienna, 1.2 km from Schönbrunn Palace, H2 Hotel Wien provides air-conditioned rooms and a restaurant. The property is set 3.1 km from Wiener Stadthalle, 1.8 km from Schönbrunner Gardens and 1.7 km from Rosarium. The property is allergy-free and is situated 2.3 km from Wien Westbahnhof Railway Station.</p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="hotel-card-container">
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel1.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                                <h3>H2 Hotel Wien</h3>
                                <p>230 Schönbrunner Straße, 12. Meidling, 1120 Vienna, Austria </p>
                                <p>4.5/5 ★</p>
                        </div>
                        <div class="reserve">
                                <h4>115$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                        </div>                       
                        <div class="desc">
                                <p>Located in Vienna, 1.2 km from Schönbrunn Palace, H2 Hotel Wien provides air-conditioned rooms and a restaurant. The property is set 3.1 km from Wiener Stadthalle, 1.8 km from Schönbrunner Gardens and 1.7 km from Rosarium. The property is allergy-free and is situated 2.3 km from Wien Westbahnhof Railway Station.</p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="hotel-card-container">
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel1.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                                <h3>H2 Hotel Wien</h3>
                                <p>230 Schönbrunner Straße, 12. Meidling, 1120 Vienna, Austria </p>
                                <p>4.5/5 ★</p>
                        </div>
                        <div class="reserve">
                                <h4>115$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                        </div>                       
                        <div class="desc">
                                <p>Located in Vienna, 1.2 km from Schönbrunn Palace, H2 Hotel Wien provides air-conditioned rooms and a restaurant. The property is set 3.1 km from Wiener Stadthalle, 1.8 km from Schönbrunner Gardens and 1.7 km from Rosarium. The property is allergy-free and is situated 2.3 km from Wien Westbahnhof Railway Station.</p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="hotel-card-container">
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel1.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                                <h3>H2 Hotel Wien</h3>
                                <p>230 Schönbrunner Straße, 12. Meidling, 1120 Vienna, Austria </p>
                                <p>4.5/5 ★</p>
                        </div>
                        <div class="reserve">
                                <h4>115$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                        </div>                       
                        <div class="desc">
                                <p>Located in Vienna, 1.2 km from Schönbrunn Palace, H2 Hotel Wien provides air-conditioned rooms and a restaurant. The property is set 3.1 km from Wiener Stadthalle, 1.8 km from Schönbrunner Gardens and 1.7 km from Rosarium. The property is allergy-free and is situated 2.3 km from Wien Westbahnhof Railway Station.</p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="hotel-card-container">
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel1.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                                <h3>H2 Hotel Wien</h3>
                                <p>230 Schönbrunner Straße, 12. Meidling, 1120 Vienna, Austria </p>
                                <p>4.5/5 ★</p>
                        </div>
                        <div class="reserve">
                                <h4>115$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                        </div>                       
                        <div class="desc">
                                <p>Located in Vienna, 1.2 km from Schönbrunn Palace, H2 Hotel Wien provides air-conditioned rooms and a restaurant. The property is set 3.1 km from Wiener Stadthalle, 1.8 km from Schönbrunner Gardens and 1.7 km from Rosarium. The property is allergy-free and is situated 2.3 km from Wien Westbahnhof Railway Station.</p>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
            
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel4.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Yunoshimakan</h3>
                            <p>509-2207 Gifu, Gero, Yunoshima 645, Japan </p>
                            <p>4.8/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Located on a hill and overlooking the famous Gero hot-spring area, Yunoshimakan, founded in 1931, offers large public indoor hot spring baths and open-air hot spring baths. Guests stay in Japanese-style rooms and can request massages for an extra cost. This traditional property is registered as a tangible cultural property and has been awarded TripAdvisor's Certificate of Excellence.</p>
                            </div>
                            <div class="reserve">
                                <h4>80$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel6.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Casa rural La Marquesa - Cuenca</h3>
                            <p>Calle San Isidro número 32 Casa rural, 16120 Valera de Abajo, Spain</p>
                            <p>4.0/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Situated in Valera de Abajo, 45 km from Cuenca Train Station and 46 km from Hanging Houses of Cuenca, Casa rural La Marquesa - Cuenca offers a garden and air conditioning. This sustainable holiday home is located 47 km from Mangana Tower and 47 km from Nuestra Señora de Gracia's Cathedral. The tour desk is available to assist guests in planning their days out.</p>
                            </div>
                            <div class="reserve">
                                <h4>100$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel10.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Harbor View</h3>
                            <p>21 Idrigill Uig, Uig, IV51 9XU, United Kingdom</p>
                            <p>3.8/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Located 48 km from Dunvegan Castle, Harbor View provides accommodation with free WiFi and free private parking. This apartment offers a garden.The apartment features 1 bedroom, a flat-screen TV, a fully equipped kitchenette with an oven and a toaster, and 1 bathroom with a shower. The accommodation is non-smoking.</p>
                            </div>
                            <div class="reserve">
                                <h4>90$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel11.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Waldschenke Stendenitz Übernachten im Wald am See</h3>
                            <p>13 Stendenitz Waldschenke Stendenitz, 16827 Neuruppin, Germany</p>
                            <p>4.1/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Waldschenke Stendenitz Übernachten im Wald am See offers a sauna and free private parking, and is within 12 km of Kulturhaus Stadtgarten and 43 km of Mirow Castle. The property has lake and garden views. The property offers bike hire and features a garden and children's playground.</p>
                            </div>
                            <div class="reserve">
                                <h4>120$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel12.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Bisma Eight - CHSE Certified</h3>
                            <p>Jalan Bisma , 80571 Ubud, Indonesia</p>
                            <p>4.3/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Situated a few minutes' away from central Ubud, Bisma Eight - CHSE Certified offers spacious contemporary rooms with traditional Japanese soaking tub. It also features an outdoor temperature-controlled pool and free WiFi access throughout.</p>
                            </div>
                            <div class="reserve">
                                <h4>130$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-animation">
                <div class="hotel-card">
                    <div class="hotel-img">
                        <img src="./images/hotel13.jpg" alt="">
                    </div>
                    <div class="main-info">
                        <div class="rating-addres">
                            <h3>Menjangan Dynasty Resort</h3>
                            <p>Banyuwedang, 81155 Banyuwedang, Indonesia</p>
                            <p>3.5/5 ★</p>
                        </div>

                        <div class="card-footer">
                            <div class="desc">
                                <p>Offering an outdoor pool and views of the sea, Menjangan Dynasty Resort is situated on the white sandy beach in Banyuwedang in the Bali Region. Free private parking is available on site.Each quality tent is equipped with premium amenities and furniture. It has a flat-screen LED TV, air conditioning, minibar, coffee & tea making facilities, a wardrobe, and a personal safe. Guests of the tent villas enjoy an en suite bathroom with a bath tub and a private infinity pool.</p>
                            </div>
                            <div class="reserve">
                                <h4>55$/Night</h4>
                                <button class="rezervo-btn" onclick="DisplayForm()">Rezervo</button>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/rezervo.js"></script>
    </body>
    <?php require_once(__DIR__.'/footer.php'); ?>
</html>