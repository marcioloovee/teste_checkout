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
                        <h2 style="text-align: center;">
                            Finalize seu pedido
                        </h2>
                        <hr/>
                        <div class="shopping_cart">
                            <form class="form-horizontal" role="form" action="" method="post" id="payment-form">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <b>Dados do carrinho</b>
                                            </h4>
                                        </div>
                                        <div>
                                            <div class="panel-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td style="width: 175px;"   >
                                                            Serviço 1
                                                        </td>
                                                        <td class="text-right">
                                                            R$ 100,00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;"   >
                                                            Serviço 2
                                                        </td>
                                                        <td class="text-right">
                                                            R$ 50,00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 175px;"   >
                                                            <b>Total</b>
                                                        </td>
                                                        <td class="text-right">
                                                            <b>R$ 150,00</b>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <b>Cliente</b>
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <td style="width: 175px;">
                                                    Nome</td>
                                                <td>
                                                    <input class="form-control" id="name" name="name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    CPF/CNPJ</td>
                                                <td>
                                                    <input class="form-control" id="cpfcnpj" name="cpfcnpj"
                                                           required="required" type="number"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    Telefone</td>
                                                <td>
                                                    <input class="form-control" id="telefone"
                                                           name="address_line_1" required="required" type="text"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <b>Informações para pagamento</b>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse">
                                        <div class="panel-body">
                                            <span class='payment-errors'></span>
                                            <div>
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td style="width: 175px;"   >
                                                                Forma de pagamento
                                                            </td>
                                                            <td>
                                                                <select id="type" name="type" class="form-control">
                                                                    <option value="">Escolhe...</option>
                                                                    <option value="boleto">Boleto</option>
                                                                    <option value="pix">Pix</option>
                                                                    <option value="cartao">Cartão de crédito/débito</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="payment_with_card">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="card-holder-name">Nome</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" stripe-data="name"
                                                               id="name-on-card" placeholder="Nome">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="card-number">Número</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" stripe-data="number"
                                                               id="card-number" placeholder="Debit/Credit Card Number">
                                                        <br/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="expiry-month">Data de expiração</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-xs-3">
                                                                    <select class="form-control col-sm-2"
                                                                            data-stripe="exp-month" id="card-exp-month"
                                                                            style="margin-left:5px;">
                                                                        <option>Mês</option>
                                                                        <option value="01">Jan (01)</option>
                                                                        <option value="02">Fev (02)</option>
                                                                        <option value="03">Mar (03)</option>
                                                                        <option value="04">Abr (04)</option>
                                                                        <option value="05">Mai (05)</option>
                                                                        <option value="06">Jun (06)</option>
                                                                        <option value="07">Jul (07)</option>
                                                                        <option value="08">Ago (08)</option>
                                                                        <option value="09">Set (09)</option>
                                                                        <option value="10">Out (10)</option>
                                                                        <option value="11">Nov (11)</option>
                                                                        <option value="12">Dez (12)</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-3">
                                                                    <select class="form-control" data-stripe="exp-year"
                                                                            id="card-exp-year">
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                        <option value="2026">2026</option>
                                                                        <option value="2027">2027</option>
                                                                        <option value="2028">2028</option>
                                                                        <option value="2029">2029</option>
                                                                        <option value="2030">2030</option>
                                                                        <option value="2031">2031</option>
                                                                        <option value="2032">2032</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="cvv">CVC</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" stripe-data="cvc"
                                                                   id="card-cvc" placeholder="Código de segurança">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                        </div>
                                                    </div></div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pagar agora</button>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script>
        $("#payment_with_card").hide();

        $('#type').on('change', function() {
            if (this.value == 'cartao') {
                $("#payment_with_card").show();
            } else {
                $("#payment_with_card").hide();
            }
        });
    </script>


</body>
</html>
