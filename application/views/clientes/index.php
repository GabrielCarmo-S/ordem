

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
              <a href="<?php echo base_url('clientes/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-tie"></i>&nbsp;Novo</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>CPF/CNPJ</th>
                      <th>Tipo Cliente</th>
                      <th>Ativo</th>
                      <th class="no-sort">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                    <tr>
                      <td><?php echo $cliente->cliente_id ?></td>
                      <td><?php echo $cliente->cliente_nome ?></td>
                      <td><?php echo $cliente->cliente_cpf_cnpj ?></td>
                      <td><?php echo ($cliente->cliente_tipo == 1 ? 'Pessoa Fisica' : 'Pessoa Júridica')?></td>
                      <td><?php echo ($cliente->cliente_ativo == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-warning">Não</span>')?></td>
                      <td class="text-right">
                          <a href="<?php echo base_url('clientes/edit/'.$cliente->cliente_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i>&nbsp;Editar</a>
                          <a href="javascript(void)" data-toggle="modal" data-target="#cliente-<?php echo $cliente->cliente_id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i>&nbsp;Escluir</a>
                      </td>
                    </tr>

                    <div class="modal fade" id="cliente-<?php echo $cliente->cliente_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('cliente/del/'.$clientes->cliente_id); ?>">Sim</a>
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

     