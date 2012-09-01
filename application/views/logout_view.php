<div class="sidebar_container">
	<h2><span>My Account</span></h2>
	Welcome back, <strong><?=draw_name((object) $user);?></strong>!
	
	<ul>
		<? if ($admin){ ?><li><a href="/admin/">Administration</a></li><? } ?>
		<li><a href="/edit_profile/">Edit Profile</a></li>
		<li><a href="/change_password/">Change Password</a></li>
		<li><a href="/logout/">Logout</a></li>
	</ul>
</div>