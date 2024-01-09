<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vega Checkout</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;" class="text-success">
                        Obrigado!
                        <br><br>
                        <small>Seu pedido será processado após a confirmação do pagamento.</small>
                    </h2>
                    <hr/>

                    <?php if (request()->get('type') == "pix") { ?>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <b>Faça o pix</b>
                                </h4>
                            </div>
                            <div>
                                <div class="panel-body text-center">
                                   <img src="https://s.glbimg.com/jo/g1/f/original/2011/05/17/qrcode.jpg" width="200">
                                    <br><br>
                                    Chave copia e cola:
                                    <input class="form-control" type="text" value="00020126580014br.gov.bcb.pix0136123e4567-e12b-12d1-a456-426655440000 5204000053039865802BR5913Fulano de Tal6008BRASILIA62070503***63041D3D">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }

                    if (request()->get('type') == "boleto") { ?>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <b>Faça o pagamento do boleto</b>
                                </h4>
                            </div>
                            <div>
                                <div class="panel-body text-center">
                                    <a href="#" target="_blank">
                                        baixar boleto<br>
                                        <img src="https://nuvei.com/wp-content/uploads/2021/02/boleto-2.png" width="150">
                                    </a>
                                    <br><br>
                                    Código de barras:
                                    <input class="form-control" type="text" value="00020126580014br.gov.bcb.pix0136123e4567-e12b-12d1-a456-426655440000 5204000053039865802BR5913Fulano de Tal6008BRASILIA62070503***63041D3D">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="panel-group text-center">
                        <a href="./pedidos" class="btn btn-info">Meus pedidos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>
</html>
