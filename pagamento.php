<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    //seleciona o campo do horario de entrada do veículo buscando na tabela veiculo onde o id = a variavel
    $result_usuario= "SELECT horario_entrada from veiculo where id=$id";
    $resultado_usuario=mysqli_query($conn,$result_usuario);
    $row_usuario=mysqli_fetch_assoc($resultado_usuario);

    // pega o fuso horário local e armazena separadamente a data e o horário
    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    $time2 = $datetime->format('Y-m-d');
    if(isset($_SESSION['data'])){ // checa se a data que está dentro da session
        if($_SESSION['data'] != $time2){ // se ela for diferente da variavél time 2 
            $_SESSION['data']= $time2;// ela atribui a data do time 2 
            $_SESSION["faturamento"] = 0; // zera o faturamento por que é um novo dia 
        }
    }
    else {
        $_SESSION['data']= $time2;
    }
   
    $time = $datetime->format('H:i:s'); // trasforma o formato da data em hora minuto e segundo 
    $dif = abs(strtotime($time) - strtotime($row_usuario['horario_entrada'])); // aqui é a subtração da hora da entrada menos a hora atual
    $tempo = ceil($dif / (60));  //tranformar a hora em minutos para facilitar a lógica , o ceil arredonda o valor para cima
    $horas = $tempo / 60;
    $horas = number_format($horas, 2);
 

    if($tempo <= 15){
        // echo "CORTESIA DO ESTACIONAMENTO. ";
        $valor = 0;
    
        }elseif($tempo <= 60){
            $valor = 27;

        }elseif($tempo <= 120){
            $valor = 32;
        }elseif($tempo > 120){
            $armazena = $tempo - 120;
            $jhgs = ceil($armazena / 60);
        
            $valor= 32;
            for($i=0;$i < $jhgs; $i++){
            $valor+= 9;
            
        }
    }
    // echo "R$".($valor);
    $_SESSION['valor'] = $valor;
    $faturamento =$valor; 
    $_SESSION["faturamento"] += $faturamento; //  valor do faturamento



    $result_usuario ="UPDATE veiculo SET horario_saida=NOW(), estacionado = 0 WHERE id='$id'"; // o veículo ainda vai ficar no banco,porem é le atribuido  no campo estacionado como valor de 0 que significa que ele saiu do estacionamento
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    $result_usuario= "SELECT horario_saida from veiculo where id=$id";
    $resultado_usuario=mysqli_query($conn,$result_usuario);
    $row_usuario=mysqli_fetch_assoc($resultado_usuario);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] ="<p style='color:blue;'>Saída Registrada com Sucesso</p> <p>Valor a Pagar: $valor</p> 
                            <p>Horas Usadas: $horas</p>
                            <p>Horário de Saída: ". $row_usuario['horario_saida'] ."</p>";// valor a ser pago
        header("Location: lista.php");
        
    }else{
        $_SESSION['msg'] ="<p style='color:red;'>Saída não Resgistrada. Tente Novamente.</p>"; // caso não seja executado
        header("Location: lista.php");  
    
    }
    // header('Location: pagou.php?id='. $id);

?>