<!DOCTYPE html>
<?php
  if(!isset($_POST["Numerodaindovinare"])){
    $messaggio="Regole per giocare";
    $messaggio2="Devi riuscire ad indovinare un numero da 1 a 100";
    $messBot="Let's Start";
    $_POST["Numerodaindovinare"]=rand(1,100);
    $_POST["Count"]=1;
    $input="hidden";  
  }else{
    $input="text";
    if($_POST["Count"] <= 7){
      if($_POST["Tentativo"]>$_POST["Numerodaindovinare"]){
        $messaggio="Tentativo Numero".$_POST["Count"];
        if($_POST["Count"]>1){
          $messaggio2="Numero troppo Grande";
        }else{
          $messaggio2=" ";
        }     
        $messBot="Conferma";
        $_POST["Count"]++;
      }else if($_POST["Tentativo"]<$_POST["Numerodaindovinare"]){
        $messaggio="Tentativo Numero".$_POST["Count"];
        if($_POST["Count"]>1){
          $messaggio2="Numero troppo Piccolo";
        }else{
          $messaggio2=" ";
        }
        $messBot="Conferma";
        $_POST["Count"]++;
      }else{
        $input="hidden";
        $_POST["Count"]--;
        $messaggio="Complimenti hai azzeccato il numero ";
        $messaggio2=" ";
        $messBot="Gioca di nuovo";
        unset($_POST["Numerodaindovinare"]);
        $_POST["Count"]=1;
      }
    }else{
      $input="hidden";
      $messaggio="Hai perso :-(( ";
      $messaggio2=" ";
      $messBot="Gioca di nuovo";
      unset($_POST["Numerodaindovinare"]);
      $_POST["Count"]=1;
    }
  }
?>
<html>
  <boby>
    <title>Gioco dell'indovina Numero</title>
    <h2>
      Gioco dell'indovina Numero
    </h2>
    <p>
      <?php echo $messaggio ?>
    </p>
    <p>
      <?php echo $messaggio2 ?>
    </p>
    <form
      action="" method="POST"
    >
      <p>
        <input type="<?php echo $input ?>"name="Tentativo">
      </p>
      <input type="hidden" name="Numerodaindovinare" value="<?php echo $_POST["Numerodaindovinare"]?>">
      <input type="hidden" name="Count" value="<?php echo $_POST["Count"]?>">
      <p>
        <input type="submit" value="<?php echo $messBot?>">
      </p>
    </form>
  </boby>
</html>