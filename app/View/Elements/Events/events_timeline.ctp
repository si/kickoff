<section class="cd-horizontal-timeline">
    <div class="timeline">
        <div class="events-wrapper">
            <div class="events">
                <ol>
                <?php
                $count = 0; 
                foreach($events as $event) :
                    $count++; 
                ?>
                <li>
                    <?php 
                    $format = 'd M';
                    echo $this->Html->link(
                        $this->Time->format($format,$event['Event']['start']),
                        '#0' 
                        /*
                        array(
                            'controller'=>'competitions',
                            'action'=>'view',
                            $event['Competition']['slug'], 
                            'date'=>$this->Time->format('Y-m-d',$event['Event']['start'])
                        )
                        */
                        ,
                        array(
                            'class' => (($count == 1) ? 'selected' : ''),
                            'data-date'=>$this->Time->format('d/m/Y',$event['Event']['start']),
                        )
                    ); ?>
                </li>
                <?php endforeach; ?>
                </ol>
                <span class="filling-line" aria-hidden="true"></span>
            </div>
        </div>
        <ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
    </div>

	<div class="events-content">
		<ol>
            <?php
            $count = 0; 
            foreach($events as $event) :
                $count++; 
            ?>
			<li data-date="<?php echo $this->Time->format('d/m/Y',$event['Event']['start']); ?>" <?php echo ($count == 1) ? 'class="selected"' : ''; ?>>
				<h2><?php echo $event['Event']['summary']; ?></h2>
				<em><?php echo $this->Time->format('D d M Y',$event['Event']['start']); ?></em>
			</li>
            <?php endforeach; ?>
        </ol>
    </div>


</section>