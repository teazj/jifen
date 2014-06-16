var btnOrderSearch = $("#btnOrderSearch");
var txtPhone = $("#phone");
var txtOrderNum = $("#ordernum");
var mobile = $("#mobile");
var tbCheckCodeObj = $("#yanzheng");
var codeResultObj = $("#codeResult");
var codeInfoObj = $("#msgNext");
//实现点击弹出框以外,弹出框隐藏
$(document).click(function(event) {
    if ($("#layer01").css("display") == "block") {
        $("#layer01").hide();
    }
});
//查询订单块判断
btnOrderSearch.click(function() {
    checkPhoneAndOrderNum();
});

//查询订单块判断
function checkPhoneAndOrderNum() {
    var massage = "";
    var waUserID = getQueryString("wauserid");
    var mobile = $.trim(txtPhone.val());
    var ordernum = $.trim(txtOrderNum.val());
    if (mobile == "" || mobile == "请输入手机号") {
        massage += "请输入手机号\n";
    }
    else if (!mobile.isMobile()) {
        massage += "请输入正确的手机号,形如13810255555\n";
    }
    if (ordernum == "" || ordernum == "请输入订单号") {
        massage += "请输入订单号\n";
    }
    else if (!ordernum.isNN()||ordernum.length>10) {
        massage += "请输入正确的订单号，形如：654321\n";
    }
    if ($.trim(massage) != "")
        alert(massage);
    else {
        location.href = "VisaOrderProcess.aspx?ordernum=" + ordernum + "&mobile=" + mobile;
    }
}


function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

var t = n = 0, count;
function showAuto() {
    n = n >= (count - 1) ? 0 : ++n;
    $("#banner li").eq(n).trigger('click');
}


/*********search**********/
String.prototype.format = function() {
    var args = arguments;
    return this.replace(/\{(\d+)\}/g, function(m, i) { return args[i]; });
}

var hidCCName = $("#hidCCName"); /*存储选择目的地的相关内容*/
var Visa_countryInput = $("#Visa_countryInput");

$("#btnSearch").click(function() {
    var href = "";
    if (Visa_countryInput.val() == "" || Visa_countryInput.val() == "请输入国家名或地区名") {
        alert("请选择搜索国家!");
        return false;
    }
    var strcountry = Visa_countryInput.attr('cat_id');
    location.href = "/index.php/Vista/index/id/"+strcountry+".html";
});

Visa_countryInput.keydown(function(event) {
    if (hidCCName.val() != "") {
        if (event.keyCode == 13)
            $("#btnSearch").click();
    }
});

/*获取下拉列表*/

$.getJSON("/Ajax/getProductinfo.ashx", { method: "getcountrylist" }, function(result) {
    Visa_countryInput.autocomplete(result, {//jsonCountry
        minChars: 1,
        width: 215,
        max: 50,
        matchContains: true,
        autoFill: false,
        //mustMatch: true,
        formatItem: function(row, i, max) {
            return "<a style='cursor: pointer;'><span>" + row.NameEn + "</span>" + row.NameCn + "</a>";
        },
        formatMatch: function(row, i, max) {
            return row.NameCn + row.NameEn + Byecity.Common.Extend.CC2PY(row.NameCn);
        },
        formatResult: function(row) {
            return row.NameCn + " " + row.NameEn;
        }
    }).result(function(event, jsonCity, formatted) {
        hidCCName.val(jsonCity.ID + "|" + jsonCity.NameCn + "|" + jsonCity.PinYin);
    });
});
var divCitys = $("#divCitys");
var DivShim = $("#DivShim"); //存放的IE6Bug
$("#layer01").click(function(event) { event.stopPropagation(); });
//$(".city_main").click(function(event) { event.stopPropagation(); })
function hotClick(o) {
    $("#layer01").hide();
    var info = o.getAttribute("id");
    var arrCC = new Array();
    arrCC = info.split('|');

    Visa_countryInput.removeClass("vd_ctny");
    Visa_countryInput.addClass("vd_ctny0");
    Visa_countryInput.val(arrCC[0]);
    Visa_countryInput.attr('cat_id',arrCC[1]);
    divCitys.css("display", "none");
    DivShim.css("display", "none");
}
Visa_countryInput.click(function(event) {
    event.stopPropagation();
    $("#layer01").show();
    $("#layer03").hide();
    $("#layer02").hide();

}).focus(function() {
    if ($("#Visa_countryInput").val() != "")
        return false;
    $("#layer01").show(); //点击文本框显示弹层
    $("#A1").click();
}).keyup(function(event) {
    $(".city_close").click();
}).keydown(function(event) {//点击回车
    if (hidCCName.val() != "") {
        if (event.keyCode == 13)
            $("#btnSearch").click();
    }
});

//点击切换图片
function changeImage(id) {
    $('#imgVCode').attr("src", "validationcode.ashx?rdc=" + Math.random());
    tbCheckCodeObj.focus();
}