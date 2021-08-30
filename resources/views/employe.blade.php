<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employe List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div>
        <h4 style="text-align: center;">Employe List</h4>
        <div>
        	<h5>Show items per page:</h5>
	        <a href="{{route('employes')}}">10</a>
	        <a href="{{route('employes', '25')}}">25</a>
	        <a href="{{route('employes', '50')}}">50</a>
	        <a href="{{route('employes', '100')}}">100</a>	
        </div>
        
        	<table style="margin-top: 50px;">
			  <tr>
			    <th>Name</th>
			    <th>Department</th>
			    <th>Hourly Rate</th>
			    <th>Monthly Rate</th>
			  </tr>
			  @foreach($employes as $employ)
				  <tr>
				    <td>{{$employ->name}}</td>
				    <td>{{$employ->department->department}}</td>
				    <td>{{$employ->hourly_rate}}</td>
				    <td>{{$employ->monthly_rate}}</td>
				  </tr>
			  @endforeach
			</table>
			<div style="margin-top: 20px;"> 
				{{$employes->links()}}
			</div>
			
    </div>
    <div>
    	<ul>
    		@foreach($departments as $department)
    			<li><a href="{{ route('department', $department->department) }}">{{$department->department}}</a></li>
    		@endforeach
    	</ul>
    </div>
    <a style="margin-top:100px; display:block;" href="{{route('upload')}}"> >>Upload Employes from XML file<< </a>

</body>

</html>