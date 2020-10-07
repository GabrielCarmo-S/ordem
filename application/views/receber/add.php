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
        <form method="POST" name="form_add">

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-3">
               <label>Clientes:</label>
               <select class="form-control" name="conta_receber_cliente_id">
                <?php foreach ($clientes as $cliente): ?>
                  <option value="<?php echo $cliente->cliente_id ?>"><?php echo $cliente->cliente_nome ?> </option>
                <?php endforeach; ?>
                <?php echo form_error('conta_receber_fornecedor_id', '<small class="form-text text-danger">','</small>'); ?>
              </select>
            </div>

            <div class="col-md-3">
              <label>Data de Vencimento:</label>
              <input type="date" class="form-control" name="conta_receber_data_vencto" placeholder="Data de Vencimento" value="<?php echo set_value('conta_receber_data_vencto'); ?>">
              <?php echo form_error('conta_receber_data_vencto', '<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-md-3">
              <label>Valor da Conta:</label>
              <input type="text" class="form-control money2" name="conta_receber_valor" placeholder="Valor da Conta" value="<?php echo set_value('conta_receber_valor'); ?>">
              <?php echo form_error('conta_receber_valor', '<small class="form-text text-danger">','</small>'); ?>
            </div>

             <div class="col-md-3">
              <label>Situação:</label>
              <select name="conta_receber_status" class="form-control">
                <option value="0">Pendente</option>
                <option value="1">Paga</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label>Observações:</label>
              <textarea class="form-control" name="conta_receber_obs" placeholder="Observações:" value=""><?php echo set_value('conta_receber_obs'); ?></textarea>
              <?php echo form_error('conta_receber_obs', '<small class="form-text text-danger">','</small>'); ?>
            </div>
          </div>
        </fieldset>
  
          <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

        <a href="<?php echo base_url('receber'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

