<h2>Aluguéis</h2>
<a href="/mvc20242/aluguel/criar">Criar Novo Aluguel</a>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Veículo</th>
        <th>Data Início</th>
        <th>Data Fim</th>
        <th>Preço Total</th>
        <th>Status</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </tr>
    <?php
    foreach ($param as $valor){
    ?>
    <tr>
        <td><?= $valor["id"] ?></td>
        <td><?= $valor["cliente_nome"]?></td>
        <td><?= $valor["veiculo_modelo"]?></td>
        <td><?= $valor["data_inicio"]?></td>
        <td><?= $valor["data_fim"]?></td>
        <td><?= $valor["preco_total"]?></td>
        <td><?= $valor["status"]?></td>
        <td><a href="/mvc20242/aluguel/alterar?id=<?= $valor["id"]?>">Alterar</a></td>
        <td><a href="/mvc20242/aluguel/deletar?id=<?= $valor["id"]?>" onclick="return confirm('Tem certeza que deseja deletar o aluguel ID <?= $valor['id'] ?>?');">Deletar</a></td>
    </tr>
    <?php
    }
    ?>
</table>
