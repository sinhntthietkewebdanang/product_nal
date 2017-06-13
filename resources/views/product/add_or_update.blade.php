<!DOCTYPE html>
<html>
<head>
	<title>product</title>
	<link href="{{ asset("public/css/product_add.css") }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
	<p>Product > <?php if(isset($data)) echo 'detail'; else echo 'add new'; ?></p>
	@if(isset($data))
	
	{{ Form::open(array('route'=>array('product.update',$data['id']),'method' => 'PUT'))}}
	@else
	<form method="POST" action="{{ route('product.store') }}">
		{!! csrf_field() !!}
	@endif
	
	<div id="header">
		<div id="header_left">
			<input type="submit" name="save" value="save">
			<a href="{{route('product.index')}}">cancel</a>
		</div>
		<div id="header_right"></div>
	</div>
	<div id="content">
		<div id="content-left">
			<p>Basic</p>
			<div>
				<label>product code</label>
				<input type="text" name="product_code" required="true" value="{{ old('product_code',isset($data) ? $data['code'] : null) }}">
			</div>
			<div>
				<label>name</label>
				<input type="text" name="name" required="true"  value="{{ old('name',isset($data) ? $data['name'] : null) }}">
			</div>
			<div>
				<label>category</label>
				<select name="category">
					<option value="component" <?php if(isset($data)  and $data['category']== "component" ) echo 'selected'; ?>>component</option>
					<option value="laptop" <?php if(isset($data)  and $data['category']== "laptop" ) echo 'selected'; ?>>laptop</option>
					<option value="desktop" <?php if(isset($data)  and $data['category']== "desktop" ) echo 'selected'; ?>>desktop</option>
					<option value="networking" <?php if(isset($data)  and $data['category']== "networking" ) echo 'selected'; ?>>networking</option>
				</select>
			</div>

			<div>
				<label>Unit of measure</label>
				<select name="Unit">
					<option value="piece" <?php if(isset($data)  and $data['unit']== "piece" ) echo 'selected'; ?>>
						piece
					</option>
					<option value="box" <?php if(isset($data)  and $data['unit']== "box" ) echo 'selected'; ?>>
						box
					</option>
					<option value="tray" <?php if(isset($data)  and $data['unit']== "tray" ) echo 'selected'; ?>>
						tray
					</option>
				</select>
			</div>

			<div>
				<input type="checkbox" name="status" value="1" <?php if(isset($data) and $data['status'] == 1) echo 'checked';?> >Active
			</div>
		</div>
		<div id="content-right">
			<p>Extra infomation</p>
			<div>
				<label>price</label>
				<input type="number" name="price" required="true" value="{{ old('price',isset($data) ? $data['price'] : null) }}">
			</div>

			<div>
				<label>QOH</label>
				<input type="number"  name="qoh" required="true" value="{{ old('qoh',isset($data) ? $data['quantity_on_hand'] : null) }}">
			</div>

			<div>
				<label>Notes</label>
				<textarea name="note" required="true">{{ old('note',isset($data) ? $data['note'] : null) }}</textarea>
			</div>

		</div>
	</div>
	</form>
</div>
</body>
</html>
