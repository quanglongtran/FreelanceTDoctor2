<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh sách câu hỏi</title>
	<style type="text/css">
tr th, tr td {
    border: 1px solid #000;
    padding: 0px 5px;
}

table {border-collapse: collapse;}
	</style>
</head>

<body>
	<h1>Danh sách câu hỏi ({{count($ds_khachhang)}})</h1>
	<form>
		
	</form>
	<!-- <hr> -->

<table>
	<thead>
		<tr>
			<th>Họ tên</th>
			<th>Địa chỉ</th>
			<th>Điện thoại</th>
			<th>Email</th>
			<th>Câu hỏi</th>
			<th>Nội dung</th>
		</tr>
	</thead>
	<tbody>
		@foreach($ds_khachhang as $khachhang)
		<tr>
			<td>{{$khachhang->fullname}}</td>
			<td>{{$khachhang->address}}</td>
			<td>{{$khachhang->phone}}</td>
			<td>{{$khachhang->email}}</td>
			<td>{{$khachhang->question_title}}</td>
			<td>{{$khachhang->question_content}}</td>
		</tr>
		@endforeach
	</tbody>
</table>


</body>
</html>