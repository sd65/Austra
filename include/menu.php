        <aside id="menu">
            <ul>
                <p>Affichage</p>
                <li class="switch">
                    Tous
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </label>
                    </div>
                    Moi
                </li>
                <li>
									<a href="?tp=1&td=<?php echo $td?>" <?php if($tp==1){ echo 'class="current"';} ?> >TP1</a>
									<a href="?tp=2&td=<?php echo $td?>" <?php if($tp==2){ echo 'class="current"';} ?> >TP2</a>
									<a href="?tp=3&td=<?php echo $td?>" <?php if($tp==3){ echo 'class="current"';} ?> >TP3</a>
								</li>
                <li>
									<a href="?td=1&tp=<?php echo $tp?>" <?php if($td==1){ echo 'class="current"';} ?> >TD1</a>
									<a href="?td=2&tp=<?php echo $tp?>" <?php if($td==2){ echo 'class="current"';} ?>>TD2</a>
								</li>
                
								<p>Paramètres</p>
                <li><a href="">Modifier mon profil</a></li>

                <li class="logout"><a href="">Déconnexion</a></li>
            </ul>
        </aside>
