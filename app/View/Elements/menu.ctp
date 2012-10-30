 <ul>
                <li <?php if($this->request->params['controller']=='pages'){echo 'id="current"';} ?>>
                  <a href="/" shape="rect"><?php echo _('Acceuil');  ?></a>
                </li>
                <li <?php if($this->request->params['controller']=='Reclamations'){echo 'id="current"';} ?> >
                  <a href="/Reclamations/listreclam" shape="rect"><?php echo _('Déclarations');   ?></a>
                </li>
                <?php if ($this->Html->isadmin()): ?>
                    <li <?php if($this->request->params['controller']=='users'){echo 'id="current"';} ?>  >
                  <a href="/admin/users/listuser/" shape="rect"><?php echo _('Utilisateurs');   ?></a>
                </li>
                <li <?php if($this->request->params['controller']=='Vehicules'){echo 'id="current"';} ?> >
                  <a href="/admin/Vehicules/listvehicule/" shape="rect"><?php echo _('Véhicules');   ?></a>
                </li>
                 <li <?php if($this->request->params['controller']=='Reparators'){echo 'id="current"';} ?> >
                  <a href="/admin/Reparators/listreparator/" shape="rect"><?php echo _('Réparateurs');   ?></a>
                </li>
                 <li <?php if($this->request->params['controller']=='Sites'){echo 'id="current"';} ?> >
                  <a href="/admin/Sites/listsite/" shape="rect"><?php echo _('Sites');   ?></a>
                </li>
                 <li <?php if($this->request->params['controller']=='Pannes'){echo 'id="current"';} ?> >
                  <a href="/admin/Pannes/listpanne/" shape="rect"><?php echo _('Pannes');   ?></a>
                </li>
                <?php endif ?>
                 
              </ul> 