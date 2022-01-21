<!doctype html>
<html lang="en">
  <head>
    <title>Uber Discount</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <div class="card text-center">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
          <div class="card-body bg-secondary">
            <h4 class="card-title">Descuento de Uber</h4>
          </div>
        </div>
        <form action="index.php" method="GET">
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label for="fareUberX">Tarifa de UberX:</label>
                        <input type="text" name="fareUberX" class="form-control form-control-sm" placeholder="0.30" required>
                        <label for="fareUberXL">Tarifa de UberXL:</label>
                        <input type="text" name="fareUberXL" class="form-control form-control-sm" placeholder="0.50" required>
                        <label for="fareUberPlus">Tarifa de UberPlus:</label>
                        <input type="text" name="fareUberPlus" class="form-control form-control-sm" placeholder="0.70" required>
                        <label for="fareUberBlack">Tarifa de UberBlack:</label>
                        <input type="text" name="fareUberBlack" class="form-control form-control-sm" placeholder="1" required>
                        <label for="fareUberSUV">Tarifa de UberSUV:</label>
                        <input type="text" name="fareUberSUV" class="form-control form-control-sm" placeholder="1.30" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label for="i">Millas:</label>
                        <input type="text" name="i" class="form-control form-control-sm" placeholder="30" required>
                        <label for="discount">Descuento:</label>
                        <input type="text" name="discount" class="form-control form-control-sm" value="20" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <hr>
                        <div class="d-grid gap-2">
                            <input type="submit" name="calculate" class="btn btn-outline-success btn-inblock" value="Calcular">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        

      <?php

    if(isset($_GET['calculate'])){
        $i = $_GET['i'];
        $discount = $_GET['discount'];
        $fareUberX = $_GET['fareUberX'];
        $fareUberXL = $_GET['fareUberXL'];
        $fareUberPlus = $_GET['fareUberPlus'];
        $fareUberBlack = $_GET['fareUberBlack'];
        $fareUberSUV = $_GET['fareUberSUV'];
        $fares = [$fareUberX, $fareUberXL, $fareUberPlus, $fareUberBlack, $fareUberSUV];
        $car = "";

        function fancyRide(int $i, array $fares){
            for($it=sizeof($fares)-1; $it>=0; $it--)
            {
                $cost = $i*$fares[$it];
                
                if($cost<=20){
                    switch($fares[$it])
                    {
                        case $_GET['fareUberX']:
                            $car = "UberX";
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<br> Costo del Servicio: <strong>$".$cost."</strong>";
                            echo "<br> Servicio de Uber: <strong>".$car."</strong>";
                            echo "<br><strong> ¡Puede aplicar su descuento! <br></strong>";
                            echo '</div>';
                            break;

                        case $_GET['fareUberXL']:
                            $car = "UberXL";
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<br> Costo del Servicio: <strong>$".$cost."</strong>";
                            echo "<br> Servicio de Uber: <strong>".$car."</strong>";
                            echo "<br><strong> ¡Puede aplicar su descuento! <br></strong>";
                            echo '</div>';
                            break;

                        case $_GET['fareUberPlus']:
                            $car = "UberPlus";
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<br> Costo del Servicio: <strong>$".$cost."</strong>";
                            echo "<br> Servicio de Uber: <strong>".$car."</strong>";
                            echo "<br><strong> ¡Puede aplicar su descuento! <br></strong>";
                            echo '</div>';
                            break;

                        case $_GET['fareUberBlack']:
                            $car = "UberBlack";
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<br> Costo del Servicio: <strong>$".$cost."</strong>";
                            echo "<br> Servicio de Uber: <strong>".$car."</strong>";
                            echo "<br><strong> ¡Puede aplicar su descuento! <br></strong>";
                            echo '</div>';
                            break;

                        case $_GET['fareUberSUV']:
                            $car = "UberSUV";
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<br> Costo del Servicio: <strong>$".$cost."</strong>";
                            echo "<br> Servicio de Uber: <strong>".$car."</strong>";
                            echo "<br><strong> ¡Puede aplicar su descuento! <br></strong>";
                            echo '</div>';
                            break;

                        default:
                            echo '<div class="alert alert-danger" role="alert">';
                            echo "Tárifa inválida";
                            echo '</div>';
                            break;
                    }
                    break;
                }
            }
            if($cost>20){
                echo '<div class="alert alert-danger" role="alert">';
                echo "No puede usar su descuento, el costo sobrepasa el presupuesto.";
                echo '</div>';
            }
        }

        if(($i>=4 && $i<=30) && (($fareUberX >= 0.3 && $fareUberX <= 5.0) && ($fareUberXL >= 0.3 && $fareUberXL <= 5.0) && ($fareUberPlus >= 0.3 && $fareUberPlus <= 5.0) && ($fareUberBlack >= 0.3 && $fareUberBlack <= 5.0) && ($fareUberSUV >= 0.3 && $fareUberSUV <= 5.0))){
            fancyRide($i, $fares);
        }
        else{
            echo '<div class="alert alert-warning" role="alert">';
            echo "<Strong> Cantidad de millas no válidas </Strong>";
            echo '</div>';
        }
    }

      ?>


    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>