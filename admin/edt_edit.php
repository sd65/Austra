<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Austra _ Inte</title>
        <meta name="description" content="" />
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="./css/base.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="./js/dragndrop.js"></script>
    </head>
    <body>
  <div id="ressources">
    <table>
        <tbody>
            <tr id="prog">
              <td>
                <p style="background:#149fac;min-width:60px;padding:10px;cursor:pointer;color:#fff;font-family:lucida grande;font-size:.7em;" class="lesson">
                  Programmation<br />
                  L.GILLIER<br />
                  Salle 252<br />
                  <a href="javascript:;" class="moinsun"><img src="img/r-arrow.png"></a><a href="javascript:;" class="plusun"><img src="img/l-arrow.png" /></a>
                </p>
              </td>
            </tr>
            <tr id="prog">
              <td>
                <p style="background:#ed4243;min-width:60px;padding:10px;cursor:pointer;color:#fff;font-family:lucida grande;font-size:.7em;" class="lesson">
                  Programmation<br />
                  L.GILLIER<br />
                  Salle 252<br />
                  <a href="javascript:;" class="moinsun"><img src="img/r-arrow.png"></a><a href="javascript:;" class="plusun"><img src="img/l-arrow.png" /></a>
                </p>
              </td>
            </tr>
        </tbody>
    </table>
  </div>


    <div id="edt">
      <table>
        <thead>
          <tr>
						<?php for ($hour=8;$hour<20;$hour++): ?>
							<th class="hour"> <?= $hour ?>h</td>
							<th class="halfHour">30</td>
						<?php	endfor ; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
          </tr>
          <tr>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
	</tr><tr>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
	</tr><tr>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
              <td colspan="1" class="dropable"></td>
	</tr>
          
        </tbody>
      </table>
    </div>

    </body>
</html>
