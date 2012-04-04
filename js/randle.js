$(function() {
	$.ajaxSetup({cache:false});
	$("h1").lettering();
	$("h1>span[class^='char']").each(function(){
		var size = 60 + randNum(0,12),
			sizeVal = size + "px",
			color = 64 + randNum(0,64),
			colorVal = "rgb("+color+","+color+",220)",
			rotate = 0 + randNum(0,20),
			rotateVal = "rotate("+rotate+"deg)",
			caps = (randBoolean()) ? "uppercase" : "lowercase";
		$(this).css({
			"font-size": sizeVal,
			"color": colorVal,
			"-moz-transform": rotateVal,
			"-webkit-transform": rotateVal,
			"-o-transform": rotateVal,
			"-ms-transform": rotateVal,
			"text-transform": caps
		})
	});
    $(".pills").pills();
    $("#randonbutton").click(function() {
        $.get("ajax.php", $("#randomform").serialize(), function(data) {
            if (data.password == "Error: no characters enabled") {
                $("#randomresult").hide().addClass("alert-message").removeClass("success").addClass("error")
                    .html("<strong>"+data.password+"</strong></p>").show("fast");
            } else {
                $("#randomresult").hide().addClass("alert-message").removeClass("error").addClass("success")
                    .html("Your password is <br /><strong>"+data.password+"</strong></p>").show("fast");
            }
        }, "json");
    });
    $("#patternbutton").click(function() {
		var t = $("#patternfield"),
			template = "";
		// if find() doesn't find a match, it seems the chaining stops and later replacements aren't made.
		// cheap fix is to not chain with .end() and just do multiple statements
		t.find(".addLower").before("<strong>a</strong>").remove();
		t.find(".addUpper").before("<strong>A</strong>").remove();
		t.find(".addNumber").before("<strong>#</strong>").remove();
		t.find(".addSymbol").before("<strong>@</strong>").remove();
		t.find(".addRandom").before("<strong>*</strong>").remove();
		template = t.html();
        $(":input[name='template']").val(template);
        $.get("ajax.php", $("#patternform").serialize(), function(data) {
            if (data.password == "Error: no characters enabled") {
                $("#patternresult").hide().addClass("alert-message").removeClass("success").addClass("error")
                    .html("<strong>"+data.password+"</strong></p>").show("fast");
            } else {
                $("#patternresult").hide().addClass("alert-message").removeClass("error").addClass("success")
                    .html("Your password is <br /><strong>"+data.password+"</strong></p>").show("fast");
            }
        }, "json");
    });
   $("#addLower, #addUpper, #addNumber, #addSymbol, #addRandom").click(function() {
       addChar(this.id);
   })
})

var addChar = function(buttonClicked) {
    var pf = "#patternfield",
        $pf = $(pf),
        t = "",
		base = '<input type="text" readonly="readonly" class="patternchar ~~~" value="$$$" />';
    switch(buttonClicked) {
        case "addLower":
            t = base.replace("$$$","a");
            break;
        case "addUpper":
            t = base.replace("$$$","A");
            break;
       case "addNumber":
           t = base.replace("$$$","#");
            break;
        case "addSymbol":
            t = base.replace("$$$","@");
            break;
		case "addRandom":
			t = base.replace("$$$","*");
			break;
    }
    if (t !== "") {
		t = t.replace("~~~",buttonClicked);
        $pf.html( $pf.html() + t ).focus();
    }
};

var randNum = function(min,max) {
	var result = min,
		range = max - min + 1
		diff = Math.floor( Math.random() * range)
		negative = randBoolean();
	result += (negative) ? (diff*-1) : diff;
	return result;
};

var randBoolean = function() {
	return !! Math.round(Math.random() * 1);
}
