<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('produtos'); ?>">produtos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" name="form_add">

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fab fa-product-hunt"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-2">
               <label>Produto codigo:</label>
               <input type="text" class="form-control" name="produto_codigo" placeholder="Produto codigo" value="<?php echo $produto_codigo; ?>" readonly="">
             </div>
             <div class="col-md-10">
               <label>Descrição:</label>
               <input type="text" class="form-control" name="produto_descricao" placeholder="Descrição" value="<?php echo set_value('produto_descricao'); ?>">
               <?php echo form_error('produto_descricao', '<small class="form-text text-danger">','</small>'); ?>
             </div>
           </div>

           <div class="form-group row">
            <div class="col-md-3">
             <label>Marcas:</label>
             <select class="form-control" name="produto_marca_id">
              <?php foreach ($marcas as $marca): ?>
                <option value="<?php echo $marca->marca_id ?>"><?php echo $marca->marca_nome; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-3">
            <label>Categorias:</label>
            <select class="form-control" name="produto_categoria_id">
              <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria->categoria_id ?>"><?php echo $categoria->categoria_nome; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
           <label>Fornecedores:</label>
           <select class="form-control" name="produto_fornecedor_id">
            <?php foreach ($fornecedores as $fornecedor): ?>
              <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-3">
          <label>Produto Unidade:</label>
          <input type="text" class="form-control" name="produto_unidade" placeholder="Produto Unidade" value="<?php echo set_value('produto_unidade'); ?>">
          <?php echo form_error('produto_unidade', '<small class="form-text text-danger">','</small>'); ?>
        </div>
      </div>
    </fieldset>

     <fieldset class="mt-4 border p-2">
        <legend class="font-small"><i class="fas fa-funnel-dollar"></i>&nbsp;Precificação e Estoque</legend>
          <div class="form-group row">
            <div class="col-md-3">
               <label>Preço do custo:</label>
               <input type="text" class="form-control money" name="produto_preco_custo" placeholder="Preço do custo" value="<?php echo set_value('produto_preco_custo'); ?>">
               <?php echo form_error('produto_preco_custo', '<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-md-3">
               <label>Preço de Venda:</label>
               <input type="text" class="form-control money" name="produto_preco_venda" placeholder="Preço de Venda" value="<?php echo set_value('produto_preco_venda'); ?>">
               <?php echo form_error('produto_preco_venda', '<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-md-3">
               <label>Estoque Minimo:</label>
               <input type="number" class="form-control" name="produto_estoque_minimo" placeholder="Estoque Minimo" value="<?php echo set_value('produto_estoque_minimo'); ?>">
               <?php echo form_error('produto_estoque_minimo', '<small class="form-text text-danger">','</small>'); ?>
            </div>
            <div class="col-md-3">
               <label>Quantidade Estoque:</label>
               <input type="number" class="form-control" name="produto_qtde_estoque" placeholder="Quantidade Estoque" value="<?php echo set_value('produto_qtde_estoque'); ?>">
               <?php echo form_error('produto_qtde_estoque', '<small class="form-text text-danger">','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Produto Ativo:</label>
                <select name="produto_ativo" class="form-control">
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
                </select>
            </div>
            <div class="col-md-8">
              <label>Observações:</label>
              <textarea class="form-control" name="cliente_obs" placeholder="Observações:"><?php echo set_value('$produto->produto_obs'); ?></textarea>
            </div>
          </div>
     </fieldset>


    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
    <a href="<?php echo base_url('produtos'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
  </form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

