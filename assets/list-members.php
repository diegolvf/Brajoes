<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $membro_oficial = $_POST["membro_oficial"];
    $nickname = $_POST["nickname"];

    // Execute as consultas SQL para atualizar o banco de dados
    $updateQuery = "UPDATE members SET membro_oficial='$membro_oficial', nickname='$nickname' WHERE email='$email'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Atualização bem-sucedida.";
    } else {
        echo "Erro na atualização: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brajoes - Lista membros</title>
    <link rel="shortcut icon" type="imagex/png" href="./img/logo.png">
    <link rel="stylesheet" href="./css/global.css">
    <style>
        body {
           
            background:#004225;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            color: #fff;
        }

        table {
            width: 80%;
            margin: 10px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th{
            color:#fff;
        }

        tr:nth-child(even) {
            background-color: rgba(244,245,250,1);
        }

        tr:nth-child(odd) {
           color: rgba(244,245,250,1);
        }

        .selection{
            color:#fff;
            font-size: 1.2rem;
        }

        .selection__input{
            font-size: 1.2rem;
            border:none;
            border-radius: 5px;
        }

        .btn__copy{
            padding: 10px;
            background-color: #fff;
            color:#004225;
            border-radius: 2px solid;
        }
        
        .btn__copy:hover{
            background-color: #004225;
            color: #dddddd;
        }

        
    </style>
</head>

<body>
    <h1>Lista de membros</h1>
    <input type="checkbox" id="select-all-checkbox" onchange="toggleCheckboxes(this)">
    <label for="select-all-checkbox" class="selection">Selecionar todos</label>

    <input type="text" class="selection__input" id="myInput" onkeyup="filterTable()" placeholder="Pesquisar por nome.." title="Digite um nome">
    <table id="myTable">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Newslleter</th>
            <th>membro oficial</th>
            <th>Nickname</th>
            <th>Editar</th>
        </tr>
        <?php
        include('db_connection.php');
        $sql = "SELECT * FROM members";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . "<input type='checkbox' value='" . $row["email"] . "'>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["tel"] . "</td>";
                // Verifica se o valor de 'news' é igual a 1 (ou seja, verdadeiro)
                if ($row["news"] == 1) {
                    echo "<td>Sim</td>";
                } else if ($row["news"] == 0) {  // Verifica se o valor de 'news' é igual a 0 (ou seja, falso)
                    echo "<td>Não</td>";
                } else {  // Valor inválido de 'news'
                    echo "<td>Valor inválido</td>";
                }

                echo "<td>" . $row["membro_oficial"] . "</td>";
               
                //sucesso ou erro 
                echo "<td>" . $row["nickname"] . "</td>";

                $email = $row["email"];
                echo "<td>";
                echo "<form method='post' action='processar_edicao.php'>";
                echo "<input type='hidden' name='email' value='" . $row["email"] . "'>";
                echo "<select name='membro_oficial'>";
                echo "<option value='Sim' selected>Sim</option>";
                echo "<option value='Não'>Não</option>";
                echo "</select>";
                echo "<input type='text' name='nickname' placeholder='Novo Nickname'>";
                echo "<input type='submit' value='Salvar'>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum membro encontrado.</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
     <!-- Botão para copiar emails de checkboxes selecionados -->
     <button class="btn__copy" onclick="copySelectedEmails()">Copiar Emails</button>
     
    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function copySelectedEmails() {
            var selectedEmails = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(function(checkbox) {
                selectedEmails.push(checkbox.value);
            });
            
            if (selectedEmails.length > 0) {
                var copyText = selectedEmails.join("; ");
                navigator.clipboard.writeText(copyText).then(function() {
                    alert("Emails copiados para a área de transferência: " + copyText);
                }, function(err) {
                    console.error('Erro ao copiar: ', err);
                });
            } else {
                alert("Nenhum email selecionado.");
            }
        }

        function toggleCheckboxes(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox, index) {
                var row = checkbox.parentElement.parentElement;
                var news = row.getElementsByTagName("td")[3].textContent.trim();
                if (news === "Sim") {
                    checkbox.checked = source.checked;
                }
            });
        }


        // salvamanento de dados

        document.addEventListener('DOMContentLoaded', function() {
        var forms = document.querySelectorAll('form');

        forms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);
                var email = formData.get('email');

                fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    var mensagemDiv = document.getElementById('mensagem_' + email);

                    // Verifica se o elemento com o ID 'mensagem_' + email foi encontrado
                    if (mensagemDiv) {
                        mensagemDiv.innerHTML = data;
                    } else {
                        console.error('Elemento não encontrado: mensagem_' + email);
                    }

                    // Recarrega a página apenas quando o formulário é enviado com sucesso
                    location.reload();
                })
                .catch(error => console.error('Erro na solicitação:', error));
            });
        });
    });

    </script>
</body>
</html>