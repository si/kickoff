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
                <a href="<?php echo '/events/view/' . $event['Event']['id'] .'/'. $event['HomeTeam']['slug'] . '-' . $event['AwayTeam']['slug']; ?>">
                    <h2 class="house vs">
                        <span><?php echo $event['HomeTeam']['name']; ?></span>
                        <abbr title="versus">v</abbr>
                        <span><?php echo $event['AwayTeam']['name']; ?></span>
                    </h2>
                    <time datetime="<?php echo $this->Time->format('c',$event['Event']['start']); ?>"><?php echo $this->Time->format('D d M Y g:ia',$event['Event']['start']); ?></time>
                </a>
			</li>
            <?php endforeach; ?>
        </ol>
    </div>


</section>