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
        <form method="POST" name="form_add">

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-3">
               <label>Fornecedores:</label>
               <select class="form-control" name="conta_pagar_fornecedor_id">
                <?php foreach ($fornecedores as $fornecedor): ?>
                  <option value="<?php echo $fornecedor->fornecedor_id ?>"><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-3">
              <label>Data de Vencimento:</label>
              <input type="date" class="form-control" name="conta_pagar_data_vencto" placeholder="Data de Vencimento" value="<?php echo set_value('conta_pagar_data_vencto'); ?>">
              <?php echo form_error('conta_pagar_data_vencto', '<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-md-3">
              <label>Valor da Conta:</label>
              <input type="text" class="form-control money2" name="conta_pagar_valor" placeholder="Valor da Conta" value="<?php echo set_value('conta_pagar_valor'); ?>">
              <?php echo form_error('conta_pagar_valor', '<small class="form-text text-danger">','</small>'); ?>
            </div>

            <div class="col-md-3">
              <label>Situação:</label>
              <select name="conta_pagar_status" class="form-control">
                <option value="0">Pendente</option>
                <option value="1">Paga</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label>Observações:</label>
              <textarea class="form-control" name="conta_pagar_obs" placeholder="Observações:"><?php echo set_value('conta_pagar_obs'); ?></textarea>
            </div>
          </div>
        </fieldset>   

        <button type="submit" class="btn btn-primary btn-sm mt-3">Salvar</button>

        <a href="<?php echo base_url('pagar'); ?>" class="btn btn-success btn-sm ml-2 mt-3"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

