<div id="GuestMenu">
	<a id="SignIn_Button" onclick="$('#SignIn_Dropdown').slideToggle('fast'); return false">
		<i class="icon-signin"></i><span class="iconText"> Sign in</span>
	</a>
	<div id="SignIn_Dropdown">
		<div class="actions">
			<ul>
				<li><a href="/auth_login/google">
						Via Google
					</a>
				</li>
				<li><a href="/auth_login/twitter">
						Via Twitter
					</a>
				</li>
				<li><a href="/auth_login/facebook">
						Via Facebook
					</a>
				</li>
				<li><a href="/users/login">Email/password</a></li>
			</ul>
		</div>
	</div>
</div>