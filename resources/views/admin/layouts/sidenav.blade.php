<div class="sidebar-menu">				
		<header class="logo-env">			
			<!-- logo -->
			<div class="logo">			 
				<a href="{{ url('/admin/dashboard') }}">
					<img src="{{ asset('assets/images/logo@2x.png') }} " width="120" alt="" />
				</a>
			</div>			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>			
		</header>		  				
		<ul id="main-menu" class="">			 
			<li class="opened active">
				<a href="index.html">
					<i class="entypo-gauge"></i>
					<span>Dashboard</span>
				</a>
				<ul>
					<li>
						<a href="index.html">
							<span>Dashboard 1</span>
						</a>
					</li>
					<li class="active">
						<a href="dashboard-2.html">
							<span>Dashboard 2</span>
						</a>
					</li>
					<li>
						<a href="dashboard-3.html">
							<span>Dashboard 3</span>
						</a>
					</li>
				</ul>
			</li>
		    
		</ul>
				
	</div>	