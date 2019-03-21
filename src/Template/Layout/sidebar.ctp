<div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">Loveworld</div>
      <div class="mui-divider"></div>
      <ul>
          <li><strong>Users</strong>
            <ul style="display:none">
                <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>

            </ul>
          </li>
          <li><strong>Comments</strong>
              <ul style="display: none">
                  <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
                  <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
                  <?php
                    if(isset($comment->id)){
                        echo  '<li>'. $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]).'</li>';
                        echo  '<li>'. $this->Form->postLink(__('Delete'),
                                                            ['action' => 'delete', $comment->id],
                                                            ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]
                                                            )
                            .'</li>';
                    }
                  
                  ?>
              </ul> 
          </li>
          <li><strong>Program</strong>
              <ul style="display: none">
                  <li><?= $this->Html->link(__('List Programs'), ['controller'=>'Programs','action' => 'index']) ?></li>
                  <li><?= $this->Html->link(__('New Programgroup'), ['controller' => 'Programgroups', 'action' => 'add']) ?> </li>
                  <?php
                    if(isset($program->id)){
                        echo '<li>'.
                                 $this->Html->link(__('Edit Program'), ['action' => 'edit', $program->id]) 
                             .' </li>';
                        echo '<li>'. $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $program->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]
                            )
                        .'</li>';
                         
                    }
                  ?>
                  
              </ul>
          </li>
          <li>
              <strong>Articles</strong>
              <ul style="display: none">
                  <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
                  <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
              </ul>
          </li>
          <li><strong>Exams</strong>
              <ul style="display: none">
                <li><?= $this->Html->link(__('New Exam'), ['controller'=>'Exams','action' => 'add']) ?> </li>
                <li><?= $this->Html->link(__('List Exams'), ['controller'=>'Exams','action' => 'index']) ?></li>
               <?php if(isset($exam->id)){ 
                   echo '<li>'. $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id]) .'</li>';
                   echo '<li>'. 
                           $this->Form->postLink(_('Delete'),
                                ['action' => 'delete', $exam->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]
                                 )
               .'</li>';
                   
                           
               } ?>
              </ul>
          </li>
       
      </ul>
      
    </div>