<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employe List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div>
        <h4 style="text-align: center;">Employe List by Department</h4>
        
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
    </div>

</body>

</html>