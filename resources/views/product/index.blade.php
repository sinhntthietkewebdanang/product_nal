
<!DOCTYPE html>
<html>
<head>
	<title>product</title>
	<link href="{{ asset("public/css/product.css") }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
	<p>Product</p>
	<div id="header">
		<div id="header_left">
		<form method="POST" action="{{ route('search') }}">
			{!! csrf_field() !!}
				<label>product name :</label>
				<input type="text" name="name">
				<label>category : </label>
				<select name="category">
					<option value="all">all</option>
					<option value="component">component</option>
					<option value="laptop">laptop</option>
					<option value="desktop">desktop</option>
					<option value="networking">networking</option>
				</select>
				<input type="submit" name="ok" value="search">
			</div>
		</form>
		<div id="header_right"><a href="{{route('product.create')}}">create</a></div>
	</div>
	<div id="content">
		<table border="1px">
			<tr>
				<th>code</th>
				<th>name</th>
				<th>category</th>
				<th>price</th>
				<th>UOM</th>
				<th>quantity-on-hand</th>
				<th>active</th>
				<th></th>
		
			</tr>
			@foreach($data as $key=>$value)
            <tr>
                <td>{{$value->code}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->category}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->unit}}</td>
                <td>{{$value->quantity_on_hand}}</td>
                
                <td><input disabled="true" type="checkbox" name="status" value="1" <?php if($value->status==1) echo "checked";?>></td>
                <td><a href="{{route('product.edit',$value->id)}}">edit</a></td>
            </tr>
            @endforeach
		</table>
	</div>
</div>
</body>
</html>
