<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Ordem Sistemas</div>
  </a>


  <hr class="sidebar-divider">


  <div class="sidebar-heading">
    Modulos
  </div>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-database"></i>
      <span>Cadastros</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Escolha uma opção:</h6>
        <a class="collapse-item" href="<?php echo base_url('clientes'); ?>"><i class="fas fa-user-tie text-gray-900"></i>&nbsp;&nbsp;&nbsp;Clientes</a>
        <a class="collapse-item" href="<?php echo base_url('fornecedores'); ?>"><i class="fas fa-user-tag text-gray-900"></i>&nbsp;&nbsp;&nbsp;Fornecedores</a>
        <a class="collapse-item" href="<?php echo base_url('vendedores'); ?>"><i class="fas fa-user-secret text-gray-900"></i>&nbsp;&nbsp;&nbsp;Vendedores</a>
        <a class="collapse-item" href="<?php echo base_url('servicos'); ?>"><i class="fas fa-laptop-house text-gray-900"></i>&nbsp;&nbsp;&nbsp;Servicos</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
      <i class="fas fa-box-open"></i>
      <span>Estoque</span>
    </a>
    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Escolha uma opção:</h6>
        <a class="collapse-item" href="<?php echo base_url('marcas'); ?>"><i class="fas fa-cubes text-gray-900"></i>&nbsp;&nbsp;&nbsp;Marcas</a>
        <a class="collapse-item" href="<?php echo base_url('produtos'); ?>"><i class="fab fa-product-hunt text-gray-900"></i>&nbsp;&nbsp;&nbsp;Produtos</a>
        <a class="collapse-item" href="<?php echo base_url('categorias'); ?>"><i class="fab fa-buffer text-gray-900"></i>&nbsp;&nbsp;&nbsp;Categorias</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo3">
      <i class="fas fa-file-invoice-dollar"></i>
      <span>Financeiro</span>
    </a>
    <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Escolha uma opção:</h6>
        <a class="collapse-item" href="<?php echo base_url('pagar'); ?>"><i class="fas fa-money-bill-alt text-gray-900"></i>&nbsp;&nbsp;&nbsp;Contas </a>
      </div>
    </div>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Configurações
  </div>

  <!-- Nav Item - Usuários -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('usuarios'); ?>">
      <i class="fas fa-users"></i>
      <span>Usuários</span></a>
    </li>

    <!-- Nav Item - Sistemas -->
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('sistema'); ?>">
        <i class="fas fa-cogs"></i>
        <span>Sistemas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">