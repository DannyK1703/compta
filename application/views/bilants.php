<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('Assets/css/mdb.min.css')?>" />
    <title>Hello, document Code!</title>
  </head>
  <body>
  	<div class="container-fluid" >
      <div class="row">
        <div class="col-lg-6"  align="center">
            <h1>Bilant Actif</h1>
            <table class="table table-hover " style="border-right:solid 3px ;">
                <thead class="thead-dark">
                    <tr>
                    <th>Actif</th>
                    <th>Exercice 31/12/N</th>
                    <th>Exercice 31/12/N-1</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bilant_A as $b){?>
                        <tr>
                        <td> <?= $b->intitule ?>      </td>
                        <td> <?= $b->Exercice_31_12_n ?>      </td>
                        <td> <?= $b->Exercice_31_12_n_1 ?>      </td>
                        </tr>
                    <?php  }?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6"  align="center">
            <h1>Bilant Passif</h1>
            <table class="table table-hover " style="border-right:solid 3px ;">
                <thead class="thead-dark">
                    <tr>
                    <th>Passif</th>
                    <th>Exercice31/12/N</th>
                    <th>Exercice31/12/N1</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bilant_B as $a){?>
                        <tr>
                        <td> <?= $a->intitule ?>      </td>
                        <td> <?= $a->Exercice_31_12_n ?>      </td>
                        <td> <?= $a->Exercice_31_12_n_1 ?>      </td>
                        </tr>
                    <?php  }?>
                </tbody>
            </table>
        </div>
      </div></div><div align="center">
      <a href="<?php echo site_url("siswa/index"); ?>" class="btn btn-warning">retour a l'accueil</a></div>

      

      



    <script type="text/javascript" src="<?= base_url('Assets/js/mdb.min.js')?>"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>