<form method="post" action="" class="form-horizontal">
    <fieldset>
        <legend><?=$page_title;?></legend>
        
        <?php if (isset($save_successful)){
            if ($save_successful){ ?>
                <div class="alert alert-block alert-success">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Save Successful!</h4>
                    Your profile information has been updated.
                </div>
            <? }
        }

        if (trim(validation_errors() . '')!=''){ ?>
            <div class="alert alert-block alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <?=validation_errors();?>
            </div>
        <? } ?>

        <div class="control-group<? if (form_error('email') != ''){ ?> error<? } ?>">
            <label class="control-label" for="email">E-mail Address: </label>
            <div class="controls"><input type="email" name="email" id="email" maxlength="250" value="<?=set_value('email', $user['email']);?>" class="input" placeholder="skater@spartanburgdeadlydolls.com" autofocus required /><?=form_error('email');?></div>
        </div>

        <div class="control-group<? if (form_error('number') != ''){ ?> error<? } ?>">
            <label class="control-label" for="email">Number: </label>
            <div class="controls">
                <input type="text" name="number_prefix" id="number_prefix" maxlength="45" value="<?=set_value('number_prefix', $user['number_prefix']);?>" class="input-mini" placeholder="." title="Number prefix" />&nbsp;
                <input type="text" name="number" id="number" maxlength="5" value="<?=set_value('number', $user['number']);?>" class="input-mini" placeholder="42" />&nbsp;
                <input type="text" name="number_suffix" id="number_suffix" maxlength="45" value="<?=set_value('number_suffix', $user['number_suffix']);?>" class="input-mini" placeholder="calibur" />&nbsp;
                <span id="number_drawout"><?=draw_number((object) $user, false, false);?></span>
                <?=form_error('number');?>
            </div>
        </div>

        <div class="control-group<? if (form_error('skate_name') != ''){ ?> error<? } ?>">
            <label class="control-label" for="skate_name">Skate Name: </label>
            <div class="controls"><input type="text" name="skate_name" id="skate_name" maxlength="100" value="<?=set_value('skate_name', $user['skate_name']);?>" class="input" placeholder="Deadly Doll" /><?=form_error('skate_name');?></div>
        </div>

        <div class="control-group<? if (form_error('first_name') != ''){ ?> error<? } ?>">
            <label class="control-label" for="first_name">First Name: </label>
            <div class="controls"><input type="text" name="first_name" id="first_name" maxlength="100" value="<?=set_value('first_name', $user['first_name']);?>" class="input" placeholder="Jane" required /><?=form_error('first_name');?></div>
        </div>

        <div class="control-group<? if (form_error('last_name') != ''){ ?> error<? } ?>">
            <label class="control-label" for="last_name">Last Name: </label>
            <div class="controls"><input type="text" name="last_name" id="last_name" maxlength="100" value="<?=set_value('last_name', $user['last_name']);?>" class="input" placeholder="Doe" required /><?=form_error('last_name');?></div>
        </div>

        <div class="control-group<? if (form_error('address') != ''){ ?> error<? } ?>">
            <label class="control-label" for="address">Address: </label>
            <div class="controls"><input type="text" name="address" id="address" maxlength="200" value="<?=set_value('address', $user['address']);?>" class="input" placeholder="138 Jammer Point" /><?=form_error('address');?></div>
        </div>

        <div class="control-group<? if (form_error('address2') != ''){ ?> error<? } ?>">
            <label class="control-label" for="address2">Address 2: </label>
            <div class="controls"><input type="text" name="address2" id="address2" maxlength="200" value="<?=set_value('address2', $user['address2']);?>" class="input" placeholder="Apt. 69" /><?=form_error('address2');?></div>
        </div>

        <div class="control-group<? if (form_error('city') != ''){ ?> error<? } ?>">
            <label class="control-label" for="city">City: </label>
            <div class="controls"><input type="text" name="city" id="city" maxlength="100" value="<?=set_value('city', $user['city']);?>" class="input" placeholder="Spartanburg" /><?=form_error('city');?></div>
        </div>

        <div class="control-group<? if (form_error('state') != ''){ ?> error<? } ?>">
            <label class="control-label" for="state">State: </label>
            <div class="controls">
				<select name="state" id="state" class="input-mini">
					<option <?=set_select('state', 'AL');?>>AL</option>
					<option <?=set_select('state', 'AK');?>>AK</option>
					<option <?=set_select('state', 'AZ');?>>AZ</option>
					<option <?=set_select('state', 'AR');?>>AR</option>
					<option <?=set_select('state', 'CA');?>>CA</option>
					<option <?=set_select('state', 'CO');?>>CO</option>
					<option <?=set_select('state', 'CT');?>>CT</option>
					<option <?=set_select('state', 'DE');?>>DE</option>
					<option <?=set_select('state', 'DC');?>>DC</option>
					<option <?=set_select('state', 'FL');?>>FL</option>
					<option <?=set_select('state', 'GA');?>>GA</option>
					<option <?=set_select('state', 'HI');?>>HI</option>
					<option <?=set_select('state', 'ID');?>>ID</option>
					<option <?=set_select('state', 'IL');?>>IL</option>
					<option <?=set_select('state', 'IN');?>>IN</option>
					<option <?=set_select('state', 'IA');?>>IA</option>
					<option <?=set_select('state', 'KS');?>>KS</option>
					<option <?=set_select('state', 'KY');?>>KY</option>
					<option <?=set_select('state', 'LA');?>>LA</option>
					<option <?=set_select('state', 'ME');?>>ME</option>
					<option <?=set_select('state', 'MD');?>>MD</option>
					<option <?=set_select('state', 'MA');?>>MA</option>
					<option <?=set_select('state', 'MI');?>>MI</option>
					<option <?=set_select('state', 'MN');?>>MN</option>
					<option <?=set_select('state', 'MS');?>>MS</option>
					<option <?=set_select('state', 'MO');?>>MO</option>
					<option <?=set_select('state', 'MT');?>>MT</option>
					<option <?=set_select('state', 'NE');?>>NE</option>
					<option <?=set_select('state', 'NV');?>>NV</option>
					<option <?=set_select('state', 'NH');?>>NH</option>
					<option <?=set_select('state', 'NJ');?>>NJ</option>
					<option <?=set_select('state', 'NM');?>>NM</option>
					<option <?=set_select('state', 'NY');?>>NY</option>
					<option <?=set_select('state', 'NC');?>>NC</option>
					<option <?=set_select('state', 'ND');?>>ND</option>
					<option <?=set_select('state', 'OH');?>>OH</option>
					<option <?=set_select('state', 'OK');?>>OK</option>
					<option <?=set_select('state', 'OR');?>>OR</option>
					<option <?=set_select('state', 'PA');?>>PA</option>
					<option <?=set_select('state', 'RI');?>>RI</option>
					<option <?=set_select('state', 'SC', true);?>>SC</option>
					<option <?=set_select('state', 'SD');?>>SD</option>
					<option <?=set_select('state', 'TN');?>>TN</option>
					<option <?=set_select('state', 'TX');?>>TX</option>
					<option <?=set_select('state', 'UT');?>>UT</option>
					<option <?=set_select('state', 'VT');?>>VT</option>
					<option <?=set_select('state', 'VA');?>>VA</option>
					<option <?=set_select('state', 'WA');?>>WA</option>
					<option <?=set_select('state', 'WV');?>>WV</option>
					<option <?=set_select('state', 'WI');?>>WI</option>
					<option <?=set_select('state', 'WY');?>>WY</option>
				</select>
                <?=form_error('state');?>
            </div>
        </div>

        <div class="control-group<? if (form_error('zip') != ''){ ?> error<? } ?>">
            <label class="control-label" for="zip">ZIP Code: </label>
            <div class="controls"><input type="number" name="zip" id="zip" maxlength="5" value="<?=set_value('zip', $user['zip']);?>" class="input-mini" placeholder="29303" /><?=form_error('zip');?></div>
        </div>

        <div class="control-group<? if (form_error('phone') != ''){ ?> error<? } ?>">
            <label class="control-label" for="phone">Phone Number: </label>
            <div class="controls"><input type="tel" name="phone" id="phone" maxlength="15" value="<?=set_value('phone', $user['phone']);?>" class="input" placeholder="864-555-1234" /><?=form_error('phone');?></div>
        </div>

        <div class="control-group<? if (form_error('insurance') != ''){ ?> error<? } ?>">
            <label class="control-label" for="insurance">Insurance #: </label>
            <div class="controls"><input type="text" name="insurance" id="insurance" maxlength="45" value="<?=set_value('insurance', $user['insurance']);?>" class="input" placeholder="11382" /><?=form_error('insurance');?></div>
        </div>

        <div class="control-group<? if (form_error('facebook') != ''){ ?> error<? } ?>">
            <label class="control-label" for="facebook">Facebook: </label>
            <div class="controls">
                <div class="input-prepend"><span class="add-on">https://www.facebook.com/</span><input type="text" name="facebook" id="facebook" maxlength="45" value="<?=set_value('facebook', $user['facebook']);?>" class="input-medium" /></div><?=form_error('facebook');?></div>
        </div>

        <div class="control-group<? if (form_error('google_plus') != ''){ ?> error<? } ?>">
            <label class="control-label" for="google_plus">Google+: </label>
            <div class="controls">
                <div class="input-prepend"><span class="add-on">https://plus.google.com/</span><input type="text" name="google_plus" id="google_plus" maxlength="45" value="<?=set_value('google_plus', $user['google_plus']);?>" class="input-medium" /></div><?=form_error('google_plus');?></div>
        </div>

        <div class="control-group<? if (form_error('twitter') != ''){ ?> error<? } ?>">
            <label class="control-label" for="twitter">Twitter: </label>
            <div class="controls">
                <div class="input-prepend"><span class="add-on">https://twitter.com/</span><input type="text" name="twitter" id="twitter" maxlength="45" value="<?=set_value('twitter', $user['twitter']);?>" class="input-medium" /></div><?=form_error('twitter');?></div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save Changes</button>
        </div>
</form>