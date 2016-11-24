<!DOCTYPE html>

	<head>
		<title>Rancid Tomatoes</title>
                <meta charset="UTF-8">
		<link href="movie.css" type="text/css" rel="stylesheet" />
                <link rel="icon" href="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif">
	</head>

	<body>

                <?php 
                    $film =$_GET["film"];
                    $info =file("$film/info.txt");
               ?>
		<div id="header">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1><?= $info[0] ?> (<?= trim($info[1])?>)</h1>


                <div id="main">
                <div id="sidebar">		
		    <div>
			    <img src="<?= $film ?>/overview.png" alt="general overview" />
		    </div>

		    <dl>
			    <?php
                                $overview =file("$film/overview.txt");
                                foreach($overview as $term){
                                    list($def,$text) =explode(':',$term);
                                    ?>
                             <dt><?= $def ?></dt>
                             <dd><?= $text ?></dd>
                                     <?php
                                }
                            ?>
		    </dl>
                    </div>
                    <div id="main-valutations">
		    <div id="valutation"> 
                            <?php
                                if($info[2] < 60){
                            ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten" />
			    <?php
                                }
                                else{
                            ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/freshbig.png" alt="Fresh" />
                            <?php
                                }
                            ?>
                             <?= trim($info[2]) ?>%
		    </div>
		    <div class="column"> 
                    <?php
                        $reviews =glob("$film/review*.txt");
                        $NUM =count($reviews);
                        if($NUM > 8) $left =5;
                        else $left = round($NUM / 2 );
                        for($i =0; $i < $left; $i++){
                            $review =file("$reviews[$i]");
                     ?>
		    <p class="comment">
                    <?php
                            if("ROTTEN" == $review[1]){
                    ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
                     <?php
                            }
                            else{
                     ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
                     <?php
                             }
                      ?>
			    <q><?= trim($review[0]) ?></q>
		    </p>
		    <p class="author">
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
			    <?= $review[2] ?><br />
			    <span class="review"><?= $review[3] ?></span>
		    </p>
                    <?php 
                        }
                    ?>
                    </div>
                    <div class="column"> 
                    <?php
                        if($NUM >10) $right =5;
                        else $right = $NUM - $left;
                        for($i =$left; $i < $left+$right; $i++){
                                               $review =file("$reviews[$i]");
                     ?>
		    <p class="comment">
                    <?php
                            if("ROTTEN" == $review[1]){
                    ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
                     <?php
                            }
                            else{
                     ?>
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
                     <?php
                             }
                      ?>
			    <q><?= trim($review[0]) ?></q>
		    </p>
		    <p class="author">
			    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
			    <?= $review[2] ?><br />
			    <span class="review"><?= $review[3] ?></span>
		    </p>
                    <?php
                        }
                    ?>
		    </p>
                   </div>
                   </div>
                    <div id="counter">
		            <p>(1-<?= $left + $right ?>) of <?= $NUM ?></p>
                    </div>
                </div>
		<div id="validators"> <!-- aggiunto id -->
			<a href="ttp://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		</div>
	</body>
</html>
