<?php
// Obtém a lista de clientes e veículos para os campos de seleção
use service\ClienteService;
use service\VeiculoService;

$clienteService = new ClienteService();
$clientes = $clienteService->listaClientes();

$veiculoService = new VeiculoService();
$veiculos = $veiculoService->listaVeiculos();
?>

<form action="/mvc20242/aluguel/salvarCriar" method="POST">
    <label>Cliente:</label><br/>
    <select name="cliente_id">
        <?php foreach($clientes as $cliente): ?>
            <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
        <?php endforeach; ?>
    </select><br/>
    
    <label>Veículo:</label><br/>
    <select name="veiculo_id">
        <?php foreach($veiculos as $veiculo): ?>
            <option value="<?= $veiculo['id'] ?>"><?= $veiculo['modelo'] ?></option>
        <?php endforeach; ?>
    </select><br/>
    
    <label>Data Início:</label><br/>
    <input type="date" name="data_inicio" /><br/>
    
    <label>Data Fim:</label><br/>
    <input type="date" name="data_fim" /><br/>
    
    <label>Preço Total:</label><br/>
    <input type="text" name="preco_total" /><br/>
    
    <label>Status:</label><br/>
    <select name="status">
        <option value="Em andamento">Em andamento</option>
        <option value="Concluído">Concluído</option>
        <option value="Cancelado">Cancelado</option>
    </select><br/>
    
    <input type="submit" value="Enviar" />
</form>
