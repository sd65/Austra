<?php
	include "include/edt_display.php";
?>
<?php
	$year = 2013;
	$week = date('W');
	$tp = 1; //Donnée renseignée pour test
	$td = 1; //Donnée renseignée pour test
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Austra</title>
        <meta name="description" content="" />
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="./css/base.css" />
        <link rel="stylesheet" type="text/css" href="./css/table.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="./js/frontend.js"></script>
    </head>
    <body>
		<div id="table">
			<table>        
				<thead>
					<tr>
						<td class="thead">Jour</td>
						<?php for ($hourStatic=8;$hourStatic<20;$hourStatic++): ?>
							<td class="hour"> <?= $hourStatic ?>h</td>
							<td class="halfHour">30</td>
						<?php	endfor ; ?>
					</tr>
			</thead>
			<tbody>
				<?php edt_display($year, $week, $tp, $td); ?>
			</tbody>
			</table>
		</div> <!-- Fin Tableau -->
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
                <li><a href="">TP1</a><a href="" class="current">TP2</a><a href="">TP3</a></li>
                <li><a href="">TD1</a><a href="" class="current">TD2</a></li>

                <p>Paramètres</p>
                <li><a href="">Modifier mon profil</a></li>

                <li class="logout"><a href="">Déconnexion</a></li>
            </ul>
        </aside>
        <nav>
            <a href="javascript:;" class="user">Ludovic Boussion</a>
            <a href="javascript:;" class="closecalendars">Calendrier</a>
        </nav>
         
        <aside id="calendars">
            <div class="month">
               <div>Octobre</div>
                    <ul>
                       <li class="notinmonth">30</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li>
                   </ul>
                    <ul>
                       <li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li>
                   </ul>
                    <ul class="active">
                       <li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li>
                   </ul>
                    <ul>
                       <li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li>
                   </ul>
                    <ul>
                       <li>28</li><li>29</li><li>30</li><li>31</li><li class="notinmonth">1</li><li class="notinmonth">2</li><li class="notinmonth">3</li>
                   </ul>
            </div>

            <div class="month">
               <div>Novembre</div>
                    <ul>
                       <li class="notinmonth">28</li><li class="notinmonth">29</li><li class="notinmonth">30</li><li class="notinmonth">31</li><li>1</li><li>2</li><li>3</li>
                   </ul>
                    <ul>
                       <li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
                   </ul>
                    <ul>
                       <li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li>
                   </ul>
                    <ul>
                       <li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li>
                   </ul>
                    <ul>
                       <li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li class="notinmonth">1</li>
                   </ul>
            </div>

            <div class="month">
               <div>Décembre</div>
                    <ul>
                       <li class="notinmonth">25</li><li class="notinmonth">26</li><li class="notinmonth">27</li><li class="notinmonth">28</li><li class="notinmonth">29</li><li class="notinmonth">30</li><li>1</li>
                   </ul>
                    <ul>
                       <li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li>
                   </ul>
                    <ul>
                       <li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li>
                   </ul>
                    <ul>
                       <li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li>
                   </ul>
                    <ul>
                       <li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li>
                   </ul>
                   <ul>
                       <li>30</li><li>31</li><li class="notinmonth">1</li><li class="notinmonth">2</li><li class="notinmonth">3</li><li class="notinmonth">4</li><li class="notinmonth">5</li>
                   </ul>
            </div>

            <div class="month">
               <div>Janvier</div>
                    <ul>
                       <li class="notinmonth">30</li><li class="notinmonth">31</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li>
                   </ul>
                    <ul>
                       <li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li>
                   </ul>
                    <ul>
                       <li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li>
                   </ul>
                    <ul>
                       <li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li>
                   </ul>
                    <ul>
                       <li>27</li><li>28</li><li>29</li><li>30</li><li>31</li><li class="notinmonth">1</li><li class="notinmonth">2</li>
                   </ul>
            </div>

            <div class="month">
               <div>Novembre</div>
                    <ul>
                       <li class="notinmonth">28</li><li class="notinmonth">29</li><li class="notinmonth">30</li><li class="notinmonth">31</li><li>1</li><li>2</li><li>3</li>
                   </ul>
                    <ul>
                       <li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
                   </ul>
                    <ul>
                       <li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li>
                   </ul>
                    <ul>
                       <li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li>
                   </ul>
                    <ul>
                       <li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li class="notinmonth">1</li>
                   </ul>
            </div>

            <div class="month">
               <div>Décembre</div>
                    <ul>
                       <li class="notinmonth">25</li><li class="notinmonth">26</li><li class="notinmonth">27</li><li class="notinmonth">28</li><li class="notinmonth">29</li><li class="notinmonth">30</li><li>1</li>
                   </ul>
                    <ul>
                       <li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li>
                   </ul>
                    <ul>
                       <li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li>
                   </ul>
                    <ul>
                       <li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li>
                   </ul>
                    <ul>
                       <li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li>
                   </ul>
                   <ul>
                       <li>30</li><li>31</li><li class="notinmonth">1</li><li class="notinmonth">2</li><li class="notinmonth">3</li><li class="notinmonth">4</li><li class="notinmonth">5</li>
                   </ul>
            </div>
            <div class="numWeek">
            <ul>
              <li>40</li><li>41</li><li>42</li><li>43</li><li>44</li>
            </ul>
            <ul>
              <li>44</li><li>45</li><li>46</li><li>47</li><li>48</li>
            </ul>
            <ul>
              <li>48</li><li>49</li><li>50</li><li>51</li><li>52</li><li>1</li>
            </ul>
            <ul>
              <li>1</li><li>2</li><li>3</li><li>4</li><li>5</li>
            </ul>
            </div>
        </aside>
    </body>
</html>
