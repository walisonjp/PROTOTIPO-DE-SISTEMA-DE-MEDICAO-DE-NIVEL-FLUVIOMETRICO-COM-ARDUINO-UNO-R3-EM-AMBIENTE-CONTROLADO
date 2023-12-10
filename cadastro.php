<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/estilo.css">
<title>Cadastro do Usuario</title>
</head>

<body>
<center>
<h1>Cadastro de Usuario</h1>
</center>
<br>
<center>
<fieldset id="quadro">
<br>
<form action="salvar_cadastro.php" method="post">

  <table style="width: 625px;" border="0">

    <tbody><tr>

      <td width="69">Nome:</td>

      <td width="546"><input id="nome" maxlength="45" name="nome" size="70" type="text" /></td>

    </tr>

    <tr>

      <td>Email:</td>

      <td><input id="email" maxlength="60" name="email" size="70" type="text" /></td>

    </tr>

    <tr>

      <td>Sexo:</td>

      <td><input checked="checked" name="sexo" type="radio" value="Masculino" />

        Masculino 

        <input name="sexo" type="radio" value="Feminino" />

        Feminino</td>

    </tr>

    <tr>

      <td>DDD:</td>

      <td><input id="ddd" maxlength="2" name="ddd" size="4" type="text" />

      Telefone:

        <input id="telefone" maxlength="9" name="telefone" type="text" />

        <span class="style3">Apenas números</span> </td>

    </tr>

    <tr>
      
      <td colspan="2"><p>
        
        <input id="cadastrar" name="cadastrar" type="submit" value="Cadastrar" /> 
        
        
        
        
        
        <input id="limpar" name="limpar" type="reset" value="Limpar" />
      </p>
        
        <p> </p></td>
      
    </tr>

  </tbody></table>
  
</form>
<br/>

</fieldset>
</body>
<center>
<p id="rodape">Desenvolvido por Walison Justiniano Pinto</p>
</center>
</html>