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
  	<div class="container-fluid bg-dark text-white" >
    <a href="<?php echo site_url("siswa/form"); ?>" class="btn btn-danger">Balances</a>

<a href="<?php echo site_url("siswa/resultat"); ?>" class="btn btn-warning">Compte Resultat</a>
<a href="<?php echo site_url("siswa/voirBilants"); ?>" class="btn btn-dark">Voir Bilants</a>
  	
    <div class="col-lg-8"  align="center">
  		<h1>Balance N</h1>
  		<table class="table table-hover " style="border-right:solid 3px ;">
      <thead class="thead-dark text-white">
    <tr>
      
      <th scope="col">Compte</th>
      <th scope="col">Intitulé</th>
      <th scope="col">S.I Debit</th>
      <th scope="col">S.I Credit</th>
      <th scope="col">Mouv Debit</th>
      <th scope="col">Mouv Credit</th>
      <th scope="col">S.F Debit</th>
      <th scope="col">S.F Credit</th>
    </tr>
  </thead>
  <tbody>
  	<?php
	if( ! empty($siswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)idBilant'=>1,
    
		foreach($siswa as $data){ ?>
				 <tr  class="text-white">
				<th scope="row "><?php echo $data->compte?></th>
				<td><?php echo $data->intitule?></td>
				<td><?php echo $data->sold_I_deb?></td>
				<td><?php echo $data->sold_I_cred?></td>
        <td><?php echo $data->mvm_deb?></td>
        <td><?php echo $data->mvm_cred?></td>
        <td><?php echo $data->sold_F_deb?></td>
        <td><?php echo $data->sold_F_cred?></td>
				</tr> 

			<?php }?>
	<?php }else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Aucune donnée chargée</td></tr>";
	}
	?>
   
   
  </tbody>
</table></div>
<div class="row">
<div class="col-lg-4"></div>

<div class="col-lg-8" align="center">
  		<h1>Balance N-1</h1>
  		<table class="table" style="border-left:solid 3px ;">
      <thead class="thead-dark text-white">
    <tr>
      
      <th scope="col">Compte</th>
      <th scope="col">Intitulé</th>
      <th scope="col">S.I Debit</th>
      <th scope="col">S.I Credit</th>
      <th scope="col">Mouv Debit</th>
      <th scope="col">Mouv Credit</th>
      <th scope="col">S.F Debit</th>
      <th scope="col">S.F Credit</th>
    </tr>
  </thead>
  <tbody>
  	<?php
	if( ! empty($siswa_n1)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)idBilant'=>1,
    
		foreach($siswa_n1 as $data){ ?>
				 <tr class="text-white">
				<th scope="row"><?php echo $data->compte?></th>
				<td><?php echo $data->intitule?></td>
				<td><?php echo $data->sold_I_deb?></td>
				<td><?php echo $data->sold_I_cred?></td>
        <td><?php echo $data->mvm_deb?></td>
        <td><?php echo $data->mvm_cred?></td>
        <td><?php echo $data->sold_F_deb?></td>
        <td><?php echo $data->sold_F_cred?></td>
				</tr> 

			<?php }?>
	<?php }else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Aucune donnée chargée</td></tr>";
	}
	?>
   
   
  </tbody>
</table>
</div></div><div align="center">
</div></div>
    
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