<!DOCTYPE HTML>
<html>
<head>
   {include file="client/include/style.tpl"} 
</head>

<body>
    <div class="global-wrapper clearfix" id="global-wrapper">
        
        {include file="client/include/header.tpl"}

        <div class="gap gap-small"></div>
        <div class="container">

            {include file="client/content-category.tpl"}

        </div>
        <div class="gap"></div>

        {include file="client/include/footer.tpl"}
        
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
