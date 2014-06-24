<div id="AdminMenu">
	<div class="profile_image"
	     style="background-image: url('<?php echo $authuser['UserDetail']['User']['picture']?>')"
		></div>

	<a class="username" onclick="$('#User_Dropdown').slideToggle('fast'); return false">
		<i class="icon-expand-alt"></i><span class="iconText"> <?php echo $this->Session->read('Auth.User.username')?> <span class="cf_purple">[ADMIN]</span></span>
	</a>
	<a id="SignOut_Button" href="/users/logout"><i class="icon-signout"></i><span class="iconText"> Sign out</span></a>

	<div id="User_Dropdown">
		<div class="actions">
			<ul>
				<li><a href="/admin">
						<i class="icon-cogs"></i> Site Admin
					</a>
				</li>
				<li><a href="/home">
						<i class="icon-home"></i> Profile
					</a>
				</li>
				<li>
					<a href="/users/login">
						<i class="icon-wrench"></i> Settings
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>