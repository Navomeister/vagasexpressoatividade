<?php
    session_start();
    include_once('conexao.php');
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                    }

                    // contagem do número de vagas
                    $result_carros = "SELECT COUNT(id) AS qt_ativos FROM veiculo WHERE estacionado = 1";
                    $resultado_carros = mysqli_query($conn, $result_carros);
                    $ativos = mysqli_fetch_assoc($resultado_carros);

                    // receber o número da página
                    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                    // setar a quantidade de itens por pagina
                    $qnt_result_pg = 5;

                    // calcular o início visualização(??)
                    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                    $result_usuarios = "SELECT * FROM veiculo WHERE estacionado = 0 LIMIT $inicio, $qnt_result_pg";
                    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

                    echo("<br><a href='index_placa.php'>Cadastrar Placa</a> <br>");
                    echo("<a href='lista.php'>Carros Estacionados</a> <br>");
                    if (isset($_SESSION['faturamento'])) {
                        echo ("faturamento do dia: R$" . $_SESSION['faturamento'] . "<br>");
                    }
                    else {
                        echo ("faturamento do dia: R$00.00 <br>");
                    }
                    if (isset($_SESSION['carrosDia'])) {
                        echo ("carros estacionados no dia:" . $_SESSION['carrosDia'] . "<br>");
                    }
                    else {
                        echo ("carros estacionados no dia: 0 <br>");
                    }
                    echo ("Vagas disponíveis:" . (200 - $ativos['qt_ativos']) . "<br>");
                    echo("<a href='login.html'>Sair</a>");
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                        echo "<h3>ID: " . $row_usuario['id'] . "</h3>";
                        echo "<p>Placa: " . $row_usuario['placa'] . "</p>";
                        echo "<p>Data de Cadastro: " . $row_usuario['data_cadastro'] . "</p>";
                        echo "<p>Horario de Saída: " . $row_usuario['horario_saida'] . "</p>";
                    }

                    // Paginação - Somar a quantidade de usuários
                    $result_pg = "SELECT COUNT(id) AS num_result FROM veiculo WHERE estacionado = 0";
                    $resultado_pg = mysqli_query($conn, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);

                    // quantidade de páginas
                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                    // limitar a quantidade de paginas que aparece
                    $max_links = 2;
                    echo '<br><br><a href="./lista_sairam.php?pagina=1">Primeira</a> ';
                    // mostrar a página a partir de 2 a menos até ser igual ao número da página atual - 1 (navegação)
                    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                        if ($pag_ant >= 1) {
                            echo "<a href='lista_sairam.php?pagina=$pag_ant'>$pag_ant</a> ";
                        }
                    }

                    echo "$pagina ";
                    // mostrar a página a partir do número da página atual + 1 até 2 a mais (navegação)
                    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                        if ($pag_dep <= $quantidade_pg) {
                            echo "<a href='lista_sairam.php?pagina=$pag_dep'>$pag_dep</a> ";
                        } 
                    }

                    echo "<a href='./lista_sairam.php?pagina=$quantidade_pg'>Última</a>";
                ?>