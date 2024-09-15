<h2>Clientes</h2>
<a href="/mvc20242/cliente/criar">Criar Novo Cliente</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </tr>
    <?
    foreach ($param as $valor){
    ?>
    <tr>
        <td><?= $valor["id"] ?></td>
        <td><?= $valor["nome"]?></td>
        <td><a href="/mvc20242/cliente/alterar?id=<?= $valor["id"]?>">Alterar</a></td>
        <td><a href="/mvc20242/cliente/deletar?id=<?= $valor["id"]?>" onclick="return confirm('Tem certeza que deseja deletar o cliente <?= $valor['nome'] ?>?');">Deletar</a></td>
    </tr>
    <?
    }
    ?>
</table>
