 <ul>
                <li id="current" style="border:none">
                  <a href="/" shape="rect"><?php echo _('Acceuil');  ?></a>
                </li>
                <li>
                  <a href="/Reclamations/listreclam" shape="rect"><?php echo _('Reclamation');   ?></a>
                </li>
                <?php if ($this->Html->isadmin()): ?>
                    <li>
                  <a href="/admin/users/listuser/" shape="rect"><?php echo _('Admin');   ?></a>
                </li>
                <li>
                  <a href="/admin/Vehicules/listvehicule/" shape="rect"><?php echo _('Véhicules');   ?></a>
                </li>
                <?php endif ?>
                 
              </ul> 