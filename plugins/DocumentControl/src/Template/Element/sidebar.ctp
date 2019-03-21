<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-light sidebar" style="border-right: thin solid #dddfe2 !important">
    <br/>

    <ul class="nav nav-pills flex-column user-menu">
        <li class="heading"> <h6 class=" text-capitalize text-justify">MENU</h6></li>
        <li class="nav-item">
            <?= $this->Html->link('<i class="glyphicon glyphicon-asterisk hidden-sm"></i> Dashboard',['controller'=>'companies','action'=>'dashboard','prefix'=>'admin','plugin'=>false],['class'=>"nav-link ",'escape'=>false,'data-toggle'=>'tooltip','title'=>'view dashboard '])?>

        </li>

        <li class="nav-item">
            <?= $this->Html->link('<i class="glyphicon glyphicon-search  hidden-sm"></i> Users',['controller'=>'users','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'add, edit,view and delete users in the company, assign to and remove roles from users '])?>

        </li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> User Logs',['controller'=>'user-logs','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'view every activity performed by users in the system'])?></li>



    </ul>
    <br/>

    <ul class="nav nav-pills flex-column user-menu">
        <li class="heading"><h6 class="text-capitalize text-justify">SUPPLIER INFORMATION</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> Supplier',['controller'=>'Suppliers','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Manage supplier information'])?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> Supplier Payments',['controller'=>'Supplier-payments','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'notify company of debts to suppliers/clients'])?></li>
    </ul>
    <br/>

    <ul class="nav nav-pills flex-column user-menu">
        <li class="heading"><h6 class="text-capitalize text-justify">SALES</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> New Sales',['controller'=>'sales','action'=>'add','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Make sales'])?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> View Sales',['controller'=>'sales','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'View all sales '])?></li>
    </ul>
<br/>



    <ul class="nav nav-pills flex-column user-menu">
        <li class="heading"><h6 class="">PRODUCT INFORMATION</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-time  hidden-sm"></i> Products <span class="badge badge-primary pull-right text-white" style=""></span>',['controller'=>'items','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Add, edit and view items to the inventory']) ?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-time  hidden-sm"></i> Products on Hold<span class="badge badge-primary pull-right text-white" style=""></span>',['controller'=>'items','action'=>'hold','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Add, edit and view items to the inventory']) ?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-time  hidden-sm"></i> Purchase Orders <span class="badge badge-primary pull-right text-white" style=""></span>',['controller'=>'purchase-orders','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Manage purchase orders from customers. This is used to manage customers who pay for items that will be collected in the future']) ?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-leaf  hidden-sm"></i> Product Category',['controller'=>'categories','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'Create categories that will be use to distinguish items. '])?></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-leaf  hidden-sm"></i> Units',['controller'=>'units','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'Create unit of measurements that will be used to quantity items in the inventory'])?></li>

    </ul>
    <br/>

    <ul class="nav nav-pills flex-column">
    <li class="heading"><h6 class="text-danger">CUSTOMER INFORMATION</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-edit  hidden-sm"></i> Customers',['controller'=>'customers','action'=>"index",'plugin'=>false,'prefix'=>'admin'],['escape'=>false, 'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Manage your clients information']) ?>

        <li><?= $this->Html->link('<i class="glyphicon glyphicon-plus  hidden-sm"></i> Consultation History',['controller'=>'disease-conditions','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'Manage customer consultation information'])?></li>

    </ul>
    <br/>

    <ul class="nav nav-pills flex-column">
<li class="heading"><h6 class="text-danger">EXPENSES INFORMATION</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-edit  hidden-sm"></i> Miscellaneous',['controller'=>'miscellaneous','action'=>"index",'plugin'=>false,'prefix'=>'admin'],['escape'=>false, 'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'Take a log of company expenses.']) ?>
        
    </ul>
    <br/>

    <ul class="nav nav-pills flex-column">
        <li class="heading"><h6 class="text-danger">REPORT</h6></li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-edit  hidden-sm"></i> Expense Report',['controller'=>'expenses','action'=>"index",'plugin'=>false,'prefix'=>'admin'],['escape'=>false, 'class'=>"nav-link",'data-toggle'=>'tooltip','title'=>'View expense report']) ?>
        <li><?= $this->Html->link('<i class="glyphicon glyphicon-plus  hidden-sm"></i> Income Report',['controller'=>'sales','action'=>'income-report','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'View income report from sales, purchase orders, consultation etc'])?></li>
    </ul>
    <br/>
     <ul class="nav nav-pills flex-column">
    <li class="heading"><h6 class="text-danger">DOCUMENTS CONTROL</h6></li>
        <li><?= $this->Html->link(' Documents Category',['controller'=>'document-categories','action'=>'index','plugin'=>'DocumentControl','prefix'=>false],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'create and manage document categories for easy retrieval'])?></li>
        <li><?= $this->Html->link('<i class="glyphicon glyphicon-folder  hidden-sm"></i> Documents',['controller'=>'documents','action'=>'index','plugin'=>'DocumentControl','prefix'=>null],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'create and manage company documents'])?></li>
    </ul>
    <ul class="nav nav-pills flex-column">
    <li class="heading"><h6 class="text-danger">SETTINGS</h6></li>
        <li><?= $this->Html->link(' Settings',['controller'=>'settings','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'create and manage settings that will be used in the system '])?></li>
        <li><?= $this->Html->link('<i class="glyphicon glyphicon-plus  hidden-sm"></i> Location',['controller'=>'locations','action'=>'index','plugin'=>false,'prefix'=>'admin'],['escape'=>false,'class'=>'nav-link','data-toggle'=>'tooltip','title'=>'Create new location/branch for the company'])?></li>
    </ul>
</nav>
