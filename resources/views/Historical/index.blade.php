@extends('Layouts.app')

@section('content')
    <div align="center">
        <div class="row" >
            <div class="col-lg-12">
                <div class="card" ><br>
                    <img class="card-img-center" style="width:4rem;align-self: center;"  src="https://cdn0.iconfinder.com/data/icons/blockchain-classic/258/Bitcoin-256.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Bitcoin</h4>
                        <p class="card-text price"></p>
                        <p class="card-text percent"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        var tokenCsrf = $( "input[name='_token']" ).val();
        var host = "https://api.coingecko.com";
        var basePath = "/api/v3/";
        var api = "coins/";
        var coin = "bitcoin";
        var querys = "?tickers=false&localization=false&community_data=false&developer_data=false&sparkline=false"

        var img_arrow_up = "https://cdn2.iconfinder.com/data/icons/woothemes/PNG/arrow_up.png";
        var img_arrow_down = "https://cdn2.iconfinder.com/data/icons/vivid/48/arrow-bottom-512.png";

        queryBtc();
        var ProcessQueryBtc = window.setInterval(function(){
            //queryBtc();
        }, 10000);

        function queryBtc() {
            $.ajax({ 
                url: host+basePath+api+coin+querys,
                type: 'GET',
                headers: {'X-CSRF-TOKEN': tokenCsrf},
                datatype: 'json',
                data:{},
                success:function( respuesta ){
                    var change_24h = respuesta.market_data.price_change_24h;
                    var price_now = respuesta.market_data.current_price.usd;
                    var percent_now =( ( change_24h * 100 ) / price_now);
                    var icon_arrow = img_arrow_up;

                    if (change_24h < 0) {
                        icon_arrow = img_arrow_down;
                    }
                    
                    $( ".price").empty();$( ".percent").empty();
                    $( ".price").html('<b>Precio Actual</b>: '+ price_now  + "$");
                    $( ".percent").html('<b>% de variación</b>: <img style="width:1.5rem;align-self: center;"  src="'+icon_arrow+'"> '+ Math.round(percent_now * 100) / 100   + "%");

                    saveHistorical( host+basePath+api+coin+querys , price_now, 'bitcoin');

                }
            });  
        }

        function saveHistorical(api, usd, coin) {
            var api = api;
            var usd_price = usd;
            var coin = coin;
            $.ajax({ 
                url: "{{route('historical.save')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': tokenCsrf},
                datatype: 'json',
                data:{
                    api :api,
                    usd_price:usd_price,
                    coin : coin
                },
                success:function( respuesta ){
                }
            }); 
        }

    });
</script> 