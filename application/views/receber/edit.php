<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('receber'); ?>">Pagamentos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" name="form_edit">

          <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Alteração: <?php echo formata_data_banco_com_hora($conta_receber->conta_receber_data_alteracao); ?></strong></p>

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-3">
               <label>Clientes:</label>
               <select class="form-control" name="conta_receber_cliente_id">
                <?php foreach ($clientes as $cliente): ?>
                  <option value="<?php echo $cliente->cliente_id ?>" <?php echo ($cliente->cliente_id == $conta_receber->conta_receber_cliente_id ? 'selected' : '') ?> title="<?php echo ($cliente->cliente_ativo == 0 ? 'Não pode ser escolhido' : 'Fornecedor Ativo'); ?>" <?php echo ($cliente->cliente_ativo == 0 ? 'disabled' : '') ?>><?php echo ($cliente->cliente_ativo == 0 ? $cliente->cliente_nome. '&nbsp;->&nbsp;Inativa' : $cliente->cliente_nome) ?></option>
                <?php endforeach; ?>
                <?php echo form_error('conta_receber_fornecedor_id', '<small class="form-text text-danger">','</small>'); ?>
              </select>
            </div>

            <div class="col-md-3">
              <label>Data de Vencimento:</label>
              <input type="date" class="form-control" name="conta_receber_data_vencto" placeholder="Data de Vencimento" value="<?php echo $conta_receber->conta_receber_data_vencto; ?>">
              <?php echo form_error('conta_receber_data_vencto', '<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-md-3">
              <label>Valor da Conta:</label>
              <input type="text" class="form-control money2" name="conta_receber_valor" placeholder="Valor da Conta" value="<?php echo $conta_receber->conta_receber_valor; ?>">
              <?php echo form_error('conta_receber_valor', '<small class="form-text text-danger">','</small>'); ?>
            </div>

             <div class="col-md-3">
              <label>Situação:</label>
              <select name="conta_receber_status" class="form-control">
                <option value="0" <?php echo ($conta_receber->conta_receber_status == 0 ? 'selected' : ''); ?>>Pendente</option>
                <option value="1" <?php echo ($conta_receber->conta_receber_status == 1 ? 'selected' : ''); ?>>Paga</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label>Observações:</label>
              <textarea class="form-control" name="conta_receber_obs" placeholder="Observações:" value=""><?php echo $conta_receber->conta_receber_obs; ?></textarea>
              <?php echo form_error('conta_receber_obs', '<small class="form-text text-danger">','</small>'); ?>
            </div>
          </div>
        </fieldset>
          
        <div class="form-group row">
          <input type="hidden" name="receber_id" value="<?php echo $conta_receber->conta_receber_id ?>">
        </div>

  
          <button type="submit" class="btn btn-primary btn-sm" <?php echo ($conta_receber->conta_receber_status == 1 ? 'disabled' : '') ?>><?php echo ($conta_receber->conta_receber_status == 1 ? 'Conta Paga' : 'Salvar') ?></button>

        <a href="<?php echo base_url('receber'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

