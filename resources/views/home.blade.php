<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>工單列表</title>
	<script src="/js/jquery.js"></script>

</head>
<body>
<table class="layui-table" lay-even>
        <colgroup>
            <col width="60">
            <col width="200">
            <col width="100">
            <col width="90">
            <col width="180">
            <col width="180">
            <col width="210">
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>標題</th>
            <th>內容</th>
            <th>嚴重級別</th>
            <th>優先順序</th>
            <th>發布時間</th>
            <th>更新時間</th>
            <th>操作</th>           
        </tr> 
        </thead>

        <tbody>
             @forelse ($list_info as $k => $info)
            <tr>
            <td align="center">{{ $info->id }}</td>
            <td>{{ $info->title }}</td>
            <td>{{ $info->content }}</td>
            <td>{{ $info->level }}</td>
            <td>{{ $info->priority }}</td>
            <td>{{ $info->create_time }}</td>
            <td>{{ $info->update_time }}</td>
            <td>
                <button class="layui-btn layui-btn-xs layui-btn-warm edit" id="edit" data-id="{{ $info->id }}">修改</button>
            </td>
            </tr>
            @empty
            <tr><td colspan="7" align="center">没有数据</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
	$('.edit').click(function () {
		var edit = $('#edit').val()
		if (edit == ''){
			$('#edit').blur();return false;
		}

		$.ajax({
			type : "POST",
			url : "/api/user/login",
			data : {
				"account" : account,
				"password" : password
			},
			success : function(result) {
				if (result.code == '200') {
                    alert(JSON.stringify(result))
					// window.location.href = "/api/home";
				}
                else {
					alert(JSON.stringify(result))
				}
			}
		});
	})

	document.onkeydown = function(event) {
		var e = event || window.event || arguments.callee.caller.arguments[0];
		if ( e && e.keyCode == 13 ) {
			// enter 鍵
			$('.enterlogin').click();
		}
	};

</script>
</body>
</html>
