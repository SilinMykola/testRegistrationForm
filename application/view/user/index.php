<div>
<?php if (!empty($answer)) :?>
<div class="alert alert-danger" role="alert">
	<?php echo $answer;?>
</div>
<?php endif;?>


<div class="page-header">
    <div class="row">
        <div id="registration" class="col-md-12 reg_form">
            <form name = "regform" id="regform">
                <div class="form-group field">
                    <label for="name">Name </label>
                    <input id="name" type="text" name="name" size="50" required/>
                    <br><p id="namemsg"></p><br>
                    <label for="email">Email </label>
                    <input id="email" type="text" name="email" size="50" required/>
                    <br><span id="emailmsg"></span><br>
                    <div id="location">
                        <label for="regions">Region</label>
                        <select name="regions" id="region" class="chosen">
                            <option value='0' selected>Select your region</option>
                            <?php
                            foreach ($regions as $region) {
                                echo "<option value=" . $region['ter_id'] . ">" . $region['ter_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br><p id="regionmsg"></p><br>
                    <br>
                    <input type="button" id="submit" value="Send" class="btn btn-primary"/>
                </div>
            </form>
        <div id="answer"></div>
        </div>
    </div>
</div>