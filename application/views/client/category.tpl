<!DOCTYPE HTML>
<html>

<head>
    <title>the box - Category layout 3</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="TheBox - premium e-commerce template">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/thebox/css/bootstrap.css">
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/thebox/css/font-awesome.css">
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/thebox/css/styles.css">
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/thebox/css/mystyles.css">

    <link rel="stylesheet" href="{$config['base_url']}/app/lib/be-ang/css/animate.css" type="text/css" />
    <!--<link rel="stylesheet" href="css/be-ang/css/font-awesome.min.css" type="text/css" />-->
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/be-ang/css/simple-line-icons.css" type="text/css" />
    <!--<link rel="stylesheet" href="css/be-ang/css/font.css" type="text/css" />-->
    <link rel="stylesheet" href="{$config['base_url']}/app/lib/be-ang/css/app.css" type="text/css" />


</head>

<body>
    <div class="global-wrapper clearfix" id="global-wrapper">
        <div class="navbar-before mobile-hidden hide">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="navbar-before-sign">Everything You Need is theBox</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav navbar-nav navbar-right navbar-right-no-mar">
                            <li><a href="#">About Us</a>
                            </li>
                            <li><a href="#">Blog</a>
                            </li>
                            <li><a href="#">Contact Us</a>
                            </li>
                            <li><a href="#">FAQ</a>
                            </li>
                            <li><a href="#">Wishlist</a>
                            </li>
                            <li><a href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-login-dialog">
            <h3 class="widget-title">Đăng nhập</h3>
            <p>Welcome back, friend. Login to get started</p>
            <hr />
            <form>
                <div class="form-group">
                    <label>Email hoặc Tên đăng nhâp</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Nhớ tài khoản</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Đăng nhập" />
            </form>
            <div class="gap gap-small"></div>
            <ul class="list-inline">
                <li><a href="#nav-account-dialog" class="popup-text">Chưa có tài khoản</a>
                </li>
                <li><a href="#nav-pwd-dialog" class="popup-text">Quên mật khẩu?</a>
                </li>
            </ul>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-account-dialog">
            <h3 class="widget-title">Tạo tài khoản</h3>
            <p>Đăng ký để sử dụng được tất cả chức năng</p>
            <hr />
            <form>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" type="text" />
                </div>
                
                <input class="btn btn-primary" type="submit" value="Tạo tài khoản" />
            </form>
            <div class="gap gap-small"></div>
            <ul class="list-inline">
                <li><a href="#nav-login-dialog" class="popup-text">Đã có tài khoản</a>
                </li>
            </ul>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-pwd-dialog">
            <h3 class="widget-title">Password Recovery</h3>
            <p>Enter Your Email and We Will Send the Instructions</p>
            <hr />
            <form>
                <div class="form-group">
                    <label>Your Email</label>
                    <input class="form-control" type="text" />
                </div>
                <input class="btn btn-primary" type="submit" value="Recover Password" />
            </form>
        </div>
        <nav class="navbar navbar-inverse navbar-main yamm">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="img/logo-w.png" alt="Image Alternative text" title="Image Title" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="#"><i class="fa fa-reorder"></i>&nbsp; Danh mục<i class="drop-caret" data-toggle="dropdown"></i></a>
                            <ul class="dropdown-menu dropdown-menu-category">
                                <li><a href="#"><i class="fa fa-home dropdown-menu-category-icon"></i>Home & Garden</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Home & Garden</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Home</a>
                                                                <p>Ullamcorper ut mauris blandit nascetur</p>
                                                            </li>
                                                            <li><a href="#">Kitchen</a>
                                                                <p>Non platea donec condimentum facilisi</p>
                                                            </li>
                                                            <li><a href="#">Furniture & Decor</a>
                                                                <p>Hac quisque consectetur posuere suspendisse</p>
                                                            </li>
                                                            <li><a href="#">Bedding & Bath</a>
                                                                <p>Duis platea augue aliquet morbi</p>
                                                            </li>
                                                            <li><a href="#">Appilances</a>
                                                                <p>Lacus consectetur elementum egestas lacus</p>
                                                            </li>
                                                            <li><a href="#">Patio, Lawn & Garden</a>
                                                                <p>Amet fames donec et nec</p>
                                                            </li>
                                                            <li><a href="#">Wedding Registry</a>
                                                                <p>Neque vitae at ut turpis</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Home Improvement</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Home Improvement</a>
                                                                <p>Maecenas in sodales nunc dui</p>
                                                            </li>
                                                            <li><a href="#">Lamps & Light Fixtures</a>
                                                                <p>Habitant mattis nisi conubia mi</p>
                                                            </li>
                                                            <li><a href="#">Kitchen & Bath Fixtures</a>
                                                                <p>Penatibus cum porta aenean mauris</p>
                                                            </li>
                                                            <li><a href="#">Home Automation</a>
                                                                <p>Consequat tincidunt lectus sagittis tellus</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/2-i.png" alt="Image Alternative text" title="Image Title" style="right: -10px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-diamond dropdown-menu-category-icon"></i>Jewelry</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Jewelry</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Necklances & Pendants</a>
                                                                <p>Dapibus suspendisse porta eget mattis</p>
                                                            </li>
                                                            <li><a href="#">Bracelets</a>
                                                                <p>Tempus vestibulum mus imperdiet nibh</p>
                                                            </li>
                                                            <li><a href="#">Rings</a>
                                                                <p>Sem pharetra quis netus vel</p>
                                                            </li>
                                                            <li><a href="#">Errings</a>
                                                                <p>Vehicula class vestibulum nisl donec</p>
                                                            </li>
                                                            <li><a href="#">Wedding & Engagement</a>
                                                                <p>Hendrerit fermentum magna sed amet</p>
                                                            </li>
                                                            <li><a href="#">Charms</a>
                                                                <p>Purus sit nec class sit</p>
                                                            </li>
                                                            <li><a href="#">Booches</a>
                                                                <p>Fringilla tellus volutpat per eget</p>
                                                            </li>
                                                            <li><a href="#">Men's Jewelry</a>
                                                                <p>Molestie platea suspendisse eget tortor</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Jewelry Shops</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Contemporary & Designer</a>
                                                                <p>Pharetra magna nam senectus tristique</p>
                                                            </li>
                                                            <li><a href="#">Juniors</a>
                                                                <p>Cursus ut odio sollicitudin venenatis</p>
                                                            </li>
                                                            <li><a href="#">Meternity</a>
                                                                <p>Natoque dis maecenas magna dignissim</p>
                                                            </li>
                                                            <li><a href="#">Pettite</a>
                                                                <p>Sociosqu et sociis accumsan interdum</p>
                                                            </li>
                                                            <li><a href="#">Uniforms, Works & Safety</a>
                                                                <p>Dictum netus quis enim phasellus</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/3-i.png" alt="Image Alternative text" title="Image Title" style="right: -10px; bottom: -10px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-child dropdown-menu-category-icon"></i>Toy & Kids</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Kids Clothing</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Accessories</a>
                                                                <p>Suscipit nunc donec purus dui</p>
                                                            </li>
                                                            <li><a href="#">Active Wear</a>
                                                                <p>Himenaeos nulla sociosqu rhoncus dictumst</p>
                                                            </li>
                                                            <li><a href="#">Coats & Jackets</a>
                                                                <p>Fusce ultricies congue sapien porttitor</p>
                                                            </li>
                                                            <li><a href="#">Jeans</a>
                                                                <p>Maecenas fringilla ipsum nam lorem</p>
                                                            </li>
                                                            <li><a href="#">Sets</a>
                                                                <p>Aliquam rhoncus elit himenaeos facilisis</p>
                                                            </li>
                                                            <li><a href="#">Indoors</a>
                                                                <p>Auctor nostra cubilia pretium ante</p>
                                                            </li>
                                                            <li><a href="#">Swimwear</a>
                                                                <p>A enim interdum ullamcorper erat</p>
                                                            </li>
                                                            <li><a href="#">Special Occasion</a>
                                                                <p>Pharetra varius imperdiet praesent tempor</p>
                                                            </li>
                                                            <li><a href="#">Shoes</a>
                                                                <p>Justo placerat eleifend senectus laoreet</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">More For Kids</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Kids Furniture</a>
                                                                <p>Mi cubilia volutpat augue convallis</p>
                                                            </li>
                                                            <li><a href="#">Kids Jewelry & Watches</a>
                                                                <p>Facilisi gravida vehicula duis aliquam</p>
                                                            </li>
                                                            <li><a href="#">Toys & Games</a>
                                                                <p>Habitant cras accumsan dis vitae</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/4-i.png" alt="Image Alternative text" title="Image Title" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-plug dropdown-menu-category-icon"></i>Electronics</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Electronics</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">TV & Video</a>
                                                                <p>Eleifend duis convallis porta gravida</p>
                                                            </li>
                                                            <li><a href="#">Home Audio & Theater</a>
                                                                <p>Auctor phasellus luctus ante et</p>
                                                            </li>
                                                            <li><a href="#">Camera, Photo & Video</a>
                                                                <p>Dignissim sagittis leo aptent malesuada</p>
                                                            </li>
                                                            <li><a href="#">Cell Phones & Accessories</a>
                                                                <p>Nibh convallis cras velit himenaeos</p>
                                                            </li>
                                                            <li><a href="#">Headphones</a>
                                                                <p>Dis pretium interdum bibendum elementum</p>
                                                            </li>
                                                            <li><a href="#">Video Games</a>
                                                                <p>Morbi dignissim dis habitant senectus</p>
                                                            </li>
                                                            <li><a href="#">Gar Electronics</a>
                                                                <p>Curabitur placerat consequat est nunc</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Computers</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Laptops & Tablets</a>
                                                                <p>Ad ornare commodo luctus curabitur</p>
                                                            </li>
                                                            <li><a href="#">Desktops & Monitors</a>
                                                                <p>Mi aliquet aliquam nec sollicitudin</p>
                                                            </li>
                                                            <li><a href="#">Computer Accessories</a>
                                                                <p>Fames cubilia elit donec nostra</p>
                                                            </li>
                                                            <li><a href="#">Software</a>
                                                                <p>Cum nullam porta dignissim tortor</p>
                                                            </li>
                                                            <li><a href="#">Printers & Ink</a>
                                                                <p>Porta turpis quam pretium ultricies</p>
                                                            </li>
                                                            <li><a href="#">Networking</a>
                                                                <p>Varius massa maecenas et id</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/5-i.png" alt="Image Alternative text" title="Image Title" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-tags dropdown-menu-category-icon"></i>Clothes & Shoes</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">TheBox Fashion</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Woman</a>
                                                                <p>Dictumst mattis donec fringilla ac</p>
                                                            </li>
                                                            <li><a href="#">Men</a>
                                                                <p>Parturient posuere id phasellus erat</p>
                                                            </li>
                                                            <li><a href="#">Girls</a>
                                                                <p>Elementum nullam lacus cursus rhoncus</p>
                                                            </li>
                                                            <li><a href="#">Boys</a>
                                                                <p>Parturient vitae praesent quisque nascetur</p>
                                                            </li>
                                                            <li><a href="#">Baby</a>
                                                                <p>Molestie quis dignissim vel sit</p>
                                                            </li>
                                                            <li><a href="#">Luggage</a>
                                                                <p>Odio metus tristique auctor dictumst</p>
                                                            </li>
                                                            <li><a href="#">Accessories</a>
                                                                <p>Primis ad viverra quisque etiam</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/6-i.png" alt="Image Alternative text" title="Image Title" style="right: -20px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-futbol-o dropdown-menu-category-icon"></i>Sports</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Sports</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Athletic Clothing</a>
                                                                <p>In rutrum donec cras non</p>
                                                            </li>
                                                            <li><a href="#">Exorcise & Fitness</a>
                                                                <p>Dis suscipit risus ridiculus lacus</p>
                                                            </li>
                                                            <li><a href="#">Hunting & Fishing</a>
                                                                <p>Mus cursus luctus donec pellentesque</p>
                                                            </li>
                                                            <li><a href="#">Team Sports</a>
                                                                <p>Rhoncus sem quam vulputate mus</p>
                                                            </li>
                                                            <li><a href="#">Fan Sports</a>
                                                                <p>Hendrerit risus ultrices a elementum</p>
                                                            </li>
                                                            <li><a href="#">Golf</a>
                                                                <p>Massa est at aenean parturient</p>
                                                            </li>
                                                            <li><a href="#">Sports Collections</a>
                                                                <p>In egestas senectus lectus convallis</p>
                                                            </li>
                                                            <li><a href="#">Camping & Hiking</a>
                                                                <p>Lectus dui neque sit dignissim</p>
                                                            </li>
                                                            <li><a href="#">Cycling</a>
                                                                <p>Facilisis fames feugiat laoreet pharetra</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/7-i.png" alt="Image Alternative text" title="Image Title" style="right: -39px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-music dropdown-menu-category-icon"></i>Entertaiment</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Entertaiment</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Video Games & Consoles</a>
                                                                <p>Felis vitae ornare lacus sodales</p>
                                                            </li>
                                                            <li><a href="#">Music</a>
                                                                <p>Non sapien curae nisl nec</p>
                                                            </li>
                                                            <li><a href="#">DVD & Movies</a>
                                                                <p>Habitant velit semper pretium et</p>
                                                            </li>
                                                            <li><a href="#">Tickets</a>
                                                                <p>Ipsum dolor in amet nunc</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Memorabilia</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Autographs</a>
                                                            </li>
                                                            <li><a href="#">Movie</a>
                                                            </li>
                                                            <li><a href="#">Music</a>
                                                            </li>
                                                            <li><a href="#">Television</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/9-i.png" alt="Image Alternative text" title="Image Title" style="right: -27px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-location-arrow dropdown-menu-category-icon"></i>Travel</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Travel Equepment</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Luggage</a>
                                                                <p>Vestibulum lacus nulla dis sollicitudin</p>
                                                            </li>
                                                            <li><a href="#">Travel Accessories</a>
                                                                <p>Diam luctus dolor ante lobortis</p>
                                                            </li>
                                                            <li><a href="#">Luggage Accessories</a>
                                                                <p>Neque enim facilisis penatibus integer</p>
                                                            </li>
                                                            <li><a href="#">Lodging</a>
                                                                <p>Lacinia semper nibh ullamcorper feugiat</p>
                                                            </li>
                                                            <li><a href="#">Maps</a>
                                                                <p>Faucibus non nec amet ac</p>
                                                            </li>
                                                            <li><a href="#">Other Travel</a>
                                                                <p>Mus hac diam nulla ridiculus</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Booking</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Vacation Packages</a>
                                                                <p>Proin sem iaculis condimentum pharetra</p>
                                                            </li>
                                                            <li><a href="#">Campground & RV</a>
                                                                <p>Morbi volutpat torquent orci luctus</p>
                                                            </li>
                                                            <li><a href="#">Rail</a>
                                                                <p>Pharetra volutpat nisl dis curae</p>
                                                            </li>
                                                            <li><a href="#">Car Rental</a>
                                                                <p>Primis aliquet sapien pellentesque velit</p>
                                                            </li>
                                                            <li><a href="#">Cruises</a>
                                                                <p>Tristique taciti tincidunt adipiscing pharetra</p>
                                                            </li>
                                                            <li><a href="#">Airline</a>
                                                                <p>Massa at quisque fermentum faucibus</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/11-i.png" alt="Image Alternative text" title="Image Title" style="right: -100px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-picture-o dropdown-menu-category-icon"></i>Art & Design</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Art</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Paintings from Dealers & Resellers</a>
                                                                <p>Ultrices mi fames himenaeos pellentesque</p>
                                                            </li>
                                                            <li><a href="#">Paintings Direct from Artist</a>
                                                                <p>Curabitur nisl etiam a volutpat</p>
                                                            </li>
                                                            <li><a href="#">Art Prints</a>
                                                                <p>Phasellus convallis diam tempus malesuada</p>
                                                            </li>
                                                            <li><a href="#">Art Photographs from Resellers</a>
                                                                <p>Mauris torquent dapibus montes mollis</p>
                                                            </li>
                                                            <li><a href="#">Art Photographs from the Artist</a>
                                                                <p>Iaculis porta ridiculus rutrum fusce</p>
                                                            </li>
                                                            <li><a href="#">Art Posters</a>
                                                                <p>Sed parturient habitant a gravida</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Design</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Home Decor Decals</a>
                                                                <p>Curabitur senectus blandit parturient quam</p>
                                                            </li>
                                                            <li><a href="#">Furniture</a>
                                                                <p>Fames sem nec interdum id</p>
                                                            </li>
                                                            <li><a href="#">Wallpapers</a>
                                                                <p>Torquent litora nibh curae morbi</p>
                                                            </li>
                                                            <li><a href="#">Bar Flasks</a>
                                                                <p>Cum etiam duis malesuada viverra</p>
                                                            </li>
                                                            <li><a href="#">Posters & Prints</a>
                                                                <p>Ultricies pellentesque vestibulum sed mattis</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/12-i.png" alt="Image Alternative text" title="Image Title" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-motorcycle dropdown-menu-category-icon"></i>Motors</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Motors</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Parts & Accessories</a>
                                                                <p>Augue penatibus venenatis malesuada nam</p>
                                                            </li>
                                                            <li><a href="#">Cars & Trucks</a>
                                                                <p>Semper facilisis taciti posuere convallis</p>
                                                            </li>
                                                            <li><a href="#">Motorcycles</a>
                                                                <p>Curae auctor non sodales iaculis</p>
                                                            </li>
                                                            <li><a href="#">Passenger Vehicles</a>
                                                                <p>Blandit taciti pellentesque faucibus id</p>
                                                            </li>
                                                            <li><a href="#">Industry Vehicles</a>
                                                                <p>Nam scelerisque sapien ultricies euismod</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Brands</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">BMW</a>
                                                            </li>
                                                            <li><a href="#">Land Rover</a>
                                                            </li>
                                                            <li><a href="#">Nissan</a>
                                                            </li>
                                                            <li><a href="#">Honda</a>
                                                            </li>
                                                            <li><a href="#">Ford</a>
                                                            </li>
                                                            <li><a href="#">Porsche</a>
                                                            </li>
                                                            <li><a href="#">Audi</a>
                                                            </li>
                                                            <li><a href="#">Mercedes-Benz</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/13-i.png" alt="Image Alternative text" title="Image Title" style="right: -15px; bottom: -15px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-paw dropdown-menu-category-icon"></i>Pets</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <h5 class="dropdown-menu-category-title">Pet Supplies</h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Backyard Poultry Supplies</a>
                                                                <p>Maecenas accumsan parturient integer lacus</p>
                                                            </li>
                                                            <li><a href="#">Bird Supplies</a>
                                                                <p>Justo torquent cras sociis a</p>
                                                            </li>
                                                            <li><a href="#">Cat Supplies</a>
                                                                <p>Massa molestie inceptos congue venenatis</p>
                                                            </li>
                                                            <li><a href="#">Dog Supplies</a>
                                                                <p>Platea hac neque egestas dignissim</p>
                                                            </li>
                                                            <li><a href="#">Pet Memorials & Urns</a>
                                                                <p>Lacinia quisque ridiculus cras semper</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Fish & Aquariums</a>
                                                                <p>Magnis nascetur consequat enim conubia</p>
                                                            </li>
                                                            <li><a href="#">Horse Supplies</a>
                                                                <p>Auctor eleifend vel magnis est</p>
                                                            </li>
                                                            <li><a href="#">Reptile Supplies</a>
                                                                <p>Auctor nunc vel nulla primis</p>
                                                            </li>
                                                            <li><a href="#">Small Animal Supplies</a>
                                                                <p>Mauris fringilla blandit sapien fermentum</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Wholesale Lots</a>
                                                                <p>Volutpat curabitur himenaeos eros quis</p>
                                                            </li>
                                                            <li><a href="#">Other Pet Supplies</a>
                                                                <p>Risus amet arcu viverra laoreet</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/14-i.png" alt="Image Alternative text" title="Image Title" style="right: -15px;" />
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-cubes dropdown-menu-category-icon"></i>Hobbies & DIY</a>
                                    <div class="dropdown-menu-category-section">
                                        <div class="dropdown-menu-category-section-inner">
                                            <div class="dropdown-menu-category-section-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="dropdown-menu-category-title">Hobby & DIY</h5>
                                                        <ul class="dropdown-menu-category-list">
                                                            <li><a href="#">Model & Kit Tools</a>
                                                                <p>Viverra diam dictum curabitur laoreet</p>
                                                            </li>
                                                            <li><a href="#">Supplies & Engines</a>
                                                                <p>Facilisi conubia purus taciti malesuada</p>
                                                            </li>
                                                            <li><a href="#">RC Airline & Helicopter</a>
                                                                <p>Eget cum malesuada nunc libero</p>
                                                            </li>
                                                            <li><a href="#">RC Car, Truck & motorcycle</a>
                                                                <p>Vestibulum aptent aliquam eros facilisi</p>
                                                            </li>
                                                            <li><a href="#">Military Airline Models & Kits</a>
                                                                <p>Purus mus odio praesent facilisi</p>
                                                            </li>
                                                            <li><a href="#">Craft Airbrushing Supplies</a>
                                                                <p>Molestie amet fringilla ultricies sem</p>
                                                            </li>
                                                            <li><a href="#">Card Making Supplies</a>
                                                                <p>Leo pulvinar gravida pulvinar felis</p>
                                                            </li>
                                                            <li><a href="#">Craft Sewing</a>
                                                                <p>Adipiscing risus curae nulla rutrum</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="dropdown-menu-category-section-theme-img" src="img/test_cat/15-i.png" alt="Image Alternative text" title="Image Title" style="height: 100%;" />
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown yamm-fw"><a href="#">Trang<i class="drop-caret" data-toggle="dropdown"></i></a>
                            <ul class="dropdown-menu">
                                <li class="yamm-content">
                                    <div class="row row-eq-height row-col-border">
                                        <div class="col-md-2">
                                            <h5>Homepages</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="index.html">Layout 1</a>
                                                    <p class="dropdown-menu-items-list-desc">Default Layout</p>
                                                </li>
                                                <li><a href="index-layout-2.html">Layout 2</a>
                                                    <p class="dropdown-menu-items-list-desc">Banners Area + Product Carousel</p>
                                                </li>
                                                <li><a href="index-layout-3.html">Layout 3</a>
                                                    <p class="dropdown-menu-items-list-desc">Aside Departmens</p>
                                                </li>
                                                <li><a href="index-layout-4.html">Layout 4</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Right</p>
                                                </li>
                                                <li><a href="index-layout-5.html">Layout 5</a>
                                                    <p class="dropdown-menu-items-list-desc">Small Aside Departmens + Sidebar</p>
                                                </li>
                                                <li><a href="index-layout-6.html">Layout 6</a>
                                                    <p class="dropdown-menu-items-list-desc">Full Banners + Product Tabs</p>
                                                </li>
                                                <li><a href="index-layout-7.html">Layout 7</a>
                                                    <p class="dropdown-menu-items-list-desc">Small Aside Departmens + Slider</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Category Pages</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="category.html">Layout 1</a>
                                                    <p class="dropdown-menu-items-list-desc">Default Layout</p>
                                                </li>
                                                <li><a href="category-layout-2.html">Layout 2</a>
                                                    <p class="dropdown-menu-items-list-desc">Banner Title</p>
                                                </li>
                                                <li><a href="category-layout-3.html">Layout 3</a>
                                                    <p class="dropdown-menu-items-list-desc">4 Columns Thumbs</p>
                                                </li>
                                                <li><a href="category-layout-4.html">Layout 4</a>
                                                    <p class="dropdown-menu-items-list-desc">6 Columns Small Thumbs</p>
                                                </li>
                                                <li><a href="category-layout-5.html">Layout 5</a>
                                                    <p class="dropdown-menu-items-list-desc">3 Columns Horizontal Thumbs</p>
                                                </li>
                                                <li><a href="category-layout-6.html">Layout 6</a>
                                                    <p class="dropdown-menu-items-list-desc">4 Columns Horizontal Thumbs</p>
                                                </li>
                                                <li><a href="category-layout-7.html">Layout 7</a>
                                                    <p class="dropdown-menu-items-list-desc">No Filters</p>
                                                </li>
                                                <li><a href="category-layout-8.html">Layout 8</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Right</p>
                                                </li>
                                                <li><a href="category-layout-9.html">Layout 9</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Inverse</p>
                                                </li>
                                                <li><a href="category-layout-10.html">Layout 10</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Color</p>
                                                </li>
                                                <li><a href="category-layout-11.html">Layout 11</a>
                                                    <p class="dropdown-menu-items-list-desc">Horizontal Thumbs</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Product Pages</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="product-page.html">Layout 1</a>
                                                    <p class="dropdown-menu-items-list-desc">Default Layout</p>
                                                </li>
                                                <li><a href="product-layout-2.html">Layout 2</a>
                                                    <p class="dropdown-menu-items-list-desc">No Sidebar</p>
                                                </li>
                                                <li><a href="product-layout-3.html">Layout 3</a>
                                                    <p class="dropdown-menu-items-list-desc">Full Area Layout + Banners</p>
                                                </li>
                                                <li><a href="product-layout-4.html">Layout 4</a>
                                                    <p class="dropdown-menu-items-list-desc">Gallery Style</p>
                                                </li>
                                                <li><a href="product-layout-5.html">Layout 5</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Right</p>
                                                </li>
                                                <li><a href="product-layout-6.html">Layout 6</a>
                                                    <p class="dropdown-menu-items-list-desc">Sidebar Left</p>
                                                </li>
                                                <li><a href="product-layout-7.html">Layout 7</a>
                                                    <p class="dropdown-menu-items-list-desc">Product Gallery Left</p>
                                                </li>
                                                <li><a href="product-layout-8.html">Layout 8</a>
                                                    <p class="dropdown-menu-items-list-desc">Product Gallery Right</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Header Layouts</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="index.html">Layout 1</a>
                                                    <p class="dropdown-menu-items-list-desc">Default Layout</p>
                                                </li>
                                                <li><a href="index-nav-layout-2.html">Layout 2</a>
                                                    <p class="dropdown-menu-items-list-desc">Center Logo + Category Nav</p>
                                                </li>
                                                <li><a href="index-nav-layout-3.html">Layout 3</a>
                                                    <p class="dropdown-menu-items-list-desc">Special Area + Extended Search</p>
                                                </li>
                                                <li><a href="index-nav-layout-4.html">Layout 4</a>
                                                    <p class="dropdown-menu-items-list-desc">White Area + Extended Search</p>
                                                </li>
                                            </ul>
                                            <hr />
                                            <h5>Footer Layouts</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="index.html">Layout 1</a>
                                                    <p class="dropdown-menu-items-list-desc">Default Layout</p>
                                                </li>
                                                <li><a href="index-footer-layout-2.html">Layout 2</a>
                                                    <p class="dropdown-menu-items-list-desc">Minimal</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Misc</h5>
                                            <ul class="dropdown-menu-items-list">
                                                <li><a href="shopping-cart.html">Shopping Cart</a>
                                                </li>
                                                <li><a href="shopping-cart-empty.html">Cart Empty</a>
                                                </li>
                                                <li><a href="checkout.html">Checkout</a>
                                                </li>
                                                <li><a href="order-summary.html">Summary</a>
                                                </li>
                                                <li><a href="about-us.html">About Us</a>
                                                </li>
                                                <li><a href="contact.html">Contact</a>
                                                </li>
                                                <li><a href="404.html">404</a>
                                                </li>
                                                <li><a href="blog.html">Blog</a>
                                                </li>
                                                <li><a href="blog-post.html">Blog Post</a>
                                                </li>
                                                <li><a href="login-register.html">Login/Register</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left navbar-main-search navbar-main-search-category" role="search">
                        <select class="navbar-main-search-home-select">
                            <option>Tất cả danh mục</option>
                            <option>Appilances</option>
                            <option>Apps & Games</option>
                            <option>Arts, Crafts & Sewing</option>
                            <option>Automotive</option>
                            <option>Baby</option>
                            <option>Books</option>
                            <option>CDs & Vinyl</option>
                            <option>Cell Phones & Accessories</option>
                            <option>Clothing, Shoes & Jewelry</option>
                            <option>&nbsp;&nbsp;&nbsp;Woman</option>
                            <option>&nbsp;&nbsp;&nbsp;Men</option>
                            <option>&nbsp;&nbsp;&nbsp;Girls</option>
                            <option>&nbsp;&nbsp;&nbsp;Baby</option>
                            <option>Collectibles & Fine Art</option>
                            <option>Computers</option>
                            <option>Credit and Payment Cards</option>
                            <option>Digital Music</option>
                            <option>Electronics</option>
                            <option>Gift Cards</option>
                            <option>Grocery & Gourmet</option>
                            <option>Health & Personal Care</option>
                            <option>Home & Kitchen</option>
                            <option>Industrial & Scientific</option>
                            <option>Luggage & Travel</option>
                            <option>Luxury Beauty</option>
                            <option>Magazine Subscribtions</option>
                            <option>Movies & TV</option>
                            <option>Musical Instuments</option>
                            <option>Office Products</option>
                            <option>Patio, Lawn & Garden</option>
                            <option>Pet Supplies</option>
                            <option>Software</option>
                            <option>Sports & Outdoors</option>
                            <option>Tools & Home Improvement</option>
                            <option>Toys & Games</option>
                            <option>Video Games</option>
                            <option>Wine</option>
                        </select>
                        <select class="navbar-location-home-select">
                            <option>Toàn quốc</option>
                            <option>TP Hồ Chí Minh</option>
                            <option>Hà Nội</option>
                            <option>Đà Năng</option>
                            <option>Hải Phòng</option>
                            <option>Bà Rịa - Vũng Tàu</option>
                            <option>Buôn Mê Thuột</option>
                            <option>Bắc Cạn</option>
                            <option>Bắc Giang</option>
                            <option>Bắc ninh</option>
                            <option>Credit and Payment Cards</option>
                            <option>Digital Music</option>
                            <option>Electronics</option>
                            <option>Gift Cards</option>
                            <option>Grocery & Gourmet</option>
                            <option>Health & Personal Care</option>
                            <option>Home & Kitchen</option>
                            <option>Industrial & Scientific</option>
                            <option>Luggage & Travel</option>
                            <option>Luxury Beauty</option>
                            <option>Magazine Subscribtions</option>
                            <option>Movies & TV</option>
                            <option>Musical Instuments</option>
                            <option>Office Products</option>
                            <option>Patio, Lawn & Garden</option>
                            <option>Pet Supplies</option>
                            <option>Software</option>
                            <option>Sports & Outdoors</option>
                            <option>Tools & Home Improvement</option>
                            <option>Toys & Games</option>
                            <option>Video Games</option>
                            <option>Wine</option>
                        </select>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Tìm kiếm" />
                        </div>
                        <a class="fa fa-search navbar-main-search-submit" href="#"></a>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#nav-login-dialog" data-effect="mfp-move-from-top" class="popup-text">Đăng nhập</a>
                        </li>
                        <li><a href="#nav-account-dialog" data-effect="mfp-move-from-top" class="popup-text">Đăng ký</a>
                        </li>
                        <li class="dropdown">
                            <a class="fa fa-history" href="shopping-cart.html"></a>
                            <ul class="dropdown-menu dropdown-menu-shipping-cart">
                                <li>
                                    <a class="dropdown-menu-shipping-cart-img" href="#">
                                        <img src="img/100x100.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                    <div class="dropdown-menu-shipping-cart-inner">
                                        <p class="dropdown-menu-shipping-cart-price">Quận 1</p>
                                        <p class="dropdown-menu-shipping-cart-item"><a href="#">Gucci Patent Leather Open Toe Platform</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-menu-shipping-cart-img" href="#">
                                        <img src="img/100x100.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                    <div class="dropdown-menu-shipping-cart-inner">
                                        <p class="dropdown-menu-shipping-cart-price">Quận 12</p>
                                        <p class="dropdown-menu-shipping-cart-item"><a href="#">Nikon D5200 24.1 MP Digital SLR Camera</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-menu-shipping-cart-img" href="#">
                                        <img src="img/100x100.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                    <div class="dropdown-menu-shipping-cart-inner">
                                        <p class="dropdown-menu-shipping-cart-price">Quận 7</p>
                                        <p class="dropdown-menu-shipping-cart-item"><a href="#">Apple 11.6" MacBook Air Notebook </a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-menu-shipping-cart-img" href="#">
                                        <img src="img/100x100.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                    <div class="dropdown-menu-shipping-cart-inner">
                                        <p class="dropdown-menu-shipping-cart-price">Quận Thủ Đức</p>
                                        <p class="dropdown-menu-shipping-cart-item"><a href="#">Fossil Women's Original Boyfriend</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <header class="page-header">
                <h1 class="page-title">Electronics</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active">Electronics</li>
                </ol>
                <ul class="category-selections clearfix hide">
                    <li>
                        <a class="fa fa-th-large category-selections-icon active" href="#"></a>
                    </li>
                    <li>
                        <a class="fa fa-th-list category-selections-icon" href="#"></a>
                    </li>
                    <li><span class="category-selections-sign">Sort by :</span>
                        <select class="category-selections-select">
                            <option selected>Newest First</option>
                            <option>Best Sellers</option>
                            <option>Trending Now</option>
                            <option>Best Raited</option>
                            <option>Price : Lowest First</option>
                            <option>Price : Highest First</option>
                            <option>Title : A - Z</option>
                            <option>Title : Z - A</option>
                        </select>
                    </li>
                    <li><span class="category-selections-sign">Items :</span>
                        <select class="category-selections-select">
                            <option>9 / page</option>
                            <option selected>12 / page</option>
                            <option>18 / page</option>
                            <option>All</option>
                        </select>
                    </li>
                </ul>
            </header>
            <div class="row">
                <div class="col-md-3">
                    <aside class="category-filters">
                        <div class="category-filters-section">
                            <h4 class="">Lọc theo khu vực</h4>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Chọn/Bỏ chọn hết<span class="category-filters-amount"></span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 1<span class="category-filters-amount">(59)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 2<span class="category-filters-amount">(29)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 3<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 4<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 5<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 6<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 7<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 8<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 9<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 10<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 11<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Quận 12<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Tân Bình<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Bình Thạnh<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Phú Nhuận<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Thủ Đức<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Gò Vấp<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Bình Tân<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Tân Phú<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Nhà Bè<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Cần Giờ<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Hóc Môn<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Củ Chi<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Bình Chánh<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check" type="checkbox" />Khu Vực Khác<span class="category-filters-amount">(20)</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Xác nhận</button>
                            
                        </div>
                        <div class="category-filters-section">
                            <h4 class="">Lọc theo giá</h4>
                            <form role="form" class="ng-pristine ng-valid">
                                <div class="form-group">
                                  <label>Giá Từ</label>
                                  <input type="number" class="form-control" placeholder="100.00">
                                </div>
                                <div class="form-group">
                                  <label>Đến</label>
                                  <input type="number" class="form-control" placeholder="500.000">
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-primary">Xác nhận</button>
                            </form>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="row" data-gutter="15">
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Apple iPhone 5c - 16GB - GSM Factory Unlocked White Blue Green Pink Yellow</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$67</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Samsung Chromebook 11.6" LED HD 16GB 1.7GHz Webcam Notebook Laptop -XE303C12-A01</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$137</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>-30%</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">New Asus X551MAV 15.6" HD N2830 2.16GHz 4GB 500GB Windows 8 Laptop Notebook</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-old">$53</span><span class="product-caption-price-new">$38</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>hot</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/490x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Motorola XT1096 Moto X 2nd Generation 16GB Verizon Wireless gsm unlocked</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$113</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>4 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-gutter="15">
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Samsung Galaxy Note 4 IV 4G FACTORY UNLOCKED Black or White</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$91</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>3 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Lenovo ThinkPad 11e 11.6" Notebook, AMD A4-6210 1.8GHz, 4GB RAM, 500GBHDD, W7Pro</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$78</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>-50%</li>
                                    <li>stuff pick</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Apple iPhone 4S 16GB Factory Unlocked Black and White Smartphone</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-old">$77</span><span class="product-caption-price-new">$39</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>5 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>hot</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Nikon COOLPIX L840 Digital Camera, Red - Refurbished by Nikon U.S.A. #26486 B</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$70</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>3 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-gutter="15">
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>stuff pick</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/461x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">GoPro HERO4 Black 4K Action Camera Hero 4 Surf Camcorder . CHDHX-401. NEW</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$104</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>hot</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Nikon D5200 24.1 MP Digital SLR Camera - Black (Kit w/ 18-55 VR Lens)</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$147</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Samsung Galaxy S6 Edge+ Factory Unlocked GSM 32GB</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$116</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>-30%</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Apple iPhone 5s 16GB Factory Unlocked Smartphone Space Gray / Silver / Gold</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-old">$58</span><span class="product-caption-price-new">$41</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-gutter="15">
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">LG G3 VS985 - 32GB - Verizon Smartphone - Metallic Black or Silk White - Great</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$107</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>5 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>-50%</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">HTC One M8 32GB Factory Unlocked Smartphone  Gold / Silver Gray</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-old">$79</span><span class="product-caption-price-new">$40</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>1 left</li>
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels"></ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">Apple 11.6" MacBook Air Notebook Computer MJVM2LL/A (Early 2015)</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-new">$64</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product ">
                                <ul class="product-labels">
                                    <li>-70%</li>
                                </ul>
                                <div class="product-img-wrap">
                                    <img class="product-img-primary" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                    <img class="product-img-alt" src="img/500x500.png" alt="Image Alternative text" title="Image Title" />
                                </div>
                                <a class="product-link" href="#"></a>
                                <div class="product-caption">
                                    <ul class="product-caption-rating">
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <h5 class="product-caption-title">LG G Flex D959 - 32GB - Titan Silver GSM Unlocked Android Smartphone (B)</h5>
                                    <div class="product-caption-price"><span class="product-caption-price-old">$99</span><span class="product-caption-price-new">$30</span>
                                    </div>
                                    <ul class="product-caption-feature-list">
                                        <li>Free Shipping</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="category-pagination-sign">58 items found in Cell Phones. Showing 1 - 12</p>
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination category-pagination pull-right">
                                    <li class="active"><a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a>
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li><a href="#">4</a>
                                    </li>
                                    <li><a href="#">5</a>
                                    </li>
                                    <li class="last"><a href="#"><i class="fa fa-long-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>

        <footer class="main-footer">
            <div class="container">
                <div class="row row-col-gap" data-gutter="60">
                    <div class="col-md-3">
                        <h4 class="widget-title-sm">Tôi Mua Bán</h4>
                        <p>Kênh mua bán trực tuyến , miễn phí</p>
                        <ul class="main-footer-social-list">
                            <li>
                                <a class="fa fa-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-pinterest" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="widget-title-sm">Danh mục sản phẩm</h4>
                        <ul class="main-footer-tag-list">
                            <li><a href="#">Điện thoại</a>
                            </li>
                            <li><a href="#">Máy tính bảng</a>
                            </li>
                            <li><a href="#">Máy tính, Laptop</a>
                            </li>
                            <li><a href="#">Máy ảnh, máy quay</a>
                            </li>
                            <li><a href="#">Tivi,Loa,Amly</a>
                            </li>
                            <li><a href="#">blue</a>
                            </li>
                            <li><a href="#">shoes</a>
                            </li>
                            <li><a href="#">running</a>
                            </li>
                            <li><a href="#">jeans</a>
                            </li>
                            <li><a href="#">sports</a>
                            </li>
                            <li><a href="#">laptops</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="widget-title-sm">Khu Vực</h4>
                        <form>
                            <div class="form-group">
                                <label>Nhập khu vực bạn cần mua hàng</label>
                                <input class="newsletter-input form-control" placeholder="Your e-mail address" type="text" />
                            </div>
                            <input class="btn btn-primary" type="submit" value="Xác Nhận" />
                        </form>
                    </div>
                </div>
                <ul class="main-footer-links-list">
                    <li><a href="#">About Us</a>
                    </li>
                    <li><a href="#">Jobs</a>
                    </li>
                    <li><a href="#">Legal</a>
                    </li>
                    <li><a href="#">Support & Customer Service</a>
                    </li>
                    <li><a href="#">Blog</a>
                    </li>
                    <li><a href="#">Privacy</a>
                    </li>
                    <li><a href="#">Terms</a>
                    </li>
                    <li><a href="#">Press</a>
                    </li>
                    <li><a href="#">Shipping</a>
                    </li>
                    <li><a href="#">Payments & Refunds</a>
                    </li>
                </ul>
                <img class="main-footer-img" src="img/test_footer2-i.png" alt="Image Alternative text" title="Image Title" />
            </div>
        </footer>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright &copy; <a href="#">TheBox</a> 2014. Designed my remtsoy. All rights reseved</p>
                    </div>
                    <div class="col-md-6 hide">
                        <ul class="payment-icons-list">
                            <li>
                                <img src="img/payment/visa-straight-32px.png" alt="Image Alternative text" title="Pay with Visa" />
                            </li>
                            <li>
                                <img src="img/payment/mastercard-straight-32px.png" alt="Image Alternative text" title="Pay with Mastercard" />
                            </li>
                            <li>
                                <img src="img/payment/paypal-straight-32px.png" alt="Image Alternative text" title="Pay with Paypal" />
                            </li>
                            <li>
                                <img src="img/payment/visa-electron-straight-32px.png" alt="Image Alternative text" title="Pay with Visa-electron" />
                            </li>
                            <li>
                                <img src="img/payment/maestro-straight-32px.png" alt="Image Alternative text" title="Pay with Maestro" />
                            </li>
                            <li>
                                <img src="img/payment/discover-straight-32px.png" alt="Image Alternative text" title="Pay with Discover" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{$config['base_url']}/app/lib/thebox/js/jquery.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/bootstrap.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/icheck.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/ionrangeslider.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/jqzoom.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/card-payment.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/owl-carousel.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/magnific.js"></script>
    <script src="{$config['base_url']}/app/lib/thebox/js/custom.js"></script>
</body>

</html>
