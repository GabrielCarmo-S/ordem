<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('pagar'); ?>">Pagamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" name="form_edit">

          <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Alteração: <?php echo formata_data_banco_com_hora($conta_pagar->conta_pagar_data_alteracao); ?></strong></p>

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-3">
               <label>Fornecedores:</label>
               <select class="form-control contas_pagar" name="conta_pagar_fornecedor_id">
                <?php foreach ($fornecedores as $fornecedor): ?>
                  <option value="<?php echo $fornecedor->fornecedor_id ?>" <?php echo ($fornecedor->fornecedor_id == $conta_pagar->conta_pagar_fornecedor_id ? 'selected' : '') ?> title="<?php echo ($fornecedor->fornecedor_ativo == 0 ? 'Não pode ser escolhido' : 'Fornecedor Ativo'); ?>" <?php echo ($fornecedor->fornecedor_ativo == 0 ? 'disabled' : '') ?>><?php echo ($fornecedor->fornecedor_ativo == 0 ? $fornecedor->fornecedor_nome_fantasia . '&nbsp;->&nbsp;Inativa' : $fornecedor->fornecedor_nome_fantasia) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <label>pagar Unidade:</label>
              <input type="text" class="form-control" name="pagar_unidade" placeholder="pagar Unidade" value="<?php echo $conta_pagar->conta_pagar_unidade; ?>">
              <?php echo form_error('pagar_unidade', '<small class="form-text text-danger">','</small>'); ?>
            </div>
          </div>
        </fieldset>

        <fieldset class="mt-4 border p-2">
          <legend class="font-small"><i class="fas fa-funnel-dollar"></i>&nbsp;Precificação e Estoque</legend>
          <div class="form-group row">
           <div class="form-group row">
            <div class="col-md-4">
              <label>pagar Ativo:</label>
              <select name="pagar_ativo" class="form-control">
                <option value="0" <?php echo ($conta_pagar->conta_pagar_ativo == 0 ? 'selected' : ''); ?>>Não</option>
                <option value="1" <?php echo ($conta_pagar->conta_pagar_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
              </select>
            </div>
            <div class="col-md-8">
              <label>Observações:</label>
              <textarea class="form-control" name="cliente_obs" placeholder="Observações:" value=""><?php echo $conta_pagar->conta_pagar_obs; ?></textarea>
              <?php echo form_error('cliente_obs', '<small class="form-text text-danger">','</small>'); ?>
            </div>
          </div>
        </fieldset>

        <div class="form-group row">
          <input type="hidden" name="pagar_id" value="<?php echo $conta_pagar->conta_pagar_id ?>">
        </div>


        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <a href="<?php echo base_url('pagar'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

