
<header class="header">
    <div class="flex position">
        <h1><a href="/home/space"><span class="green">Vision</span> Chat</a></h1>
        <nav>
            <ul class="flex topul">
                <?php if($variable == "space") : ?>
                <li><a class="active" href="/home/space"><i class="fas fa-home"></i> Acceuil</a></li>
                <?php else : ?>
                <li><a href="/home/space"><i class="fas fa-home"></i> Acceuil</a></li>
                <?php endif; ?>
                <?php if($variable == "friends") : ?>
                <li><a class="active" href="/home/friends"><i class="fas fa-user-friends"></i> Amis</a></li>
                <?php else : ?>
                <li><a href="/home/friends"><i class="fas fa-user-friends"></i> Amis</a></li>
                <?php endif; ?>
                <?php if($variable == "profil") : ?>
                <li><a class="active" href="/home/profil"><i class="fa fa-user"></i> Profil</a></li>
                <?php else : ?>
                <li><a href="/home/profil"><i class="fa fa-user"></i> Profil</a></li>
                <?php endif; ?>
                <?php if($variable == "sms") : ?>
                <li><a class="active" href="/home/message"><i class="fas fa-sms"></i> Messages</a></li>
                <?php else : ?>
                <li><a href="/home/message"><i class="fas fa-sms"></i> Messages</a></li>
                <?php endif; ?>
                <?php if($variable == "bell") : ?>
                <li><a class="active" href="/home/bell"><i class="fas fa-bell"></i> Notifications</a></li>
                <?php else : ?>
                <li><a href="/home/bell"><i class="fas fa-bell"></i> Notifications</a></li>
                <?php endif; ?>
                <?php if($variable == "bars") : ?>
                <li><a class="active" href="#"><i class="fas fa-bars"></i> Menu</a></li>
                <?php else : ?>
                <li><a href="#"><i class="fas fa-bars"></i> Menu</a></li>
                <?php endif; ?>
                <li><a href="/login-controller/log-out"><i class="fas fa-arrow-alt-circle-right"></i> Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</header>

