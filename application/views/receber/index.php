
<?php $this->load->view('layout/sidebar'); ?>



<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <?php if ($message = $this->session->flashdata('sucesso')): ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-smile-wink">&nbsp;&nbsp;</i><?php echo $message; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($message = $this->session->flashdata('error')): ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i><?php echo $message; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?php echo base_url('receber/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-secret"></i>&nbsp;Novo</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Valor da Conta</th>
                <th>Data de Vencimento</th>
                <th>Data de Pagamento</th>
                <th>Situação</th>
                <th class="no-sort">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($contas_receber as $conta): ?>
                <tr>
                  <td><?php echo $conta->conta_receber_id ?></td>
                  <td><?php echo $conta->cliente_nome ?></td>
                  <td><?php echo 'R$&nbsp'.$conta->conta_receber_valor ?></td>
                  <td><?php echo formata_data_banco_sem_hora($conta->conta_receber_data_vencto);  ?></td>
                  <td><?php echo($conta->conta_receber_status == 1 ? formata_data_banco_sem_hora($conta->conta_receber_data_pagamento) : 'Aguardando pagamento'); ?></td>
                  <td><?php

                  if ($conta->conta_receber_status == 1) {
                    echo '<span class="badge badge-success btn-sm">Paga</span>';
                  }

                  else if(strtotime($conta->conta_receber_data_vencto) > strtotime(date('Y-m-d'))){
                     echo 'A receber';
                  } else if(strtotime($conta->conta_receber_data_vencto) == strtotime(date('Y-m-d'))) {
                     echo 'Vence hoje';
                  } else {
                    echo "Vencida";
                  }

                  ?></td>


                  <td class="text-right">
                    <a href="<?php echo base_url('receber/edit/'.$conta->conta_receber_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                    <a href="javascript(void)" data-toggle="modal" data-target="#conta-<?php echo $conta->conta_receber_id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>&nbsp;Excluir</a>
                  </td>
                </tr>

                <div class="modal fade" id="conta-<?php echo $conta->conta_receber_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza da deleção?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Para excluir o registro clique em "SIM"</div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('receber/del/'.$conta->conta_receber_id); ?>">Sim</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

