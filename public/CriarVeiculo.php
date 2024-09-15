<form action="/mvc20242/veiculo/salvarCriar" method="POST">
    <label>Marca:</label><br/>
    <input type="text" name="marca" /><br/>
    <label>Modelo:</label><br/>
    <input type="text" name="modelo" /><br/>
    <label>Ano de Fabricação:</label><br/>
    <input type="text" name="ano_fabricacao" /><br/>
    <label>Placa:</label><br/>
    <input type="text" name="placa" /><br/>
    <label>Cor:</label><br/>
    <input type="text" name="cor" /><br/>
    <label>Categoria:</label><br/>
    <select name="categoria">
        <option value="Compacto">Compacto</option>
        <option value="Sedan">Sedan</option>
        <option value="SUV">SUV</option>
        <option value="Caminhonete">Caminhonete</option>
        <option value="Van">Van</option>
    </select><br/>
    <label>Preço Diária:</label><br/>
    <input type="text" name="preco_diaria" /><br/>
    <label>Status:</label><br/>
    <select name="status">
        <option value="Disponível">Disponível</option>
        <option value="Alugado">Alugado</option>
        <option value="Manutenção">Manutenção</option>
    </select><br/>
    <label>Quilometragem:</label><br/>
    <input type="text" name="quilometragem" /><br/>
    <label>Data de Aquisição:</label><br/>
    <input type="date" name="data_aquisicao" /><br/>
    <input type="submit" value="Enviar" />
</form>
