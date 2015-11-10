<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" style="max-width:70px" class="img-circle" src="https://pbs.twimg.com/profile_images/1195161027/foto_400x400.jpg"></span> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=ucfirst($vars['user']->getUsername())?><?=$vars['user']->getCompany()?></strong>
                     </span> <span class="text-muted text-xs block"><?=$vars['user']->getRole() ? " (".$vars['user']->getRole().")": ' (publisher)'?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>

                </div>
                <div class="logo-element">
                    LDDRR
                </div>
            </li>
            <li>
                <a href="<?=$installPath?>/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard </span></a>
            </li>
            <li>
                <a href="<?=$installPath?>/app/show"><i class="fa fa-building-o"></i> <span class="nav-label">Places </span></a>
            </li>
            <li>
                <a href="<?=$installPath?>/library"><i class="fa fa-file-image-o"></i> <span class="nav-label">Library </span></a>
            </li>
            <li style="margin-top:80%" class="text-center"><img width="50%" src="<?=$installPath?>/images/logo.png"></li>
        </ul>
    </div>
</nav>