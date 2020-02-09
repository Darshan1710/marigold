<!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="<?php echo base_url()?>images/logo1.gif" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold"><?php echo ucwords($this->session->userdata('username'));?></div>
             
                            </div>

  
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dashboard')?>" class="nav-link <?php if($this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'dashboard'){ echo 'active'; }?>">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/customerList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'customerList'){ echo 'active'; }?>">
                                <i class="icon-user"></i>
                                <span>
                                    Customer
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/familyList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'familyList'){ echo 'active'; }?>">
                                <i class="icon-users"></i>
                                <span>
                                    Family
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/getRatingList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'getRatingList'){ echo 'active'; }?>">
                                <i class="icon-pencil"></i>
                                <span>
                                    Rating
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/contactList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'contactList'){ echo 'active'; }?>">
                                <i class="icon-mobile"></i>
                                <span>
                                    Contact
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/complaintList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'complaintList'){ echo 'active'; }?>">
                                <i class="icon-notebook"></i>
                                <span>
                                    Complaint 
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/tableList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'tableList'){ echo 'active'; }?>">
                                <i class="icon-chair"></i>
                                <span>
                                    Table
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/managerList')?>" class="nav-link <?php  if($this->uri->segment(2) == 'managerList'){ echo 'active'; }?>">
                                <i class="icon-user-tie"></i>
                                <span>
                                    Manager
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link <?php  if($this->uri->segment(2) == 'getUserList'){ echo 'active'; }?>"><i class="icon-price-tag3"></i> <span>User</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Form components" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url('User/userList')?>" class="nav-link">User List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>User/getUserRoleList" class="nav-link">User Role</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link <?php  if($this->uri->segment(2) == 'getUserList'){ echo 'active'; }?>"><i class="icon-menu"></i> <span>Menu</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Form components" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url('User/menuList')?>" class="nav-link">Menu List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url('User/submenuList')?>" class="nav-link">Submenu List</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link <?php  if($this->uri->segment(2) == 'coupenList'){ echo 'active'; }?>"><i class="icon-price-tag3"></i> <span>Coupon</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Form components" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url('Admin/coupenList')?>" class="nav-link">Coupen List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Admin/couponUsage" class="nav-link">Coupon Usage</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-price-tag"></i> <span>Rewards</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Form components" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url()?>Rewards/rewardsMasterList" class="nav-link">Rewards Master List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Rewards/rewardsMasterForm" class="nav-link">Add Rewards Master</a></li>
                                <li class="nav-item-divider"></li>  
                                <li class="nav-item"><a href="<?php echo base_url()?>Rewards/rewardsPointsForm" class="nav-link">Add Rewards Points</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Rewards/rewardsUsageForm" class="nav-link">Redeem Points</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-newspaper"></i> <span>Contest</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Form components" style="display: none;">
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/contestView" class="nav-link">Contest View</a></li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/contestFormList" class="nav-link">Contest List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/contestForm" class="nav-link">Contest Form</a></li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/getWinnerListData" class="nav-link">Winner List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/getContenstantList" class="nav-link">Contenstant List</a></li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/giftList" class="nav-link">Gift List</a></li>
                                <li class="nav-item"><a href="<?php echo base_url()?>Contest/giftForm" class="nav-link">Add Gift</a></li>
                                <li class="nav-item-divider"></li>
                                <!-- <li class="nav-item"><a href="<?php echo base_url()?>Contest/editContestSetting" class="nav-link">Contest Setting</a></li> -->
                               
                            </ul>
                        </li>
                        

                        

                       
                        <!-- /page kits -->

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
            
        </div>
        <!-- /main sidebar -->