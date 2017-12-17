<div class="col-md-3">
	<div class="panel panel-primary panel-flush">
	    <div class="panel-heading">
	    	<h4 style="color: #fff">Sidebar</h4>
	  	</div>
	    <div class="panel-body">
        <ul class="nav" role="tablist">
            <li role="presentation">
            	<a href="{{ url('/admin')}}"> Dashboard</a>
            </li>

            <li role="presentation">
                <a href="{{ url('/admin/user')}}"> User</a>
            </li>

            <li role="presentation">
                @role('deo')
                    <a href="{{ url('/admin/role')}}"> Role</a>
                @endrole
            </li>

            <li role="presentation">
                @role('deo')
                    <a href="{{ url('/admin/permission')}}"> Permission</a>
                @endrole          	
            </li>

            <li role="presentation">
                <a href="{{ url('/admin/area')}}"> Area</a>
            </li>

            <li role="presentation">
                <a href="{{ url('/admin/school')}}"> School</a>
            </li>
            <li role="presentation">
                @role('hm')
                <a href="{{ url('/admin/school-ranking-criteria')}}"> School Ranking Criteria</a>
                @endrole
            </li>
        </ul>
	    </div>
	</div>
</div>
