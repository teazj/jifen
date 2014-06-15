$(function() {
	$("#showCommentSign").click(function() {
		$.post(CommentUrl, {
			id : commentId,
			sign : CommentSign
		}, function(data) {
			location = location;
		}, 'json');
	});
});

window.onload = function() {
	var oId = document.getElementById('btn');
	var oIpt = document.getElementsByName('ipt');
	oId.onclick = function() {
		for ( var i = 0; i < oIpt.length; i++) {
			if (oIpt[i].checked == true) {
				oIpt[i].checked = false;
			} else {
				oIpt[i].checked = true;
			}
		}
	}
}